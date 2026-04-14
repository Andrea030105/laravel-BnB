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
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id') //NOME COLONNA DA CREARE
                ->nullable() //COSI' LE INSTANZE CHE ABBIA GIA' SONO NULLABLE
                ->after('id'); //LO INSERIAMO DOPO L'ID PER CHIAREZZA

            $table->foreign('apartment_id') //DEVE CONICIDERE CON IL NOME DELLA COLONNA DI SOPRA
                ->references('id') //A QUALE COLONNA SI RIFERISCE
                ->on('apartments') //A QUALE TABELLA SI RIFERISCE
                ->cascadeOnDelete(); //SE CANCELLI UN APPARTAMENTO, CANCELLA ANCHE I SUOI MESSAGGI
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // 1
            $table->dropForeign('messages_apartment_id_foreign'); //DROPPA NELLA TABELLA LA COLONNA DELLA FOREIGN

            // 2
            $table->dropColumn('apartment_id'); //CANELLA LA COLONNA
        });
    }
};
