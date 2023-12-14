<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    public static function softDelete($condition)
    {
        return DB::table('books')->where($condition)->update(['isDeleted'=>1]);
    }
}
