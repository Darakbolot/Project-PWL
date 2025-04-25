<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('master_tutorials', function (Blueprint $table) {
        $table->uuid('unique_identifier_presentation')->nullable();
        $table->string('unique_identifier_finished', 50)->nullable();
    });
}

public function down()
{
    Schema::table('master_tutorials', function (Blueprint $table) {
        $table->dropColumn(['unique_identifier_presentation', 'unique_identifier_finished']);
    });
}

};
