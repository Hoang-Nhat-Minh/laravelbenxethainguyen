<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addservice', function (Blueprint $table) {
            $table->id();
            $table->string('house');
            $table->string('email');
            $table->unsignedBigInteger('service_id'); // Khóa ngoại mới
            $table->timestamps();
            $table->foreign('service_id') // Tạo ràng buộc khóa ngoại
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addservice');
    }
}
