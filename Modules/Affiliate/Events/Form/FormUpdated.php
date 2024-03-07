<?php


namespace Modules\Affiliate\Events\Form;

use Modules\Affiliate\Entities\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class FormUpdated
{
    use Queueable, SerializesModels;

    /**
     * The updated form
     *
     * @var Modules\FormBuilder\Models\Form
     */
    public $form;

    /**
     * Create a new event instance.
     *
     * @param Modules\FormBuilder\Models\Form $form
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }
}
