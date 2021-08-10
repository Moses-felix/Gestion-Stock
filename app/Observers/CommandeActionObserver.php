<?php

namespace App\Observers;

use App\Models\Commande;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CommandeActionObserver
{
    public function created(Commande $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Commande'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
