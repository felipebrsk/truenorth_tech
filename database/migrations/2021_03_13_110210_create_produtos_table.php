<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product', 191);
            $table->string('subtitle', 80)->nullable();
            $table->string('brand', 80)->nullable();
            $table->string('model', 80)->nullable();
            $table->integer('year')->nullable();
            $table->string('capacity', 80)->nullable();
            $table->string('screen_size', 80)->nullable();
            $table->string('connection_type', 80)->nullable();
            $table->string('screen_functionality', 80)->nullable();
            $table->string('screen_type', 80)->nullable();
            $table->string('resolution', 80)->nullable();
            $table->string('weight', 80)->nullable();
            $table->string('dimension', 80)->nullable();
            $table->string('charging', 80)->nullable();
            $table->string('need_battery', 80)->nullable();
            $table->string('included_battery', 80)->nullable();
            $table->string('time_on', 80)->nullable();
            $table->string('included_charger', 80)->nullable();
            $table->string('RAM', 80)->nullable();
            $table->string('way_use', 80)->nullable();
            $table->string('waterproof', 80)->nullable();
            $table->string('compatibility', 80)->nullable();
            $table->decimal('price', 10,2);
            $table->boolean('best_seller')->default(0);
            $table->integer('current_inventory');
            $table->string('image');
            $table->longText('description');
            $table->longText('search_helper')->nullable();

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('unity_id');
            $table->foreign('unity_id')->references('id')->on('unidades')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('tipos')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('produtos');
    }
}
