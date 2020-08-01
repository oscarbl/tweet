<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title');
            $table->text(column: 'content');
            //Author
                //Definimos Clave foranea
            $table->unsignedBigInteger(column: 'user_id');
            $table->foreign( columns: 'user_id')->references(columns: 'id')->on( table: 'users');

            $table->timestamps();
        }
    );
    }

    /**
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
