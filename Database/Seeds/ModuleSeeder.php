<?php

namespace App\Modules\Core\Database\Seeds;

use Illuminate\Database\Seeder;

use DB;
use Schema;

class ModuleSeeder extends Seeder {

	public function run()
	{

// Module Information
/*
	"name": "Core",
	"slug": "core",
	"version": "1.0",
	"description": "Functionality: Locales, Settings, Statuses",
	"enabled": true
*/

// Permission Information
		$permissions = array(
			[
				'name'				=> 'Manage Core',
				'slug'				=> 'manage_core',
				'description'		=> 'Give permission to user to manage Core Items'
			],
		 );

// Insert Permissions
		DB::table('permissions')->insert( $permissions );


	} // run


}
