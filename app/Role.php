<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
      'role', 'user_id'
    ];

    public function users()
    {
      return $this->hasMany('App\User');
    }
}
