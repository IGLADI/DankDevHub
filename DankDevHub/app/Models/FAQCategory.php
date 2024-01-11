<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(FAQQuestion::class);
    }

    public function faqQuestions()
    {
        return $this->hasMany(FaqQuestion::class);
    }
}
