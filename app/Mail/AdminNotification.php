<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $phone, $service;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $service)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
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
            ->subject('New Application received')
            ->markdown('common.notification')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'service' => $this->service
            ]);
    }
}
