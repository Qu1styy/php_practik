<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines';
    protected $primaryKey = 'discipline_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany(User::class, 'discipline_users', 'discipline_id', 'user_id');
    }
}