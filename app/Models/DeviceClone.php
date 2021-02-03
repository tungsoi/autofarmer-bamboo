<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceClone extends Model
{
    /**
     * Table name
     */
    protected $table = "clones";

    /**
     * Fields
     */
    protected $fillable = [
        'device_imei',
        'setting_2fa',
        'setting_lang',
        'time_store',
        'action',
        'action1',
        'action2',
        'action3',
        'action4',
        'action_live',
        'alive_status',
        'avatar',
        'cookie',
        'count_join_group',
        'country',
        'created_at_datetime',
        'updated_at_datetime',
        'updated_last_datetime',
        'email',
        'fa',
        'is_autofarmer_clone',
        'language',
        'prefix',
        'token',
        'type',
        'uid',
        'value',
        '_id',
    ];

    public function device() {
        return $this->hasOne('App\Models\Device', 'imei', 'device_imei');
    }

    public function user() {
        return $this->hasOne('App\User', 'token', 'token');
    }
}
