<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        $this->belongsTo(User::class)->withDefault([
            'name'=>'Guest Customer',
        ]);
    }

    public function products()
    {
        $this->belongsToMany(Product::class,'order_items','order_id','product_id','id','id')
            ->using(OrderItem::class)
            ->withPivot([
                'pr oduct_name','price','quantity',
            ]);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }



    protected static function booted()
    {
        static::creating(function (Order $order)
        {
            $order->number =Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber()
    {
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at',$year)->max('number');
        if($number){
            return $number + 1;
        }
        return $year . '0001';
    }
}
