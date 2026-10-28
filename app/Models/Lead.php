<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'source',
        'status',
        'last_contacted_at',
        'notes',
    ];

    protected $casts = [
        'last_contacted_at' => 'date',
    ];
}