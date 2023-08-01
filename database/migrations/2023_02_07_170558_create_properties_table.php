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
        if (!Schema::hasTable('properties')) {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sub_title')->nullable();
            $table->longText('slug')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('property_source')->nullable();
            $table->string('price')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('area')->nullable();
            $table->string('status')->default('active');

            $table->integer('exclusive')->default(0);

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('accommodation_id')->nullable();
            $table->foreign('accommodation_id')->references('id')->on('accommodations');

            $table->unsignedBigInteger('community_id')->nullable();
            $table->foreign('community_id')->references('id')->on('communities');

            $table->unsignedBigInteger('offer_type_id')->nullable();
            $table->foreign('offer_type_id')->references('id')->on('offer_types');

            $table->unsignedBigInteger('completion_status_id')->nullable();
            $table->foreign('completion_status_id')->references('id')->on('completion_statuses');

            $table->longText('address')->nullable();
            $table->string('address_longitude')->nullable();
            $table->string('address_latitude')->nullable();

            $table->longText('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
