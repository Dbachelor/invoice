<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalReplace extends Model
{
    //
    protected $table='proposal_replaces';

    protected $fillable=['proposal_name', 'content', 'content_complete',  'created_by'];
}
