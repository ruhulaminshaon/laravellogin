<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Notifiable;

class Apikey extends Model
{
	// use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','api_token',
    ];

}
