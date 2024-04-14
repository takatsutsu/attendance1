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
        'break_span_time',
        'break_span_second',
        'attendee_id',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
    public function attendee()
    {
        return $this->belongsTo("App\Models\Attendee");
    }
}