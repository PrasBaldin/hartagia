<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['image', 'slug'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')
            ->where('table_name', 'services');
    }

    public function getServiceNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'service_name')
            ->where('language', $locale)
            ->first();
    }

    public function getServiceDescAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'service_desc')
            ->where('language', $locale)
            ->first();
    }

    public function getServicePointsAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'service_point_1')
            ->where('language', $locale)
            ->first();
    }

    public function getServiceContentAttribute()
    {
        $locale = app()->getLocale();
        return $this->translations
            ->where('column_name', 'service_content')
            ->where('language', $locale)
            ->first();
    }
}
