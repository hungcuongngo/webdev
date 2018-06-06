<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiddingInvite extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bidding_invites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inquiry_id', 'partner_id', 'sent_count', 'opened'
    ];
}
