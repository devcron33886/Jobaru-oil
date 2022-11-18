<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('plate_number');
            $table->integer('quantity');
            $table->string('order_size');
            $table->datetime('preferred_date');
            $table->integer('total')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
