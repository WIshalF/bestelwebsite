<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDonateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donateurs', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('user_id')->unsigned();
            $table->string('voor_naam', 60);
            $table->string('achter_naam', 60);
            $table->date('geboortedag');
            $table->boolean('geslacht');
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
        Schema::dropIfExists('donateurs');
    }
}