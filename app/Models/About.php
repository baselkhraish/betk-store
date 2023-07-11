<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class About extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getImageUrlAttribute()
    {
        if(!$this->image){
            return "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg";
        }
        if(Str::startsWith($this->image, ['http://','https:/'])){
            return $this->image;
        }
        return asset('storage/'.$this->image);
    }
}
