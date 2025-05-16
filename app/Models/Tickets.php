<?php

namespace App\Models;

use App\Models\{User, Notes};
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
        'status'
    ];

    public function user()
    {
        //return $this->hasOne(User::class, 'foreign_key', 'local_key');
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Documents::class, 'ticket_id', 'id');
    }

    public function notes()
    {
        return $this->hasMany(Notes::class, 'ticket_id', 'id');
    }

}
