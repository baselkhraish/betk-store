<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeFilter(Builder $builder , $filters)
    {
        if($filters['name']?? false){
            $builder->where('name','LIKE',"%{$filters['name']}%");
        }
    }
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
