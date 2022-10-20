<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrocersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grocers', function (Blueprint $table) {
            $table->id();
            $table->string('owner_full_name', 200)->unique();
            $table->string('grocer_name', 100);
            $table->string('phone', 50);
            $table->string('address', 100);
            $table->string('zip_code', 20);

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
        Schema::dropIfExists('grocers');
    }
}
