<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'servc_id',
        'checkin_date',
        'checkout_date',
        'price',
        'qty',
    ];

    /**
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function services(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'servc_id', 'id');
    }
}
