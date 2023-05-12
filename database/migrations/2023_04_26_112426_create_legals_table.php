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
        Schema::create('legals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')->index()->constrained()->cascadeOnDelete();

            $table->string('1c_kontragent_key',50)->nullable();

            $table->string('name');
            $table->string('name_full');
            $table->string('opf');
            $table->string('inn',12);
            $table->string('adres1');
            $table->string('adres2');
            $table->string('fio1');
            $table->string('fio2');
            $table->string('bank');
            $table->string('rcount',20);
            $table->string('kcount',20);
            $table->string('bik',9);
            $table->string('ogrn',15);
            $table->string('inn_bank',12);
            $table->string('kpp',9);
            $table->text('comment');
            $table->boolean('fl');
            $table->string('pasport',11);
            $table->string('pasport_dt',12);
            $table->string('pasport_issued');
            $table->string('pasport_kod',7);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legals');
    }
};
