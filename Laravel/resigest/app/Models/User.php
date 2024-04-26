<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail//verificación de correo
{
    use HasFactory, Notifiable;
    public function empleado()//tiene un solo empleado
    {
        return $this->hasOne(Empleado::class, 'dni', 'dni'); //(tabla local,tabla referencia) por que no se sigue la convención.
    }

    public function familiar() //cada usuario tiene un unico familiar
    {
        return $this->hasOne(Familiar::class, 'dni', 'dni'); //(tabla local,tabla referencia)

    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'dni',
        'email',
        'departamento_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
