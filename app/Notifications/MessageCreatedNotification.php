<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use App\Http\Resources\UserResource;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\DatabaseChannel;

class MessageCreatedNotification extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Message
     */
    private $message;

    /**
     * MessageCreatedNotification constructor.
     *
     * @param \App\Models\Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if ($notifiable->is($this->message->sender)) {
            return [];
        }

        return [DatabaseChannel::class, FcmChannel::class];
    }

    public function toFCM($notifiable)
    {
        return (new FCMMessage())
            ->setData([
                'title' => $this->message->sender->name,
                'body' => trans('notifications.messages.chat'),
                'view' => [
                    'id' => $this->message->conversation_id,
                    'type' => 'conversation‏',
                    'data' => $this->message->sender,
                ],
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
            ])
            ->setContentAvailable(true)
            ->setMutableContent(true)
            ->setPriority(FcmMessage::PRIORITY_HIGH);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message_id' => $this->message->id,
            'conversation_id' => $this->message->conversation_id,
            'user_id' => $this->message->user_id,
        ];
    }
}
