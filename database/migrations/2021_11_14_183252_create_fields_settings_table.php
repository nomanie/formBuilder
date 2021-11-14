<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained('forms_fields')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('properties_id')->constrained('fields_properties')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('fields_settings');
    }
}
