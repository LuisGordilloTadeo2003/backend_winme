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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('maxMembers')->default(100);
            $table->string('picture');
            $table->boolean('isPublic')->default(false);
            $table->integer('invitationCode');
            $table->boolean('isPremium')->default(false);
            $table->integer('dailyBets')->default(5);
            $table->integer('points')->default(0);
            $table->text('description');
            $table->foreignId('level_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
