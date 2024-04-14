<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Attendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_date',
        'work_start_time',
        'work_end_time',
        'work_span_time',
        'work_span_second',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}