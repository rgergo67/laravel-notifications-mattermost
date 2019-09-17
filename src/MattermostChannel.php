<?php

namespace Rgergo67\Mattermost;

use Illuminate\Notifications\Notification;
use Psr\Http\Message\ResponseInterface;

class MattermostChannel
{
    /**
     * @var Mattermost
     */
    protected $mattermost;

    /**
     * Create a new Mattermost channel instance.
     *
     * @param  Mattermost  $mattermost
     */
    public function __construct(Mattermost $mattermost)
    {
        $this->mattermost = $mattermost;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  Notification  $notification
     *
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $url = $notifiable->routeNotificationFor('mattermost')) {
            return;
        }

        $message = $notification->toMattermost($notifiable);

        return $this->mattermost->send($message, $url);
    }
}
