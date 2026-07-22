<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'long_description',
        'thumbnail',
        'preview_url',
        'status',
        'view_count',
        'meta_title',
        'meta_description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pages()
    {
        return $this->hasMany(TemplatePage::class);
    }

    public function features()
    {
        return $this->hasMany(TemplateFeature::class);
    }

    public function screenshots()
    {
        return $this->hasMany(TemplateScreenshot::class);
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}