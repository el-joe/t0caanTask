<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'class',
        'configuration',
        'required_fields',
        'active',
    ];

    protected $casts = [
        'configuration' => 'array',
        'required_fields' => 'array',
        'active' => 'boolean',
    ];

    // Scopes

    function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
