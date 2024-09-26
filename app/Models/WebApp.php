<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class WebApp extends Model
{
    protected $table = 'data';

    protected $fillable = [
        'webapp_data',
    ];

    public $timestamps = false;
}
