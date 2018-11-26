<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('providers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('created_by')->nullable();
			$table->integer('modified_by')->nullable()->index('modified_by');
			$table->integer('provider_status_id')->index('provider_status_id');
			$table->integer('user_id')->nullable();
			$table->integer('parent_id')->nullable()->index('parent_id');
			$table->integer('provider_occupation_id')->nullable()->index('provider_occupation_id');
			$table->string('name');
			$table->string('email');
			$table->string('password')->nullable();
			$table->string('document')->nullable();
			$table->string('cpf')->unique('cpf_UNIQUE');
			$table->string('score_id')->nullable();
			$table->float('score_value', 10, 0)->nullable();
			$table->string('score_status')->nullable();
			$table->dateTime('score_updated')->nullable();
			$table->string('phone')->nullable();
			$table->string('cellphone')->nullable();
			$table->string('company')->nullable();
			$table->string('occupation')->nullable();
			$table->string('company_email')->nullable();
			$table->string('company_phone')->nullable();
			$table->string('company_phone_branch', 10)->nullable();
			$table->text('comment', 65535)->nullable();
			$table->integer('payment_count')->default(0);
			$table->integer('quotation_count')->default(0);
			$table->dateTime('created');
			$table->dateTime('modified')->nullable();
			$table->dateTime('deleted')->nullable();
			$table->integer('provider_file_count')->default(0);
			$table->string('rg')->nullable();
			$table->date('birthday')->nullable();
			$table->string('gender')->default('');
			$table->string('street_view')->nullable();
			$table->string('facebook')->nullable();
			$table->string('linkedin')->nullable();
			$table->boolean('restriction')->default(0);
			$table->string('company_site')->nullable();
			$table->integer('orders_count')->nullable()->default(0);
			$table->integer('order_status_id')->default(10)->index('order_status_id');
			$table->integer('payment_form_id')->default(1)->index('payment_form_id');
			$table->string('cnpj')->nullable();
			$table->text('company_extra', 65535)->nullable();
			$table->dateTime('status_modified');
			$table->string('session_id')->default('');
			$table->boolean('was_consulted')->default(0);
			$table->boolean('was_consulted_spc')->default(0);
			$table->integer('last_quotation_id')->nullable();
			$table->unique(['cpf','email'], 'cpf');
			$table->index(['created_by','modified_by','provider_status_id','user_id','parent_id','provider_occupation_id'], 'created_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('providers');
	}

}
