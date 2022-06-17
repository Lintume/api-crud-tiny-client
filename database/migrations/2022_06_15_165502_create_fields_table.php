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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->unsignedBigInteger('field_type_id');
            $table->foreign('field_type_id')
                ->references('id')
                ->on('field_types')
                ->onDelete("cascade");

            $table->unsignedBigInteger('subscriber_id');
            $table->foreign('subscriber_id')
                ->references('id')
                ->on('subscribers')
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
};
