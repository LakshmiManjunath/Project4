Route::post('/personal_day_book', array('before'=>'auth', function() {
	
	//echo $date_selected; 
	//$user = new User();
	$current_user_id = Auth::user()->id;
	$entry = new Entry();
	
	$personal = isset($_POST['personal_entry'])?$_POST['personal_entry']:' ';

	//$entry->user()->associate($user);
	$entry->user_id = $current_user_id;
	$entry->save();
	$entry = Entry::where('user_id','=',$current_user_id)
		->first();
	
	date_default_timezone_set('America/New_York');
	$entry->entry_date = date('Y-m-d');
	$entry->personal_entry = $personal;
	$entry->save();

	return View::make('personal_day_book');
}));

Route::post('/personal_day_book', array('before'=>'auth', function() {
	
	//$user = new User();
	$current_user_id = Auth::user()->id;
	$personal = isset($_POST['personal_entry'])?$_POST['personal_entry']:' ';
	if($personal)
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
					$entry->personal_entry = $entry->personal_entry." ".$personal;
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
					$entry->personal_entry = $entry->personal_entry.' '.$personal;
					$entry->save();
		}
	}
	