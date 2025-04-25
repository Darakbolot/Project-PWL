<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_tutorials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_tutorial_id')->constrained('master_tutorials')->onDelete('cascade'); // Relasi ke master_tutorials
            $table->text('text');
            $table->string('gambar')->nullable();
            $table->text('code');
            $table->string('url');
            $table->integer('order');
            $table->enum('status', ['show', 'hide']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_tutorials');
    }
}
