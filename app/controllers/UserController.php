<?php

class UserController extends BaseController {

	public function getLogin()
	{
		return View::make('frontend.login');
	}

	public function postLogin(){
		$credentials = array(
			'email'		=> Input::get('email'),
			'password'	=> Input::get('password')
		);

		try {
			$login = Sentry::authenticate($credentials, false);
			if ($login) {
				return Redirect::to('admin')->with('successMessage', 'Anda berhasil masuk');
			}
		} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			return Redirect::back()->with('errorMessage', 'Email dan Password salah');
		} catch (Exception $e) {
			return Redirect::back()->with('errorMessage', 'Email tersebut tidak ditemukan dalam sistem kami');
		}
	}

	public function getRegister(){

	}

	public function postRegister(){

		$rules = array(
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			'email'			=> 'required|email|unique:users,email,:id',
			'password' 		=> 'required',
			'password_confirmation' 		=> 'required|same:password'
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput(Input::except('password', 'password_confirm'));
		} else {
			$user = Sentry::register(array(
				'first_name'    => Input::get('first_name'),
				'last_name' 	=> Input::get('last_name'),
				'email'    		=> Input::get('email'),
				'password' 		=> Input::get('password'),
			), false);

			$operatorGroup = Sentry::findGroupByName('operator');
			$user->addGroup($operatorGroup);

			return View::make('dashboard.guest.registermessage');
		}
	}

	public function getLogout(){
		Sentry::logout();
		return Redirect::to('login')->with('successMessage', 'Anda telah berhasil Logout');
	}

}
