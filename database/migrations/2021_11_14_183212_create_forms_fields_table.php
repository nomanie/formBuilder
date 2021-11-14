<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId("form_id")->constrained('forms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('field_type_id')->constrained('fields_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->boolean("required");
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
        Schema::dropIfExists('forms_fields');
    }
}
