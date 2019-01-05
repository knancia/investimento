<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			
			//dados pessoais
			//people data
			$table->char('cpf', 11)->unique()->nullable();
			$table->string('name', 50)->nullable(); //nome
			$table->char('phone', 11)->nullable(); //telefone
			$table->date('birth')->nullable(); //nascimento
			$table->char('gender', 1)->nullable(); //gênero
			$table->text('notes')->nullable(); //notas

			//dados de autenticação
			//auth data
			$table->string('email', 80)->unique();
			$table->string('password', 254)->nullable();

			//permissão
			//permission
			$table->string('status')->default('active');
			$table->string('permission')->default('app.user');

			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Excluir relacionamento
		Schema::create('users', function(Blueprint $table) {
		
		});

		//Excluir tabela
		Schema::drop('users');
	}
}
