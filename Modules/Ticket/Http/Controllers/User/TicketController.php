<?php

namespace Modules\Ticket\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ticket\DataTables\SupportDataTable;
use App\Exports\VendorTicketsExport;
use DB;
use Excel;

use Modules\Ticket\Http\Models\{
    Thread,
    ThreadReply,
    ThreadStatus,
    Priority,
    Department
};
use Illuminate\Support\Facades\{
    Auth,
    Session
};
use App\Models\{
    User,
    Preference
};

use Modules\Ticket\Http\Requests\{
    UserTicketRequest,
    ReplyRequest
};
use App\Services\Mail\TicketReplyMailService;


class TicketController extends Controller
{
    /**
     * Customer ticket list
     *
     */
    public function index()
    {
        $data['statuses']    = ThreadStatus::get();
        $data['priorities']   = Priority::get();
        $data['status_search'] = null;
        $data['priority_search'] = null;
        $data['threads'] = Thread::getUserAllData()->paginate(preference('row_per_page'));
        return view('ticket::ticket-list', $data);
    }

    /**
     * Customer ticket list with search
     *
     */
    public function searchList()
    {
        $data['statuses'] = ThreadStatus::get();
        $data['priorities'] = Priority::get();
        $data['priority_search'] = request()->input('priority_search');
        $data['status_search'] = request()->input('status_search');
        $data['threads'] = Thread::getUserAllData(null, null, $data['status_search'], $data['priority_search'])->paginate(preference('row_per_page'));
        return view('ticket::ticket-list', $data);
    }

    /**
     * Update reply
     * @param Request $request
     *
     */
    public function update(Request $request)
    {
        if (isset($request->id)) {
            if (ThreadReply::updateReply($request->message, $request->id)) {
                \Session::flash('success', __('Successfully Saved'));
                return redirect()->back();
            }
        }
        \Session::flash('fail', __('Something went wrong, please try again.'));
        return redirect()->back();
    }

    /**
     * Create ticket
     */
    public function create()
    {
        $data['projectPanel'] = 0;
        $data['object_type'] = 'TICKET';
        $data['priorities']   = Priority::get();
        $data['threadStatus'] = ThreadStatus::get();
        $data['files'] = implode(", ", getFileExtensions(1));
        return view('ticket::new-ticket', $data);
    }

    /**
     * Store Ticket
     * @param UserTicketRequest $request
     *
     */
    public function store(UserTicketRequest $request)
    {
        try {
            $user = Auth::user();
            DB::beginTransaction();
            $data['receiver_id']        = $user->id;
            $data['email']              = $user->email ??  null;
            $data['name']               = $user->name ??  null;
            $data['priority_id']        = $request->priority_id;
            $data['thread_status_id']   = 2;
            $data['thread_key']         = 'THRD-' . uniqid();
            $data['subject']            = $request->subject;
            $data['thread_type']        = $request->object_type;
            $data['sender_id']          = 1; // 1 refered to admin
            $data['date']               = date('Y-m-d H:i:s');
            $data['project_id']         = 1;
            $data['last_reply']         = date('Y-m-d H:i:s');

            // Creating new thread
            $id = (new Thread)->store($data);
            if (!empty($id)) {
                $replyData['thread_id'] = $id;
                $replyData['sender_id']   = $user->id;
                $replyData['message']   = $request->messages;
                $replyData['date']      = $data['date'];
                $replyData['has_attachment']      = isset($request->file) ? 1 : 0;
                (new ThreadReply)->storeUserRrply($replyData);
            }
            DB::commit();

            $attachments = [];
            if (isset($request->file) && !empty($request->file)) {
                $fileId = ThreadReply::where('id', $id)->get();

                foreach ($fileId as $key => $file) {
                    $attachments = $file->filesUrlNew(['imageUrl' => 'true']);

                }
            }
            $info['emailInfo'] = (new Thread())->getAllTicketDetailsById($id);
            $info['assignId'] = 1; // user ticket asigned to Admin
            $info['files'] = $attachments;
            $emailResponse = (new TicketReplyMailService)->send($info);
            if ($emailResponse['status'] == false) {
                \Session::flash('fail', __($emailResponse['message']));
            }
            Session::flash('success', __('Successfully Saved'));
            return redirect()->route('user.ticketList');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * pdf generate
     *
     */
    public function pdf()
    {
        $data['from']       = $from       = request('from');
        $data['to']         = $to         = request('to');
        $status             = request('status');
        $data['customerSelected'] = '';
        $data['statusSelected'] = ThreadStatus::find($status);
        $data['ticketList'] = (new Thread())->getAllData($from, $to, $status, null)->orderBy('date', 'desc')->get();
        $data['company_logo'] = Preference::where('category','company')->where('field', 'company_logo')->first('value');
        $data['date_range'] = (!empty($from) && !empty($to)) ?  formatDate($from) . ' To ' . formatDate($to) : 'No date selected';
        return printPDF($data, 'ticket_list_pdf' . time() . '.pdf', 'ticket::vendor_pdf', view('ticket::vendor_pdf', $data), 'pdf');
    }

    /**
     * csv generate
     *
     */
    public function csv()
    {
        return Excel::download(new VendorTicketsExport(), 'tickets_list' . time() . '.csv');
    }

    /**
     * Get all ststuses
     * @param Request $request
     *
     */
    public function getAllStatus(Request $request)
    {
        $data = ['status' => 0];
        $data['output'] = '';
        $statusName    = $request->statusName;
        $ticketId   = $request->ticketId;
        if (!empty($statusName) && !empty($ticketId)) {
            $ticketStatus = DB::table('ticket_statuses')->where('name', '!=', $statusName)->orderBy('name')->get();
            foreach ($ticketStatus as $key => $value) {
                $data['output'] .= '<li class="properties"><a class="status_change f-14 color_black" ticket_id="' . $ticketId . '" data-id="' . $value->id . '" data-value="' . $value->name . '">' . $value->name . '</a></li>';
            }
            $data['status'] = 1;
        }
        return $data;
    }

    /**
     * view ticket
     * @param int $id
     *
     */
    public function view($id)
    {
        $data['page_title'] = __('Ticket Reply');
        $ticket_id   =$id;
        $previousurl = url()->previous();

        $data['header'] = 'ticket';
        $data['ticketStatuses'] = ThreadStatus::getAll();
        $data['ticketDetails'] = (new Thread)->getAllTicketDetailsById($ticket_id);
        if (empty($data['ticketDetails'])) {
            return redirect()->back()->with('fail', __('The data you are trying to access is not found.'));
        }
        $data['priority'] = Priority::where('id', '=', $data['ticketDetails']->priority_id)->first();
        $data['ticketReplies'] = (new Thread)->getAllTicketRepliersById($ticket_id);
        $data['ticketStatus'] = ThreadStatus::where('id', '!=',  $data['ticketDetails']->thread_status_id)->orderBy('name')->get();
        $data['filePath'] = "public/uploads";
        $data['assignee'] = User::where('status', 'active')->get();
        return view('ticket::ticket-view', $data);
    }

    /**
     * Update reply
     * @param ReplyRequest $request
     *
     */
    public function replyStore(ReplyRequest $request)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->ticket_id)) {
                DB::table('threads')
                    ->where('id', $request->ticket_id)
                    ->update([
                        'thread_status_id'    => 6, // 6 refered to open
                        'last_reply'    => date('Y-m-d H:i:s'),
                    ]);
            }
            $data['thread_id'] = $request->ticket_id;
            $data['sender_id']   = Auth::user()->id;
            $data['message']   = $request->message;
            $data['date']      = date('Y-m-d H:i:s');
            $thredReplyId = (new ThreadReply)->storeUserRrply($data);

            $attachments = [];

            if (isset($request->file_id) && !empty($request->file_id)) {
                $fileId = ThreadReply::where('id', $thredReplyId)->first();
                $attachments = $fileId->filesUrlNew(['imageUrl' => 'true']);
            }

            $info['emailInfo'] = (new Thread())->getAllTicketDetailsById($request->ticket_id);
            $info['assignId'] = empty($info['emailInfo']->assigned_member_id) ? 1 : $info['emailInfo']->assigned_member_id; // Vendor ticket asigned to Admin
            $info['files'] = $attachments;

            $emailResponse = (new TicketReplyMailService)->send($info);
            if ($emailResponse['status'] == false) {
                \Session::flash('fail', __($emailResponse['message']));
            }
            DB::commit();
            Session::flash('success', __('Successfully Saved'));
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * delete reply
     * @param Request $request
     *
     */
    public function replyDelete(Request $request)
    {
        if (isset($request->id) && isset($request->ticket_id)) {
            // If file exeist then delete
            $file = DB::table('files')->where(['ticket_reply_id' => $request->id, 'ticket_id' => $request->ticket_id])->first();
            if (!empty($file)) {
                @unlink(public_path() . '/uploads/ticketFile/' . $file->file_name);
                DB::table('files')->where(['ticket_reply_id' => $request->id, 'ticket_id' => $request->ticket_id])->delete();
            }
            // Delete Ticket Reply
            $data = DB::table('ticket_replies')->where(['id' => $request->id, 'ticket_id' => $request->ticket_id])->first();
            if (!empty($data)) {
                \DB::table('ticket_replies')->where(['id' => $request->id, 'ticket_id' => $request->ticket_id])->delete();
                \Session::flash('success', __('Deleted Successfully.'));
                return redirect()->back();
            }
        }
    }

    /**
     * customer reply
     * @param int $id
     *
     */
    public function customerReply($id)
    {
        $ticket_id             = base64_decode($id);
        $data['menu']          = 'customer-panel-support';
        $data['page_title'] = __('Customer Ticket Reply');
        $data['ticketDetails'] = $this->Ticket->getAllTicketDetailsById($ticket_id);

        if (empty($data['ticketDetails'])) {
            return redirect()->back()->with('fail', __('The data you are trying to access is not found.'));
        }

        $data['assignee'] = User::where('id', $data['ticketDetails']->assigned_member_id)->first();
        if ($data['ticketDetails']['customer_id'] != Auth::guard('customer')->user()->id) {
            Session::flash('fail', __('Invalid Ticket Reply'));
            return redirect('customer/dashboard');
        }
        $data['ticketReplies'] = $this->Ticket->getAllTicketRepliersById($ticket_id);
        $replyFiles = [];
        foreach ($data['ticketReplies'] as  $ticketReply) {
            $replyFiles[$ticketReply->id] = (new File)->getFiles('Ticket Reply', $ticketReply->id);
        }
        $data['replyFiles'] = $replyFiles;
        $data['filePath'] = "public/uploads/tickets";

        return view('admin.customerPanel.ticket.reply', $data);
    }

    /**
     * change status
     * @param Request $request
     *
     */
    public function changeStatus(Request $request)
    {
        $data = ['status' => 0];
        if (!empty($request->status_id) && !empty($request->ticketId)) {
            $previousStatus = Thread::where('id', $request->ticketId)->first(['thread_status_id']);
            $data['preStatusName'] = str_replace(' ', '', $previousStatus->threadStatus->name);
            $update = Thread::where(['id' => $request->ticketId])->update([
                'thread_status_id' => $request->status_id,
            ]);

            if ($update) {
                $newStatus = Thread::where('id', $request->ticketId)->first(['thread_status_id']);
                $ticktStatus = ThreadStatus::where('id', $newStatus->thread_status_id)->pluck('color', 'name')->toArray();
                $data['newStatusName'] = str_replace(' ', '', $newStatus->threadStatus->name);
                $data['newName'] = $newStatus->threadStatus->name;
                $data['newStatusColor'] = array_values($ticktStatus)[0];
                $data['status']  = '1';
            }
        }
        return $data;
    }

}
