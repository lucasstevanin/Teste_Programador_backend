<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_type_id',
        'procedure_id',
        'operation_id',
        'content',
        'description',
        'popup',
        'deadline',
        'author',
        'status',
        'publish'
    ];

    protected $attributes = [
        'publish' => 'Sim', // Valor padrão
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'id_notice'); // 'id_notice' deve ser a chave estrangeira correta na tabela 'notifications'
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class, 'procedure_id');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_id');
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class, 'notice_id');
    }
}
