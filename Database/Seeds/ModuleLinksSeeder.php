<?php

namespace App\Modules\Core\Database\Seeds;

use Illuminate\Database\Seeder;
Use DB;
use Schema;


class ModuleLinksSeeder extends Seeder
{


	public function run()
	{

		$admin_id = DB::table('menus')
			->where('name', '=', 'admin')
			->pluck('id');

		$settings_id = DB::table('menus')
			->where('name', '=', 'settings')
			->pluck('id');

		if ($admin_id == null) {
			$admin_id = 1;
		}
		if ($settings_id == null) {
			$settings_id = 1;
		}

		$locale_id = DB::table('locales')
			->where('name', '=', 'English')
			->where('locale', '=', 'en', 'AND')
			->pluck('id');

// Links -------------------------------------------------------------------
// Locales

		$link_names = array([
			'menu_id'				=> $settings_id,
			'status'				=> 1,
			'position'				=> 7,
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulinks')->insert( $link_names );
		}

		$last_insert_id = DB::getPdo()->lastInsertId();

		$ink_name_trans = array([
			'title'					=> 'Locales',
			'url'					=> '/admin/locales',
			'menulink_id'			=> $last_insert_id,
			'locale_id'				=> $locale_id // English ID
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulink_translations')->insert( $ink_name_trans );
		}

// Settings
		$link_names = array([
			'menu_id'				=> $admin_id,
			'status'				=> 1,
			'position'				=> 7,
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulinks')->insert( $link_names );
		}

		$last_insert_id = DB::getPdo()->lastInsertId();

		$ink_name_trans = array([
			'title'					=> 'Settings',
			'url'					=> '/admin/settings',
			'menulink_id'			=> $last_insert_id,
			'locale_id'				=> $locale_id // English ID
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulink_translations')->insert( $ink_name_trans );
		}

// Statuses
		$link_names = array([
			'menu_id'				=> $settings_id,
			'status'				=> 1,
			'position'				=> 7,
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulinks')->insert( $link_names );
		}

		$last_insert_id = DB::getPdo()->lastInsertId();

		$ink_name_trans = array([
			'title'					=> 'Statuses',
			'url'					=> '/admin/statuses',
			'menulink_id'			=> $last_insert_id,
			'locale_id'				=> $locale_id // English ID
		]);

		if (Schema::hasTable('menulinks'))
		{
			DB::table('menulink_translations')->insert( $ink_name_trans );
		}

	} // run


}
