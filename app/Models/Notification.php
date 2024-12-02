<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['id_notice', 'alias'];

    public function notice()
    {
        return $this->belongsTo(Notice::class, 'id_notice'); // 'id_notice' deve ser a chave estrangeira correta
    }

}
