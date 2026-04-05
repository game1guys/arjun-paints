<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'description',
    'discount_type',
    'discount_value',
    'starts_at',
    'ends_at',
    'is_active',
    'is_festival',
    'festival_name',
])]
class Offer extends Model
{
    protected function casts(): array
    {
        return [
            'discount_value' => 'decimal:2',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'is_active' => 'boolean',
            'is_festival' => 'boolean',
        ];
    }

    public function isPercent(): bool
    {
        return $this->discount_type === 'percent';
    }
}
