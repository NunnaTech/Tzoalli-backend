<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visited_by');
            $table->date('visit_date');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('grocer_id');

            $table->foreign('visited_by')->references('id')->on('users');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('grocer_id')->references('id')->on('grocers');
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
        Schema::dropIfExists('visits');
    }
}
