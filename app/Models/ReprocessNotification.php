<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReprocessNotification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reprocess_notification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'status'
    ];

}
