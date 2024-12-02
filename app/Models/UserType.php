<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function notices()
    {
        return $this->hasMany(Notice::class, 'user_type_id');
    }
}


