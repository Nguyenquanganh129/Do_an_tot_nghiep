<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lienhe extends Model
{
    protected $fillable = [
        'fullname', 'email', 'phone', 'comment'
    ];
}
