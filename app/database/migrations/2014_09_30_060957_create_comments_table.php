<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Comments table.
		Schema::create('comments', function($table)
		{
			$table->bigIncrements('comment_id')->unsigned();
			$table->bigInteger('comment_post_id')->unsigned()->default(0);
			$table->text('comment_author');
			$table->string('comment_author_email', 100);
			$table->string('comment_author_url', 200);
			$table->string('comment_author_ip', 100);
			$table->dateTime('comment_date')->default('0000-00-00 00:00:00');
			$table->text('comment_content');
			$table->string('comment_approved', 20);
			$table->string('comment_type', 20);
			$table->bigInteger('comment_parent')->unsigned();
			$table->bigInteger('user_id')->unsigned()->default(0);

			// Add Index 
			$table->index('comment_post_id');

			$table->index(array(
				'comment_approved',
				'comment_date'
			), 'comment_approved_date');

			$table->index('comment_date');
			$table->index('comment_parent');

	      	// Add Foreign Key
	      	$table->foreign('comment_post_id')
	      		  ->references('id')->on('posts')
	      		  ->onDelete('cascade');

	      	$table->foreign('comment_parent')
	      		  ->references('comment_id')->on('comments')
	      		  ->onDelete('cascade');

	      	$table->foreign('user_id')
	      		  ->references('id')->on('users')
	      		  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop Comments table.
		Schema::drop('comments');
	}

}
