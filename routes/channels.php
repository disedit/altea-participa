<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Broadcasting is not enabled in this application. To enable it, add
| "channels: __DIR__.'/../routes/channels.php'" to withRouting() in
| bootstrap/app.php.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
