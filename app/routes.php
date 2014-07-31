<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

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

        }
    )
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
    )
);

/*----------------------------------------
*		Log In:Post Method
*----------------------------------------*/	
Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/personal_day_book')->with('flash_message', 'Welcome Back '.Auth::user()->first_name.'!!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);

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
	/***********check**********/
	
	/*$path = app_path().'/controllers/personal_day_book-logic.php';
	require $path;
	
	if ($entry->save())
	{
        return Redirect::intended('/personal_day_book')->with('flash_message', 'Successfully updated personal section');
    }
    else 
	{
        return Redirect::to('/personal_day_book')->with('flash_message', 'ERROR:Cannot update!');
    }*/
	
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

/*---------------------------------------------------------------
*	Users Day Book-Entries for MISCELLANEOUS 
*   SECTION:GET Method
*----------------------------------------------------------------*/	
Route::get('/misc_day_book', array('before'=>'auth', function() {

	return View::make('misc_day_book');
}));

/*---------------------------------------------------------------
*	Users Day Book-Entries for MISCELLANEOUS  SECTION:POST Method
*----------------------------------------------------------------*/	
Route::post('/misc_day_book', array('before'=>'auth', function() {
	
	//$user = new User();
	$current_user_id = Auth::user()->id;
	$misc = isset($_POST['misc_entry'])?$_POST['misc_entry']:' ';
	if($misc)
	{
		$entry = new Entry();
		$entry_exist = Entry::where('user_id','=',$current_user_id)->distinct()->first();
		
		if($entry_exist)
		{
					echo "match found";
					$entry = new Entry();
					$entry->user_id = $current_user_id;
					
					$entry = Entry::where('user_id','=',$current_user_id)
									->first();
					$entry->misc_entry = $entry->misc_entry." ".$misc;
					$entry->save();
		}
		else
		{
					echo " new entry";
					$entry = new Entry();
					$entry->user_id = $current_user_id;
					$entry->save();
					$entry = Entry::where('user_id','=',$current_user_id)
									->first();
					date_default_timezone_set('America/New_York');
					$entry->entry_date = date('Y-m-d');
					$entry->misc_entry = $entry->misc_entry.' '.$misc;
					$entry->save();
		}
	}
	

	return View::make('misc_day_book');
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
