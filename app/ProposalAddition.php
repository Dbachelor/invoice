<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalAddition extends Model
{
    //
    protected $table='proposal_additions';

    protected $fillable=['proposal_name', 'section', 'title', 'answer', 'created_by'];
}
