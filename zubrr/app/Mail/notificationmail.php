<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
$users = User::where('email', '!=', auth()->user()->email)->get();
class notificationmail extends Mailable
{
    use Queueable, SerializesModels;
    public function build()
    {
    return $this->view('mail.hello');
    }
}
