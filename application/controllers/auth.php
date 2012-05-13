<?php

class Auth_Controller extends Base_Controller {

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
	public $layout = 'layouts.auth';
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
		    $this->filter('before', 'csrf')->on('post')->except( array( 'login' ) );
		    $this->filter('before', 'auth')->except( array( 'login', 'register' ) );
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

	public function get_login()
	{
	    $this->layout->nest('content', 'auth.login');

	}

	public function post_login()
	{
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|min:6|max:64',
		);

		$new_login = array(
	        'email'     => Input::get('email'),
	        'password'  => Input::get('password'),
	    );

		// Validate all input
		$va = Validator::make( $new_login, $rules );

		// Send them back with errors
		if($va->fails())
		{
			// Validation has failed.
			return Redirect::to('auth/login')
							->with_input()
							->with_errors($va)
							;
		}

		$user = DB::table('users')->where_email(Input::get('email'))->first();

		if (!$user) {
			return Redirect::to('auth/login')
							->with_input()
							->with('noactivate_errors', '您尚未注册用户账号，请注册后再登录！')
							;
		}

		// Attempt to authenticate： Attention-- you should change config/auth.php to use email as username！
		if( Auth::attempt( Input::get( 'email' ), Input::get( 'password' ) ) AND $user->state == 1 )
		{
			// Trigger log in event.
			// Watchman::trigger_event( 1, 'logged in', Auth::user()->id );
			
			// Remember me
			if(Input::get( 'rememberme' ))	
				Auth::remember($user->id);

			return Redirect::to('auth/success')
							->with('general-info', $user->username);
		} else  {

			if($user->state == 0)
			{
				return Redirect::to('auth/login')
							->with_input()
							->with('noactivate_errors', '此账号还未激活，请查看您的email邮箱并确认已激活注册邮件！')
							;
			}
	        return Redirect::to('auth/login')
							->with_input()
							->with('login_errors', '身份验证错.')
							;
	    }

	}



    public function get_logout()
    {
        Auth::logout();
        return Redirect::home();
    }




	public function get_register()
	{
	    $this->layout->nest('content', 'auth.register');
	}

	public function post_register()
	{
		$this->filter( 'before', 'csrf' );

		$new_post = array(
		//	'username'  => Input::get('username'),
	        'email'     => Input::get('email'),
	        'password'  => Input::get('password'),
	        'password_confirmation' => Input::get('password_confirmation'),
	    );


		$rules = array(
		//	'username'  => 'required|max:64|unique:users',
		    'email'     => 'required|email|unique:users',
		    'password'  => 'confirmed',
		    'password_confirmation' => 'required|min:6|max:64',
		);



		$valid = Validator::make($new_post, $rules);
	    if($valid->fails())
		{
			// Validation has failed.
			return Redirect::to('auth/register')
							->with_input()
							->with_errors($valid)
							->with('login_errors', '注册失败')
							;
		}
	 
		// Validation has succeeded. Create new user.
		$new_post['password'] =  Hash::make($new_post['password'] );
		
		$user = new User(array( 'email'    => $new_post['email'],
								'password' => $new_post['password']   ));
		$user->save();

    	// SEND VERIFY EMAIL 
		$user = DB::table('users')->where_email($new_post['email'])->first();
		$hash_v = md5( $user->password . $user->updated_at ) ; 
		

		$to      = $user->email; // Send email to our user  
		
	
		
		$mail_content	= <<<EOT
你好: $user->email 
    您在达人汇申请用户注册，我们发送这封电邮进行确认。

如果是您申请注册，请在七天内点击下面的链接来验证你的邮箱。

http://go.outman.com/auth/verify/mail/$user->email/$hash_v

如果无法点击上面的链接，你可以复制该地址，并粘帖在浏览器的地址栏中访问。

如果你没有申请注册达人汇，请直接忽略本信息！

本邮件勿需回复！ 
                                              --www.outman.com	光头强    	 

EOT;

		
		// If you do not want to auto-load the bundle, and want to use another mailer.transport
		Bundle::start('swiftmailer');
		Laravel\IoC::register('mailer.transport', function()
		{
		    return Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
								        ->setUsername('outmanmail@gmail.com')
									    ->setPassword('letoutmanin')
								        ;
		});

		// Get the Swift Mailer instance
		$mailer = IoC::resolve('mailer');


		// Construct the message
		$message = Swift_Message::newInstance('OUTMAN账号激活')
							    ->setFrom(array('noreplay@outman.com'=>'达人汇光头强'))
							    ->setTo(array($to => $to ))
							    ->addPart($mail_content,'text/plain')
							  // ->setBody('My HTML Message','text/html')
							    ;

		// Send the email
		$mailer->send($message);
        
        return Redirect::to('auth/success')
				    	->with('general-info', "验证邮件已经发到您的邮箱，请查收邮件并激活账号！");

	}



	public function get_mailVerify($mail=null, $hash=null)
    {
        if( !empty($mail) AND !empty($hash) )
        {  
        	$mail   = mysql_escape_string($mail);
        	$hash   = mysql_escape_string($hash);

        	$userV = DB::table('users')->where_email($mail)->first();

        	if($userV)
        	{
        		$hash_v = md5( $userV->password . $userV->updated_at ) ; 
        		if ( ($hash_v == $hash) AND ($userV->state == 0) ) 
        		{
						$affected = DB::table('users')
									    ->where('email', '=', $mail)
									    ->update(array('state' => 1 ))
									    ;
						// Log the user into the application
						Auth::login($userV->id);
						return Redirect::to('auth/success')
								    	->with('general-info', "激活成功，您可以正常登录使用！");
        		} else {
	        			return Redirect::to('auth/error')
								    	->with('general-info', "激活码不正确，或账号已被激活过，您可以尝试直接登录！");
        		}
        	} else {
        		return Redirect::to('auth/error')
						    	->with('general-info', "激活失败，此账号尚未注册！");
        	}

		}else{  
		    return Redirect::to('auth/error')
					    	->with('general-info', "注册激活失败，激活码URL参数不正确！");
		}  
    }


}