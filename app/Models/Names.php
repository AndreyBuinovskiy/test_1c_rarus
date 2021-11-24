<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Names extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reason_for_refusal',
        'status',
        'date_status'
    ];
}
