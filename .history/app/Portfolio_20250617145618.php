<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['image_1'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')->where('table_name', 'portfolios');
    }

    // public function getProjectNameAttribute()
    // {
    //     return $this->translations()->where('column_name', 'project_name')->first();
    // }

    // public function getProjectDescAttribute()
    // {
    //     return $this->translations()->where('column_name', 'project_desc')->first();
    // }

    // public function getProjectContentAttribute()
    // {
    //     return $this->translations()->where('column_name', 'project_content')->first();
    // }
}
