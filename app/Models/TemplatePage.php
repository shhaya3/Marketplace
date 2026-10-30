<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplatePage extends Model
{
    use HasFactory;

    protected $fillable = ['template_id', 'name', 'slug', 'sort_order'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}