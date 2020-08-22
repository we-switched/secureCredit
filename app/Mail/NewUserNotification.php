<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $service;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $service)
    {
        $this->name = $name;
        $this->service = $service;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from('contact@securecredit.in', 'Secure Credit')
            ->subject('Application received')
            ->markdown('common.mail')
            ->with([
                'name' => $this->name,
                'service' => $this->service
            ]);
    }
}