<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable=[
        'product_id',
        'images',
        'mileage',
        'transmission',
        'exterior_color',
        'interior_color',
        'product_engine',
        'fuel_economy',
        'registered_city',
        'drive_train',
        'fuel_type',
        'condition',
        'steering',
        'no_of_seats',
        'front_ac_status',
        'power_steering_status',
        'air_bags_status',
        'abs_status',
        'air_conditioner_status',
        'leather_seats_status',
        'fog_light_status',
        'cd_dvd_player_status',
        'sound_system_status',
        'am_fm_status',
        'safety_belts_status',
        'description'
    ];

}
