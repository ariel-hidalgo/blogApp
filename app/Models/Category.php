<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_category' , 'user_id'];
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
