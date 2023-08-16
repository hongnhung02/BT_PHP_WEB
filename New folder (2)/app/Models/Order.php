<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'address',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function total_price()
    {
        $details = $this->details->all();
        $total_price = 0;
        foreach($details as $detail) {
            $total_price += $detail->product->price * $detail->quantity;
        }
        return $total_price;
    }
}
