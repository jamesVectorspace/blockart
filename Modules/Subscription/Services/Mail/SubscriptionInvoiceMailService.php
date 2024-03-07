<?php

namespace Modules\Subscription\Services\Mail;

use App\Services\Mail\TechVillageMail;

class SubscriptionInvoiceMailService extends TechVillageMail
{
    /**
     * Send mail to user
     *
     * @param object $request
     * @return array|object $response
     */
    public function send($request)
    {
        $email = $this->getTemplate(preference('dflt_lang'), 'subscription-invoice');

        if (!$email['status']) {
            return $email;
        }

        // Send pdf with mail
        createDirectory("public/uploads/invoices");
        $invoiceName = 'Invoice-' . $request->code . '-' . uniqid() . '.pdf';
        subscription('invoicePdfEmail', $request, $invoiceName);

        $user = $request->user()->first();

        // Replacing template variable
        $subject = str_replace(['{company_name}'], [preference('company_name')], $email->subject);

        if ($request->billing_cycle) {
            $plan = $request?->package?->name;
        } else {
            $plan = $request?->credit?->name;
        }

        $data = [
            '{logo}' => $this->logo,
            '{subscription_code}' => $request->code,
            '{plan}' => $plan,
            '{next_billing_date}' => timeZoneFormatDate($request->next_billing_date),
            '{user_name}' => $request?->user?->name,
            '{contact_number}' => preference('company_phone'),
            '{company_name}' => preference('company_name'),
            '{support_mail}' => preference('company_email'),
        ];

        $message = str_replace(array_keys($data), $data, $email->body);
        if (!empty($user->email)) {
            return $this->email->sendEmailWithAttachment($user->email, $subject, $message, $invoiceName, preference('company_name'));
        }

        return ['status' => false, 'message' => __('User email not found.')];
    }
}
