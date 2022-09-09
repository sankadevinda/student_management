<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'image_id',
        'status',
    ];

    public function images(){
        return $this->hasOne(Image::class,'id','image_id');
    }

    public function allActive(){
        return $this->where('status','1')->get();
    }
}
