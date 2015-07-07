<?php
namespace App\Modules\Core\Database\Seeds;

use Illuminate\Database\Seeder;

use DB;
use Schema;

class ModuleSeeder extends Seeder {

	public function run()
	{

// Module Information
// 		$module = array(
// 			'name'					=> 'Core',
// 			'slug'					=> 'general',
// 			'version'				=> '1.0',
// 			'description'			=> 'Core functionality for Rakko',
// 			'enabled'				=> 1,
// 			'order'					=> 3
// 		);

// Insert Module Information
// 		if (Schema::hasTable('modules'))
// 		{

// 			DB::table('modules')->insert( $module );

// 		}

// Permission Information
		$permissions = array(
			[
				'name'				=> 'Manage Core',
				'slug'				=> 'manage_general',
				'description'		=> 'Give permission to user to manage Core Items'
			],
		 );

// Insert Permissions
		DB::table('permissions')->insert( $permissions );


	} // run


}
