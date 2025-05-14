<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'type',
        'mode_of_transport',
        'product_to_import_export',
        'country_of_origin_destination',
        'status',
        'mode_of_transport',
    ];

}
