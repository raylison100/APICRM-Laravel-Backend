<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('providers', function(Blueprint $table)
		{
			$table->foreign('created_by', 'providers_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('modified_by', 'providers_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('provider_status_id', 'providers_ibfk_3')->references('id')->on('providers_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parent_id', 'providers_ibfk_5')->references('id')->on('providers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('provider_occupation_id', 'providers_ibfk_6')->references('id')->on('providers_occupations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('order_status_id', 'providers_ibfk_7')->references('id')->on('orders_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('payment_form_id', 'providers_ibfk_8')->references('id')->on('payment_forms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('providers', function(Blueprint $table)
		{
			$table->dropForeign('providers_ibfk_1');
			$table->dropForeign('providers_ibfk_2');
			$table->dropForeign('providers_ibfk_3');
			$table->dropForeign('providers_ibfk_5');
			$table->dropForeign('providers_ibfk_6');
			$table->dropForeign('providers_ibfk_7');
			$table->dropForeign('providers_ibfk_8');
		});
	}

}
