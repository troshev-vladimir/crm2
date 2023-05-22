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

            $table->foreignId('client_id')->index()->constrained()->onDelete('cascade');

            $table->string('1c_kontragent_key',50)->nullable();

            $table->string('legal_entity'); // Юр.лицо
            $table->string('legal_address'); // юр. адрес
            $table->string('address'); // фактичекий адрес
            $table->string('ogrn',15);
            $table->string('inn',12);
            $table->string('opf');
            $table->string('leader_name');
            $table->string('accouter_name');

            $table->string('bank');
            $table->string('bic',9);
            $table->string('inn_bank',12);
            $table->string('kpp',9);
            $table->string('r_count',20); // Расчётный счёт
            $table->string('k_count',20); // Кор. счёт
            $table->text('comment');

            // $table->boolean('fl');
            // $table->string('pasport',11);
            // $table->string('pasport_dt',12);
            // $table->string('pasport_issued');
            // $table->string('pasport_kod',7);

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
