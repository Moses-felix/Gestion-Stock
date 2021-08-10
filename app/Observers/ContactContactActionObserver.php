<?php

namespace App\Observers;

use App\Models\ContactContact;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ContactContactActionObserver
{
    public function created(ContactContact $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ContactContact'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
