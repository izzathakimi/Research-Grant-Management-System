<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchGrantsTable extends Migration
{
    public function up()
    {
        Schema::create('research_grants', function (Blueprint $table) {
            $table->id();
            $table->decimal('grant_amount', 10, 2); // Grant amount
            $table->string('grant_provider'); // Grant provider
            $table->string('project_title'); // Project title
            $table->date('start_date'); // Start date
            $table->integer('duration'); // Duration in months
            $table->foreignId('project_leader_id')
                  ->constrained('academicians', 'staff_number')
                  ->onDelete('cascade'); // Foreign key to academicians with cascade on delete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_grants');
    }
}
