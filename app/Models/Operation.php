<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function notices()
    {
        return $this->hasMany(Notice::class, 'operation_id');
    }
}
