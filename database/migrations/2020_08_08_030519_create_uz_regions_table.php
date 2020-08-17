<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUzRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uz_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('regionid')->nullable();
            $table->unsignedInteger('regioncode')->nullable();
            $table->unsignedInteger('regioncode2')->nullable();
            $table->string('nameRu')->nullable();
            $table->string('nameUz')->nullable();
            $table->string('codelat', 10)->nullable();
            $table->string('codecyr', 10)->nullable();
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
        Schema::dropIfExists('uz_regions');
    }
}
