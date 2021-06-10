<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalConstant extends Model
{
    //
    protected $table='proposal_constants';

    protected $fillable=['proposal_name', 'section', 'variable', 'content', 'addition', 'type', 'created_by'];
}
