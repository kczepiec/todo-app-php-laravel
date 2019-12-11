<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';

    protected $fillable = ['name'];

    // public function users()
    // {
    //     $this->belongsTo('App\User');
    // }
}
