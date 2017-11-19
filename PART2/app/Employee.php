<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    const TABLE_NAME = "employees";
    const STATE_ONLINE_ACTIVE = 1;

    protected $table = self::TABLE_NAME;
    protected $fillable = ['id', 'isOnline', 'salary', 'age', 'position', 'name', 'gender', 'email', 'phone', 'address', 'skills'];
    
    public $primaryKey = 'id_user';
    public $timestamps = false;

    public function listByRangeSalary($rangeMin = null, $rangeMax = null)
    {
        $result = DB::table(self::TABLE_NAME)
            ->orderBy('name', 'ASC');
        
        if (!is_null($rangeMin))
            $result->where('salary', '>=', $rangeMin);

        if (!is_null($rangeMax))
            $result->where('salary', '<=', $rangeMax);

        //dd($result->toSql());       
        return $result->get();
    }
}