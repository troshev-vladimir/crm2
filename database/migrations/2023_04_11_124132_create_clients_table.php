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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('potencial_id');
            $table->foreign('potencial_id')->references('id')->on('client_potentials');

            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('client_activities');

            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->string('phone_add');
            $table->string('address');
            $table->string('address_add');
            $table->string('site');
            $table->string('vk');
            $table->text('comment');
            $table->date('birth_day');

            $table->boolean('active')->default(true);
            $table->boolean('federal')->default(false);
            $table->boolean('top')->default(false);
            $table->boolean('prioritet')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
