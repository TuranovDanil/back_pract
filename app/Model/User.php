<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'login',
        'password',
        'surname',
        'patronymic',
        'sex',
        'birth',
        'address',
        'id_position',
        'id_division',
        'role'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
        });
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }

    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        }
        return false;
    }

    public function isModer()
    {
        if ($this->role == 'moder') {
            return true;
        }
        return false;
    }

    public function isWorker()
    {
        if ($this->role == 'worker') {
            return true;
        }
        return false;
    }

}
