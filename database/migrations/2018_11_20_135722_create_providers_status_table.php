<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvidersStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('providers_status', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('created_by')->nullable();
			$table->integer('modified_by')->nullable()->index('modified_by');
			$table->string('title');
			$table->boolean('provider_create')->default(0);
			$table->boolean('has_comment')->default(0);
			$table->string('class');
			$table->dateTime('created');
			$table->dateTime('modified')->nullable();
			$table->dateTime('deleted')->nullable();
			$table->index(['created_by','modified_by'], 'created_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('providers_status');
	}

}
