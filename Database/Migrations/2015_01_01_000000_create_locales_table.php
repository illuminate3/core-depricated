<?php

use Illuminate\Database\Schema\Blue;
use Illuminate\Database\Migrations\Migration;


class CreateLocalesTable extends Migration {


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
		Schema::create($this->prefix . 'locales', function(Blue $table) {

			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();

			$table->string('locale', 2);
			$table->string('name', 20);
			$table->string('script', 20);
			$table->string('native', 20);
			$table->boolean('active')->default(0);
			$table->boolean('default')->default(0);

			$table->softDeletes();
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
		Schema::drop('locales');
	}


}
