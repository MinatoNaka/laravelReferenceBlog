<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];
}
