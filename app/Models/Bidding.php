<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'biddings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner_id', 'inquiry_id', 'bidding_price'
    ];
}
