<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blue;


class CreateSettingsTable extends Migration
{


	public function __construct()
	{
		// Get the prefix
		$this->prefix = Config::get('core.core_db.prefix', '');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->prefix . 'settings', function(Blue $table) {

			$table->engine = 'InnoDB';

			$table->string('key');
			$table->text('value');

			$table->primary('key');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix . 'settings');
	}


}
