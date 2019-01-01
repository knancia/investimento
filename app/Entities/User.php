<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail; //Não aparece na video aula
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes; //Aparece somente na video aula
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public      $timestamps     = true;
    protected   $table          = 'users';
    protected   $fillable       = ['cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected   $hidden         = ['password', 'remember_token',];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }
}










