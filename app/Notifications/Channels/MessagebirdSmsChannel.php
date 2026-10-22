<?php

namespace App\Notifications\Channels;

use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;
use NotificationChannels\Messagebird\MessagebirdClient;
use NotificationChannels\Messagebird\MessagebirdMessage;

/**
 * Sends an SMS through MessageBird and lets failures throw CouldNotSendNotification.
 *
 * The package's own channel (v4+) swallows send errors, but the booth needs to
 * know when an SMS failed so it can roll back the voter's attempt.
 */
class MessagebirdSmsChannel
{
    /**
     * Send the given notification.
     *
     * @throws \NotificationChannels\Messagebird\Exceptions\CouldNotSendNotification
     */
    public function send(object $notifiable, Notification $notification): mixed
    {
        $message = $notification->toMessagebird($notifiable);

        if (is_string($message)) {
            $message = MessagebirdMessage::create($message);
        }

        $client = new MessagebirdClient(new Client, config('services.messagebird.access_key'));

        return $client->send($message);
    }
}
