<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // You need to create the user_id column
            $table->foreign('user_id') // Tạo ràng buộc khóa ngoại
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('surname');
            $table->string('profileName');
            $table->string('phone');
            $table->date('birthday');
            $table->string('address');
            $table->string('email');
            $table->string('avatar');
            $table->tinyInteger('checksubmit')->nullable();
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
        Schema::dropIfExists('userdata');
    }
}
