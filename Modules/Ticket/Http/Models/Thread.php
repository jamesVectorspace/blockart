<?php

/**
 * @package Thread Model
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 02-15-2022
 */

namespace Modules\Ticket\Http\Models;

use App\Models\Model;
use App\Traits\ModelTrait;
use App\Traits\ModelTraits\hasFiles;
use DB;
use Illuminate\Support\Facades\Auth;

class Thread extends Model
{
    public $timestamps = false;
    protected $table = "threads";
    use ModelTrait, hasFiles;

    public function users()
    {
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }

    /**
     * Relation with User model
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'sender_id', 'id');
    }
     /**
     * Relation with User model
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id', 'id');
    }

    /**
     * Relation with Priority model
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function priority()
    {
        return $this->belongsTo('Modules\Ticket\Http\Models\Priority', 'priority_id', 'id');
    }

    /**
     * Relation with ThreadStatus model
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function threadStatus()
    {
        return $this->belongsTo('Modules\Ticket\Http\Models\ThreadStatus', 'thread_status_id', 'id');
    }

    /**
     * Relation with User model
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function assignedMember()
    {
        return $this->belongsTo('App\Models\User', 'assigned_member_id', 'id');
    }

    /**
     * Relation with User model
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id', 'id');
    }

     /**
     * Relation with ThreadReply model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threadReplies()
    {
        return $this->hasMany('Modules\Ticket\Http\Models\ThreadReply', 'thread_id', 'id');
    }

    /**
     * store
     * @param array $data
     * @return boolean
     */
    public function store($data = [])
    {
        $id = parent::insertGetId($data);

        if ($id) {
            return $id;
        }
        return false;
    }

    /**
     * @param null $id
     * @param array $data
     *
     * @return [type]
     */
    public function updateDate($id = null, $data = [])
    {
        $result = Thread::where('id', $id);
        if ($result->exists()) {
            if ($result->update($data)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return [type]
     */
    public function getChatInfo()
    {
        $ticket = Thread::with('threadReplies');
        if (Auth::user()->customer()) {
            $ticket = $ticket->where('receiver_id', Auth::user()->id)->groupBy('sender_id');
        } else {
            $ticket = $ticket->where('sender_id', Auth::user()->id)->groupBy('receiver_id');
        }
        return $ticket->get();
    }


    /**
     * Ticket details
     * @param mixed $id
     *
     * @return [type]
     */
    public function getAllTicketDetailsById($id)
    {
        return Thread::with(['assignedMember','threadReplies' => function ($q) {
            $q->orderBy('id', 'desc')->first();
        }, 'priority:id,name', 'threadStatus:id,name,color', 'user:id,email,name'])->where('id', $id)->first();
    }

    public function getAllTicketRepliersById($id)
    {
        return ThreadReply::with(['sender', 'receiver'])->where('thread_id', $id)->orderBy('date', 'desc')->get();
    }

    /**
     * @param null $from
     * @param null $to
     * @param null $statusId
     * @param null $assigneeId
     *
     * @return [type]
     */
    public function getAllData($from = null, $to = null, $statusId = null, $assigneeId = null)
    {
        $result = Thread::with(['priority', 'threadStatus', 'customer', 'user.metas', 'assignedMember'])->select('threads.*');
        if (!empty($from)) {
            $result = $result->whereDate('date', '>=', DbDateFormat($from));
        }
        if (!empty($to)) {
            $result = $result->whereDate('date', '<=', DbDateFormat($to));
        }
        
        
        if (!empty($assigneeId) && $assigneeId != 'undefined') {
            $result = $result->where('assigned_member_id', $assigneeId);
        }

        if (!empty($statusId)) {
            $result = $result->where('thread_status_id', $statusId);
        }

        if (\Auth::user()->id != 1) {
            $result = $result->where('receiver_id', \Auth::user()->id)->orWhere('sender_id', \Auth::user()->id);
        }
        return $result->where('thread_type', 'TICKET');
    }

    
    /**
     * @param null $from
     * @param null $to
     * @param null $statusId
     * @param null $assigneeId
     *
     * @return [type]
     */
    public static function getUserAllData($from = null, $to = null, $statusId = null, $priority = null, $assigneeId = null)
    {
        $result = Thread::with(['priority', 'threadStatus', 'customer', 'user.metas'])->where('receiver_id', Auth::user()->id)->orderBy('id', 'desc');
        if (!empty($from)) {
            $result = $result->whereDate('date', '>=', DbDateFormat($from));
        }
        if (!empty($to)) {
            $result = $result->whereDate('date', '<=', DbDateFormat($to));
        }
        if (!empty($assigneeId)) {
            $result = $result->where('assigned_member_id', $assigneeId);
        }
        if (!empty($priority)) {
            if ($priority != 'all') {
                $result = $result->where('priority_id', $priority);
            }
        }
        if (!empty($statusId)) {
            if ($statusId != 'all') {
                $result = $result->where('thread_status_id', $statusId);
            }
        }
        if (\Auth::user()->id != 1) {
            $result = $result->where('receiver_id', \Auth::user()->id);
        }
        return $result->where('thread_type', 'TICKET');
    }

    public function getThreadSummary($from, $to, $status, $customerId = null, $assigneeId = null)
    {
        $whereConditions = '';
        if (empty($from) || empty($to)) {
            $date_range = null;
        } else if (empty($from)) {
            $date_range = null;
        } else if (empty($to)) {
            $date_range = null;
        } else {
            $date_range = 'Available';
        }

        if (!empty($status)) {
            $whereConditions .= " AND threads.thread_status_id = " . $status;
        }
        if (!empty($customerId)) {
            $whereConditions .= " AND thread_replies.sender_id = " . $customerId;
        }
        if (!empty($assigneeId)) {
            $whereConditions .= " AND threads.assigned_member_id = " . $assigneeId;
        }

        if (!empty($date_range)) {
            $from = DbDateFormat($from);
            $to   = DbDateFormat($to);
            $statement = DB::raw("SELECT COUNT(threads.thread_status_id)
                        as total_status,thread_statuses.name,thread_statuses.id, thread_statuses.color as color
                        FROM threads
                        RIGHT JOIN thread_statuses
                        ON thread_statuses.id = threads.thread_status_id
                        " . $whereConditions . "
                        AND  date(threads.date) BETWEEN '" . $from . "' AND '" . $to . "'
                        GROUP BY thread_statuses.id");
            $string = $statement->getValue(DB::connection()->getQueryGrammar());
            $summary = DB::select($string);
        } else {

            $statement = DB::raw("SELECT COUNT(threads.thread_status_id)
                        as total_status,thread_statuses.name,thread_statuses.id, thread_statuses.color as color
                        FROM threads
                        RIGHT JOIN thread_statuses
                        ON thread_statuses.id = threads.thread_status_id
                        " . $whereConditions . "
                        GROUP BY thread_statuses.id");
            $string = $statement->getValue(DB::connection()->getQueryGrammar());

            $summary = DB::select($string);
        }
        return $summary;
    }

    public function getExceptClickedStatus($status, $customerId = null, $projectId = null, $form = null, $to = null)
    {
        $data = DB::table('threads')
            ->leftjoin('thread_statuses', 'thread_statuses.id', '=', 'threads.thread_status_id')
            ->select('thread_statuses.name', DB::raw("COUNT(threads.thread_status_id) as total_status"), 'thread_statuses.id', 'thread_statuses.color as color')
            ->groupBY('thread_statuses.id');
        if (!empty($status)) {
            $data->where('threads.thread_status_id', '=', $status);
        }
        if (!empty($customerId)) {
            $data->where('threads.receiver_id_id', '=', $customerId);
        }

        if (!empty($projectId)) {
            $data->where('threads.project_id', '=', $projectId);
        }
        if (!empty($form)) {
            $data->whereDate('threads.date', '>=', DbDateFormat($form));
        }
        if (!empty($to)) {
            $data->whereDate('threads.date', '<=', DbDateFormat($to));
        }
        return $data->get();
    }

    public function getFilteredStatus($options = [])
    {
        $conditions = [];
        $otherStatuses = DB::table('threads');
        $flag = 0;
        $customerId = isset($options['customerId']) && !empty($options['customerId']) ? $options['customerId'] : null;
        if (isset($options['allproject']) && !empty($options['allproject'])) {
            $conditions['project_id'] = $options['allproject'];
        }

        if (isset($options['allstatus']) && !empty($options['allstatus'])) {
            $otherStatuses = $this->leftjoin('thread_statuses', 'thread_statuses.id', '=', 'threads.thread_status_id')->where('threads.thread_status_id', '!=', $options['allstatus']);

            if (isset($options['customerId']) && !empty($options['customerId'])) {
                $otherStatuses->where('threads.sender_id', $customerId);
            }

            if (isset($options['allassignee']) && !empty($options['allassignee'])) {
                $otherStatuses->where('threads.assigned_member_id', $options['allassignee']);
            }

            if (isset($options['from']) && !empty($options['from'])) {
                $otherStatuses->whereDate('threads.date', '>=', DbDateFormat($options['from']));
            }

            if (isset($options['to']) && !empty($options['to'])) {
                $otherStatuses->whereDate('threads.date', '<=', DbDateFormat($options['to']));
            }

            $otherStatuses = $otherStatuses->select(DB::raw('COUNT(threads.thread_status_id) as total_status'), 'thread_statuses.name', 'thread_statuses.id', 'thread_statuses.color as color')->groupBY('thread_statuses.id');

            $flag = 1;
        }

        return $flag ? $otherStatuses->get() : "";
    }
}
