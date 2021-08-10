<?php

namespace App\Observers;

use App\Models\DemandeAchat;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class DemandeAchatActionObserver
{
    public function created(DemandeAchat $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'DemandeAchat'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
