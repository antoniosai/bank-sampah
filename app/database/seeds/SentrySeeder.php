<?php

class SentrySeeder extends Seeder {
	
	public function run(){

		DB::table('users_groups')->delete();
		DB::table('groups')->delete();
		DB::table('users')->delete();
		DB::table('throttle')->delete();

		try {
			$group = Sentry::createGroup(array(
				'name'	=> 'administrator',
				'description'  => 'Administrator',
				'permissions' => array(
					'admin' => 1,
				),
			));
			$group = Sentry::createGroup(array(
				'name'	=> 'operator',
				'description' => 'Teller',
				'permissions' => array(
					'operator' => 1,
				),
			));

		} catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
			echo "Name file is Required";
		} catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			echo "Group already exists";
		}

		try {

			$admin = Sentry::register(array(
				'email'			=> 'admin@mail.com',
				'password'		=> 'admin',
				'first_name'	=> 'Administrator',
				'last_name'		=> 'Bank Sampah',
			), true);
			$adminGroup = Sentry::findGroupByName('administrator');
			$admin->addGroup($adminGroup);

			$operator = Sentry::register(array(
				'email'			=> 'antoniosaiful10@gmail.com',
				'password'		=> '090996o9o9g6!@#',
				'first_name'	=> 'Operator',
				'last_name'		=> 'Bank Sampah',
			), true);
			$operatorGroup = Sentry::findGroupByName('operator');
			$operator->addGroup($operatorGroup);

		} catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			echo "Login field is required";
		} catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			echo "Password field is required";
		} catch (Cartalyst\Sentry\Users\UserExistsException $e) {
			echo "User with this login is Required";
		} catch (Cartalyst\Sentry\Users\GroupNotFoundException $e) {
			echo "Group was not found";
		}
	}
}