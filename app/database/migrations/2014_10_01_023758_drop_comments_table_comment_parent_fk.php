<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCommentsTableCommentParentFk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function($table)
		{
			$table->dropForeign('comments_comment_parent_foreign');

			// $table->foreign('comment_parent')
	  //     		  ->references('comment_id')->on('comments')
	  //     		  ->onDelete('cascade')
	  //     		  ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function($table)
		{
			$table->dropForeign('comments_comment_parent_foreign');
		});
	}

}
