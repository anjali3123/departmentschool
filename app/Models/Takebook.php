<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takebook extends Model
{
    use HasFactory;
    protected $table ='takebooks';

    protected $fillable = [
        'studentid',
        'bookid',
        'libraryid',
        'to_date',
        'status',
    ];
    public function student(){
        return $this->belongsTo(Student::class,'studentid','id');
    }
    public function book(){
        return $this->belongsTo(Book::class,'bookid','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'libraryid','id');
    }
    
}
