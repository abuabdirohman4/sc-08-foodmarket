<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'ingredients', 'price', 'rate', 'types', 'picture_path'
    ];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)>timestamp;
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)>timestamp;
    }

    // public function toArray() {
    //     $toArray = parent::toArray();
    //     $toArray['picturePath'] = $this->picturePath;
    //     return $toArray;
    // }

    public function getPicturePathAttribute() {
        // return url('') . Storage::url($this->attributes['picturePath']);
        return url('') . Storage::url('picture_path');
    }
}
