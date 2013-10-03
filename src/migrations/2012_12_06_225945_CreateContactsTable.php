<?php use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            if (!Schema::hasTable('contacts'))
            {
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('first_name')->unsigned()->nullable();
			$table->integer('last_name')->unsigned()->nullable();
			$table->integer('email_address')->unsigned()->nullable();
			$table->integer('address01')->unsigned()->nullable();
			$table->integer('address02')->unsigned()->nullable();
			$table->integer('address03')->unsigned()->nullable();
			$table->integer('address04')->unsigned()->nullable();
			$table->integer('postal_code')->unsigned()->nullable();
                        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                        $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
		});
            }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::dropIfExists('contacts');
	}

}