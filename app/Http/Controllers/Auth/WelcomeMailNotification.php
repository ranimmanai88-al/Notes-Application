<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\WelcomeMailNotification;

class WelcomeMailNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bienvenue sur notre application !')
            ->greeting('Bonjour '.$notifiable->name.' !')
            ->line('Merci pour votre inscription sur notre plateforme.')
            ->action('Accéder à votre compte', url('/dashboard'))
            ->line('Nous sommes ravis de vous compter parmi nous !');
    }
}