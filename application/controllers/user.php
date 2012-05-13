<?php

class User_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Authentication Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/
	public $layout = 'layouts.user';

	public $restful = true;
	
	// public function __construct() {
	// 	//$this->filter( 'before', 'guest' )->except( array( 'logout', 'validate' ) );

	// 	// Note: We may not always require CSRF on login for system based logins so ignore it here.
	// 	//$this->filter( 'before', 'csrf' )->on( 'post' )->except( array( 'login' ) );
	
	//  //Specify a filter for only the "index" and "home" methods
	//  //$this->filter('before', 'auth')->only(array('index', 'home'));
	// }

	public function __construct()
		{
		    parent::__construct();
		    // Note: We may not always require CSRF on login for system based logins so ignore it here.
		    $this->filter('before', 'csrf')->on('post') ;
		    $this->filter('before', 'auth');
		}


	public function get_error()
	{
		return View::make('error.error');
	}

	public function get_success()
	{
		return View::make('error.success');
	}

	public function get_index()
	{
		return View::make('home.index');
	}

	public function get_home($uid=null)
	{
		return "user is  $uid";
		//return View::make('user.index');
	}

	
		
}