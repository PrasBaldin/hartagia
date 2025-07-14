<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    // Jika kamu hanya punya 1 baris di tabel ini
    public $timestamps = true;

    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'primary_language',
        'partner_logos',
        'contact_email',
        'contact_phone',
        'contact_wa',
        'office_address',
        'facebook_url',
        'instagram_url',
        'tiktok_url',
    ];

    // Kalau kamu ingin partner logos langsung dibaca sebagai array
    public function getPartnerLogosAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }

    public function setPartnerLogosAttribute($value)
    {
        $this->attributes['partner_logos'] = json_encode($value);
    }
}
