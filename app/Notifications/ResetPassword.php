<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    public $token;

    public static $toMailCallback;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Notificação de reset de senha'))
            ->line(Lang::getFromJson('Você está recebendo esta mensagem porque recebemos uma solicitação de reset de senha.'))
            ->action(Lang::getFromJson('Resetar Senha'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Se você não solicitou o reset de senha, ignore essa mensagem.'));
    }

    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
