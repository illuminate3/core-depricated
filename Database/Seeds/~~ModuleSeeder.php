<?php
namespace App\Modules\Kantoku\Database\Seeds;

use Illuminate\Database\Seeder;
Use DB, Eloquent, Model, Schema;

class ModuleSeeder extends Seeder {

	public function run()
	{

// Module Information
// 		$module = array(
// 			'name'					=> 'Kantoku',
// 			'slug'					=> 'kantoku',
// 			'version'				=> '1.0',
// 			'description'			=> 'Kantoku is a Rakko module that provides simple Module Managent ability',
// 			'enabled'				=> 1,
// 			'order'					=> 0
// 		);
//
// // Insert Module Information
// 		if (Schema::hasTable('modules'))
// 		{
//
// 			DB::table('modules')->insert( $module );
//
// 		}

// Permission Information
		$permissions = array(
			[
				'name'				=> 'Manage Modules',
				'slug'				=> 'manage_kantoku',
				'description'		=> 'Give permission to user to access the Module Management area.'
			],
		 );

// Insert Permissions
		DB::table('permissions')->insert( $permissions );


	} // run


}
