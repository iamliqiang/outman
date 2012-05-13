<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
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

	public function __construct()
		{
		    parent::__construct();
		    // Note: We may not always require CSRF on login for system based logins so ignore it here.
		    //$this->filter('before', 'csrf')->on('post')->except( array( 'login' ) );;
		}

	public $layout = 'layouts.home';

	public $restful = true;

	public function get_index()
	{
		//return View::make('home.index');
		$this->layout->nest('content', 'home.index');
	}




}