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

    public function getProjectNameAttribute()
    {
        return $this->translations()->where('column_name', 'project_name')->first();
    }

    public function getProjectDescAttribute()
    {
        return $this->translations()->where('column_name', 'project_desc')->first();
    }

    public function getProjectContentAttribute()
    {
        return $this->translations()->where('column_name', 'project_content')->first();
    }

    public function getImage1Attribute()
    {
        return $this->image_1 ? asset('storage/' . $this->image_1) : null;
    }

    public function getImage2Attribute()
    {
        return $this->image_2 ? asset('storage/' . $this->image_2) : null;
    }

    public function getImage3Attribute()
    {
        return $this->image_3 ? asset('storage/' . $this->image_3) : null;
    }

    public function getImage4Attribute()
    {
        return $this->image_4 ? asset('storage/' . $this->image_4) : null;
    }

    public function getImage5Attribute()
    {
        return $this->image_5 ? asset('storage/' . $this->image_5) : null;
    }
}
