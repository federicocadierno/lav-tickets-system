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
        'ticket_id',
        'doc_name'
    ];

    public function ticket_docs() {
        return $this->belongsTo('App\Tickets');
    }

}
