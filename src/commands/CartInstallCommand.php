<?php namespace Laravella\Cart;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CartInstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cart:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install the shopping cart.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
                $this->call('migrate',array('--package'=>'laravella/cart'));
		$this->call('db:seed',array('--class'=>'Laravella\\Cart\\CartDatabaseSeeder'));
		$this->call('db:seed',array('--class'=>'Laravella\\Cart\\ApplicationSeeder'));
		$this->info('Cart installation complete.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}