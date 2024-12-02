<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'notification_user', 'id_user', 'id_notification')
            ->withPivot('seen', 'date_seen')
            ->withTimestamps();
    }
}
