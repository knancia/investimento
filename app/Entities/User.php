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

    public function groups()
    {
        // RELACIONAMENTO N:N
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    /**
     * Mascara CPF para VIEW
     */
    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return substr($cpf, 0, 3). "." .substr($cpf, 3, 3). "." .substr($cpf, 6, 3). "-" .substr($cpf, -2);
    }

    /**
     * Mascara Telefone para VIEW
     */
    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];

        if (strlen($phone) == 10)
        {
            return "(" .substr($phone, 0, 2). ") " .substr($phone, 2, 4). "-" .substr($phone, 6, 4);
        }
        elseif (strlen($phone) > 10)
        {
            return "(" .substr($phone, 0, 2). ") " .substr($phone, 2, 5). "-" .substr($phone, 7, 4);
        }
        else
        {
            return "Não Informado";
        }
    }

    /**
     * Mascara Data de Nascimento para a VIEW
     */
    public function getFormattedBirthAttribute()
    {
        $birth = explode("-", $this->attributes['birth']);
        if (count($birth) == 3)
        {
            return $birth = $birth[2]. "/" .$birth[1]. "/" .$birth[0];
        }
        else
        {
            return "Não Informado";
        }
    }
}










