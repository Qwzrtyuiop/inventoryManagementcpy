<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'stock',
        'information',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    protected static function booted()
    {
        static::deleting(function ($item) {
            \App\Models\Log::create([
                'item_id'            => $item->id,
                'item_name_snapshot' => $item->name,
                'action'             => 'Item removed',
                'quantity'           => $item->stock,
            ]);
        });
    }
}
