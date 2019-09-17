<?php

namespace Rgergo67\Mattermost;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\ChannelManager;

class MattermostChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('mattermost', function ($app) {
                return new MattermostChannel($app->make(Mattermost::class));
            });
        });
    }
}
