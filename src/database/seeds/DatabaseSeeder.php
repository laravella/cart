<?php namespace Laravella\Cart;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('ProductsSeeder');
                $this->command->info('Products table seeded.');
	}

}