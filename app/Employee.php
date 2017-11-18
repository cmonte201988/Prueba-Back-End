<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    const TABLE_NAME = "employees";
    const STATE_ONLINE_ACTIVE = 1;

    protected $table = self::TABLE_NAME;
    protected $fillable = ['id', 'isOnline', 'salary', 'age', 'position', 'name', 'gender', 'email', 'phone', 'address', 'skills'];
    
    public $primaryKey = 'id_user';
    public $timestamps = false;

}