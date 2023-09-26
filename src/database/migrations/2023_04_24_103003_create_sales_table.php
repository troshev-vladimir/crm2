<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // php artisan db:seed --class=
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('placement_date')->nullable();
            $table->date('payed_date')->nullable();
            $table->boolean('paid')->nullable()->default(null);
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->integer('summa')->default(0);
            $table->integer('1c_ref_key')->default(null);
            $table->integer('1c_dogovor_key')->default(null);
            $table->integer('1c_kontragent_key')->default(null);
            $table->boolean('locked')->default(false);

            $table->integer('id_1c');
            $table->json('sale_items');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('sales_types');

            $table->unsignedBigInteger('smi_id')->nullable();
            $table->foreign('smi_id')->references('id')->on('smis');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
