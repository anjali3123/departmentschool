<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function department() {
        return $this->belongsTo(Department::class,'departmentid','id');
    }

    public static function softDelete($condition)
    {
        return DB::table('students')->where($condition)->update(['isDeleted'=>1]);
    }
}
