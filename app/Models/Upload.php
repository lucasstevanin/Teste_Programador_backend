<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'notice_id',
        'file_path',
        'file_type',
    ];

    public function notice()
    {
        return $this->belongsTo(Notice::class, 'notice_id');
    }
}
