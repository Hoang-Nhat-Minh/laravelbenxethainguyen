<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('rowonename')->nullable();
            $table->date('rowonedate')->nullable();
            $table->string('rowtwoname')->nullable();
            $table->date('rowtwodate')->nullable();
            $table->string('rowthreename')->nullable();
            $table->date('rowthreedate')->nullable();
            $table->string('rowfourname')->nullable();
            $table->date('rowfourdate')->nullable();
            $table->string('rowfivename')->nullable();
            $table->date('rowfivedate')->nullable();
            $table->string('rowsixname')->nullable();
            $table->date('rowsixdate')->nullable();
            $table->string('rowsevenname')->nullable();
            $table->date('rowsevendate')->nullable();
            $table->string('roweightname')->nullable();
            $table->date('roweightdate')->nullable();
            $table->string('rowninename')->nullable();
            $table->date('rowninedate')->nullable();
            $table->string('rowtenname')->nullable();
            $table->date('rowtendate')->nullable();
            $table->string('price');
            $table->string('billcode');
            $table->date('date');
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
        Schema::dropIfExists('bills');
    }
}
