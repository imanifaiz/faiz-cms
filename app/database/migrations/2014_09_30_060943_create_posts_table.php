<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Posts table.
		Schema::create('posts', function($table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->text('post_title');
			$table->text('post_slug');
			$table->text('post_excerpt');
			$table->longText('post_content');
			$table->string('post_type', 20)->default('post');
			$table->string('post_status', 20)->default('publish');
			$table->bigInteger('post_author')->unsigned();
			$table->bigInteger('post_parent')->unsigned()->nullable();
			$table->timestamps();

			// Add Index
			$table->index(array(
				'post_type', 
				'post_status', 
				'created_at'
			), 'type_status_date');

			// $table->index('post_name');
			$table->index('post_parent');
			$table->index('post_author');

			// Add Foreign Key
			$table->foreign('post_author')
				  ->references('id')->on('users')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');

			$table->foreign('post_parent')
				  ->references('id')->on('posts')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop the Posts table.
		Schema::drop('posts');
	}

}
