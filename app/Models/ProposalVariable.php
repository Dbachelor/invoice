<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalVariable extends Model
{
    //
    protected $table='proposal_variables';

    protected $fillable=['proposal_name', 'client_name', 'variable', 'constant', 'header', 'content', 'created_by'];
}
