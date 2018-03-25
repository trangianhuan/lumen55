<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'storeId',
        'comment',
        'dateCreate'
    ];
}
