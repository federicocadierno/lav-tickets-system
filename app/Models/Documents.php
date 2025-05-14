<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'doc_id',
        'doc_name'
    ];

    public function item() {
        return $this->belongsTo('App\Tickets');
    }

}
