<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQQuestion extends Model
{
    protected $fillable = ['f_a_q_category_id', 'question', 'is_faq'];

    public function getIsFaqAttribute($value): bool
    {
        return (bool)$value;
    }

    public function category()
    {
        return $this->belongsTo(FAQCategory::class, 'faq_category_id');
    }
}
