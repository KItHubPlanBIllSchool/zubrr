<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectname');
            $table->datetime('start');
            $table->datetime('end');
            $table->string('desc');
            $table->integer('user_id');
            $table->string('state');
            $table->integer('kv1');
            $table->integer('kv2');
            $table->integer('kv3');
            $table->integer('kv4');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
