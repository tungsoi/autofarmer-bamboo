<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyHistory extends Model
{
    /**
     * Table name
     */
    protected $table = "buy_histories";

    /**
     * Fields
     */
    protected $fillable = [
        'user_id',
        'time',
        'self_amount',
        'self_price',
        'self_total',
        'sponsor_amount',
        'sponsor_price',
        'sponsor_total',
        'sim_amount',
        'sim_price',
        'sim_total',
        'clone_amount',
        'clone_price',
        'clone_total',
        'total_money'
    ];
}
