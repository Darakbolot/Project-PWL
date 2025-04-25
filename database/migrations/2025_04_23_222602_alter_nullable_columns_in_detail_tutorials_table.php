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
        Schema::table('detail_tutorials', function (Blueprint $table) {
            $table->text('code')->nullable()->change();
            $table->string('url')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('detail_tutorials', function (Blueprint $table) {
            $table->text('code')->nullable(false)->change();
            $table->string('url')->nullable(false)->change();
        });
    }
    
};
