<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProvidersStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('providers_status', function(Blueprint $table)
		{
			$table->foreign('created_by', 'providers_status_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('modified_by', 'providers_status_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('providers_status', function(Blueprint $table)
		{
			$table->dropForeign('providers_status_ibfk_1');
			$table->dropForeign('providers_status_ibfk_2');
		});
	}

}
