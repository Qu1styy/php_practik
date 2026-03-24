<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';
    protected $primaryKey = 'gender_id';
    public $timestamps = false;
}