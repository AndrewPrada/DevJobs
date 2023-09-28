<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicant extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $vacancy_id;
    public $vacancy_name;
    public $user_id;

    public function __construct($vacancy_id, $vacancy_name, $user_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_name = $vacancy_name;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');

        return (new MailMessage)
            ->line('Has recibido un nuevo candidato en tu vacante.')
            ->line('La vacante es: ' . $this->vacancy_name)
            ->action('Ver Notificaciones', $url)
            ->line('Gracias por utilizar DevJobs');
    }

    /**
     * Store the notification in the database
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_name' => $this->vacancy_name,
            'user_id' => $this->user_id
        ];
    }
}
