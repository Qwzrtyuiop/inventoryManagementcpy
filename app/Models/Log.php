<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'item_name_snapshot',
        'action',
        'quantity',
        'batch_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }
}
