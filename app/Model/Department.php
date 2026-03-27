<?php


namespace Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'department_id';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_departments', 'department_id', 'user_id');
    }
}
