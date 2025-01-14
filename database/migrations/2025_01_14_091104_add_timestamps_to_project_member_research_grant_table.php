<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToProjectMemberResearchGrantTable extends Migration
{
    public function up()
    {
        Schema::create('project_member_research_grant', function (Blueprint $table) {
            $table->foreignId('project_member_id')->constrained('academicians', 'staff_number')->onDelete('cascade'); // Foreign key to academicians
            $table->foreignId('research_grant_id')->constrained('research_grants')->onDelete('cascade'); // Foreign key to research_grants
            $table->timestamps(); // This will create created_at and updated_at columns
            $table->primary(['project_member_id', 'research_grant_id']); // Composite primary key
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_member_research_grant');
    }
}