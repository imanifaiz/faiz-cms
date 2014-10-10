<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( !Schema::hasTable('pages') )
        {
            Schema::create('pages', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('title',255);
                $table->string('key',255);
                $table->unique('key');
                $table->text('content');
                $table->index('id');
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
		Schema::drop('pages');
	}

}
