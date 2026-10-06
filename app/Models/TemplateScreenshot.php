<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateScreenshot extends Model
{
    protected $fillable = ['template_id', 'image_path', 'caption', 'sort_order'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}