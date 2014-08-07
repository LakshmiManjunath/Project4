<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});

/*----------------------------------------
*			Root definition
*----------------------------------------*/
Route::get('/', function()
{
	return View::make('index');
});

/*----------------------------------------
*		validates database connection
*----------------------------------------*/
Route::get('mysql-test', function() {
		$results = DB::select('SHOW DATABASES;');
		# If the "Pre" package is not installed, you should output using print_r instead
    print_r($results);
	});
	
/*----------------------------------------
*		Sign Up:Get Method
*----------------------------------------*/	
Route::get('/sign_up',
    array(
        'before' => 'guest',
        function() {
            return View::make('sign_up');
        }
    )
);

/*----------------------------------------
*		Sign Up:Post Method
*----------------------------------------*/	
Route::post('/sign_up', 
    array(
        'before' => 'csrf', 
        function() {
			# Set validation rules for user information
			$rules = array(
				'first_name' => 'min:2|required',
				'last_name' => 'min:2|required',
				'email' => 'email|unique:users,email|required',
				'password' => 'min:6|required'   
			);          
			# Validate the above set rules
			$validator = Validator::make(Input::all(), $rules);
			
			# Check for validation
			if($validator->fails()) {

				return Redirect::to('/sign_up')
								->with('flash_message', 'Sign up failed.Please try again!!')
								->withInput()
								->withErrors($validator);
			}
			
			# Insert user information if the user input validates
            $user = new User;
			$user->first_name    = Input::get('first_name');
			$user->last_name    = Input::get('last_name');
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
   

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
				return $e;
                return Redirect::to('/sign_up')->with('flash_message', 'Sign up failed; please try again.')->withInput();
				
            }

            # Log the user in
            Auth::login($user);
			
            return Redirect::to('/personal_day_book')->with('flash_message', 'Welcome to Day Book!');
	})
);

/*----------------------------------------
*		Log In:Get Method
*----------------------------------------*/	
Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
));

/*----------------------------------------
*		Log In:Post Method
*----------------------------------------*/	
Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {
			
			# Set validation rules for user information
			$rules = array(
				'email' => 'required',
				'password' => 'required'   
			);          
			
			# Validate the above set rules
			$validator = Validator::make(Input::all(), $rules);

			# Check for validation
			if($validator->fails()) {

				return Redirect::to('/login')
								->with('flash_message', 'Log In failed.Please try again!!')
								->withInput()
								->withErrors($validator);
			}
			
            $credentials = Input::only('email', 'password');
			
			# Allow access if the user credentials match
            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/personal_day_book')->with('flash_message', 'Welcome Back '.Auth::user()->first_name.'!!');
            }
			# Redirect to login page ow
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; If you are a new user, sign up, or please try again with correct credentials.');
            }

            return Redirect::to('login');
        }
 ));

/*----------------------------------------
*				Log Out
*----------------------------------------*/	
Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});

/*---------------------------------------------------------------
*	Users Day Book-Entries for PERSONAL SECTION:GET Method
*----------------------------------------------------------------*/	
Route::get('/personal_day_book', array('before'=>'auth', function() {

	return View::make('personal_day_book');
}));

/*---------------------------------------------------------------
*	Users Day Book-Entries for PERSONAL SECTION:POST Method
*----------------------------------------------------------------*/		
Route::post('/personal_day_book', array('before'=>'auth', function() {
	
	return View::make('personal_day_book');
}));


/*---------------------------------------------------------------
*	Users Day Book-Entries for PROFESSIONAL SECTION:GET Method
*----------------------------------------------------------------*/	
Route::get('/professional_day_book', array('before'=>'auth', function() {

	return View::make('professional_day_book');
}));

/*---------------------------------------------------------------
*	Users Day Book-Entries for PROFESSIONAL SECTION:POST Method
*----------------------------------------------------------------*/	
Route::post('/professional_day_book', array('before'=>'auth', function() {

	return View::make('professional_day_book');
}));


/*---------------------------------------------------------------
*	Users Day Book-Entries for FITNESS SECTION:GET Method
*----------------------------------------------------------------*/	
Route::get('/fitness_day_book', array('before'=>'auth', function() {

	return View::make('fitness_day_book');
}));

/*---------------------------------------------------------------
*	Users Day Book-Entries for PROFESSIONAL SECTION:POST Method
*----------------------------------------------------------------*/	
Route::post('/fitness_day_book', array('before'=>'auth', function() {
	
	return View::make('fitness_day_book');
}));


/*----------------------------------------
*		Compare Entries:GET Method
*----------------------------------------*/	
Route::get('/compare_entries', array('before'=>'auth', function() {

	return View::make('compare_entries');
}));

/*----------------------------------------
*		Compare Entries:POST Method
*----------------------------------------*/
Route::post('/compare_entries', array('before'=>'auth', function() {

	return View::make('compare_entries');
}));

/*----------------------------------------
*					DEBUG
*----------------------------------------*/
Route::get('/debug', function() {

	echo '<pre>';

	echo '<h1>environment.php</h1>';
	$path   = base_path().'/environment.php';

	try {
		$contents = 'Contents: '.File::getRequire($path);
		$exists = 'Yes';
	}
	catch (Exception $e) {
		$exists = 'No. Defaulting to `production`';
		$contents = '';
	}

	echo "Checking for: ".$path.'<br>';
	echo 'Exists: '.$exists.'<br>';
	echo $contents;
	echo '<br>';

	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';

	echo '<h1>Debugging?</h1>';
	if(Config::get('app.debug')) echo "Yes"; else echo "No";

	echo '<h1>Database Config</h1>';
	print_r(Config::get('database.connections.mysql'));

	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	} 
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}

	echo '</pre>';

});
