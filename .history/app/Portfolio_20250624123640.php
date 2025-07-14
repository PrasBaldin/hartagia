<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')
            ->where('table_name', 'portfolios');
    }

    public function getProjectNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'project_name')
            ->where('language', $locale)
            ->first();
    }

    public function getProjectDescAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'project_desc')
            ->where('language', $locale)
            ->first();
    }

    public function getProjectContentAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'project_content')
            ->where('language', $locale)
            ->first();
    }
}
