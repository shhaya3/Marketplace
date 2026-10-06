<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateFeature extends Model
{
    protected $fillable = ['template_id', 'feature', 'sort_order'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}