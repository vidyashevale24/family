<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('head_id');
            $table->foreign('head_id')->references('id')->on('family_heads')->onDelete('cascade');
            $table->string('name', 255);
            $table->date('birthdate');
            $table->enum('marital_status', ['Married', 'Unmarried']);
            $table->date('wedding_date')->nullable();
            $table->string('education', 255)->nullable();
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
        Schema::dropIfExists('family_members');
    }
};
