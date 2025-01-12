<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMilestonesTable extends Migration
{
    public function up()
    {
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_grant_id')->constrained('research_grants')->onDelete('cascade'); // Foreign key to research_grants
            $table->string('name'); // Milestone name
            $table->date('target_completion_date'); // Target completion date
            $table->string('deliverable'); // Deliverable
            $table->string('status')->nullable(); // Status of the milestone
            $table->text('remark')->nullable(); // Remarks for the milestone
            $table->date('date_updated')->nullable(); // Date of the last update
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_milestones');
    }
}