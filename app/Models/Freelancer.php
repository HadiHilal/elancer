<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $primaryKey = "user_id";
    protected $fillable = ['name' , 'geneder' , 'birthday' , 'title'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id')->withDefault();
    }
}
