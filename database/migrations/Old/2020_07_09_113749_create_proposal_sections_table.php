<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_sections', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('proposal_name');
            $table->string('section_type');
            $table->string('title');
            $table->longText('content');
            $table->integer('content');
            $table->string('created_by');
            $table->timestamps();
            $table->integer('approved_by');
            $table->timestamps('approved_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_sections');
    }
}
