<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Breaktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'break_date',
        'break_start_time',
        'break_end_time',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}