<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')->where('table_name', 'services');
    }

    public function getServiceNameAttribute()
    {
        return $this->translations()->where('column_name', 'service_name')->first();
    }

    public function getServiceDescAttribute()
    {
        return $this->translations()->where('column_name', 'service_desc')->first();
    }

    public function getServiceContentAttribute()
    {
        return $this->translations()->where('column_name', 'service_content')->first();
    }
}
