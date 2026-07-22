<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'full_name',
        'email',
        'phone',
        'business_name',
        'business_category',
        'message',
        'status',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}