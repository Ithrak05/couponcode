<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_couponcodes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('offer')->nullable();
            $table->integer('offer_usage')->nullable();
            $table->integer('offer_used')->nullable();
            $table->text('offer_used_details')->nullable();
            $table->timestamp('offer_expiry_date')->nullable();
            $table->enum('status', ["active","inactive"])->default('active');
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
        Schema::dropIfExists('user_couponcodes');
    }
}
