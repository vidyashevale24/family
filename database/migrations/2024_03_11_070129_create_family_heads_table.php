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
        Schema::create('family_heads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->date('birthdate');
            $table->string('mobile_no', 15);
            $table->string('address', 255);
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('pincode', 10);
            $table->enum('marital_status', ['Married', 'Unmarried']);
            $table->date('wedding_date')->nullable();
            $table->text('hobbies')->nullable();
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
        Schema::dropIfExists('family_heads');
    }
};
