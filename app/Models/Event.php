<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'format', 'tags', 'content','date','location','image','user_id', 'age_minimum', 'age_maximum'];
}
