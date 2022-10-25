<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $table = 'task';

    protected $fillable = [
        'task',
        'user_id',
        'status',
    ];
}
