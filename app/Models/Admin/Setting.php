<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value'
    ];

    const KEY_SETTING_BASIC = 'basic';
    const KEY_SETTING_INTRODUCE = 'introduce';
    const KEY_SETTING_CONTACT = 'contact';
    const PATH_FILE_UPLOAD = 'setting';

    /**
     * Interact with the user's first name.
     */
    protected function value(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE),
        );
    }
}
