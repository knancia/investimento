<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\UserGroup as Authenticatable;

class UserGroup extends Model
{
    use Notifiable;
    use SoftDeletes;

    public      $timestamps   = true;
    protected   $table          = 'user_groups';
    protected   $fillable       = ['user_id', 'group_id', 'permission'];
    protected   $hidden         = [];

}
