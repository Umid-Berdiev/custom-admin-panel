<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUzDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uz_districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('areaid')->nullable();
            $table->unsignedInteger('regionid')->nullable();
            $table->unsignedInteger('areacode')->nullable();
            $table->string('areatype')->nullable();
            $table->string('nameRu')->nullable();
            $table->string('nameUz')->nullable();
            $table->string('admincenterRu')->nullable();
            $table->string('admincenterUz')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('uz_districts');
    }
}
