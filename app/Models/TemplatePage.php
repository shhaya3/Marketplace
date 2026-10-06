<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplatePage extends Model
{
    protected $fillable = ['template_id', 'name', 'slug', 'sort_order'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}