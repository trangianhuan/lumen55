<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'map',
        'dateCreate'
    ];

    public function reviews($value='')
    {
        return $this->hasMany(Review::class,'storeId');
    }
}
