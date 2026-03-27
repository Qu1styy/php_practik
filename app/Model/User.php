<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'login',
        'email',
        'gender_id',
        'password',
        'registration_address',
        'date_birth',
        'password',
        'user_id',
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
        return self::where('user_id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->user_id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'gender_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function discipline()
    {
        return $this->belongsToMany(Discipline::class, 'discipline_users', 'user_id', 'discipline_id'
        );
    }

    public function department()
    {
        return $this->belongsToMany(Department::class, 'user_departments', 'user_id', 'department_id'
        );
    }

}