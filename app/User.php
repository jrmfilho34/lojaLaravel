<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Access;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accesses()
{
    // Não esqueça de usar a classe Access: use App\Models\Access;
    return $this->hasMany(Access::class);
}

public function registerAccess()
{
    // Cadastra na tabela accesses um novo registro com as informações do usuário logado + data e hora
    return $this->accesses()->create([
        'user_id'   => $this->id,
        'datetime'  => date('YmdHis'),
    ]);
}

}
