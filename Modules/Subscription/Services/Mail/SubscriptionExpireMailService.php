<?php

namespace Modules\Subscription\Services\Mail;

use App\Services\Mail\TechVillageMail;

class SubscriptionExpireMailService extends TechVillageMail
{
    /**
     * Send mail to user
     * @param int $id
     * @return array $response
     */
    public function send($id)
    {
        $email = $this->getTemplate(preference('dflt_lang'), 'subscription-expire');

        if (!$email['status']) {
            return $email;
        }

        // Replacing template variable
        $subject = str_replace('{company_name}', preference('company_name'), $email->subject);

        $subscription = subscription('getSubscription', $id);

        $data = [
            '{customer_name}' => $subscription?->user?->name,
            '{day_left}' => subscription('timeLeft', $id),
            
            '{home_url}' => route('frontend.index'),
            '{company_name}' => preference('company_name'),
            '{support_mail}' => preference('company_email'),
            '{year}' => date("Y"),
            '{logo}' => $this->logo,
        ];

        $message = str_replace(array_keys($data), $data, $email->body);

        return $this->email->sendEmail($subscription?->user?->email, $subject, $message, null, preference('company_name'));
    }
}
