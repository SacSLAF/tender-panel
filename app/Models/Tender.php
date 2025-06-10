<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    protected $fillable = [
        'tender_no',
        'category',
        'entitled_to_quote',
        'items',
        'date_of_opening',
        'type',
    ];

    // In your Tender model
    protected $casts = [
        'date_of_opening' => 'date',
    ];
}
