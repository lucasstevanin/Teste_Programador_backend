<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationUser extends Model
{
    use HasFactory;

    // Permite preenchimento em massa
    protected $fillable = ['id_notification', 'id_user', 'seen', 'date_seen', 'timestamp'];

    // Relacionamento: Um NotificationUser pertence a uma Notification
    public function notification()
    {
        return $this->belongsTo(Notification::class, 'id_notification');
    }
}

