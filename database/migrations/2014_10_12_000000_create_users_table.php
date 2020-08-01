<?php
/**
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        /**
         *@parameters Blueprint $table
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
