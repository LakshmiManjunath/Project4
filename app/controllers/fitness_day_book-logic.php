<?php
	# Current user-ID
	$current_user_id = Auth::user()->id;
	
	# Set user entry
	$fitness = isset($_POST['fitness_entry'])?$_POST['fitness_entry']:' ';
	
	# Check for fitness entries
	if($fitness)
	{
		$entry = new Entry();
		# Look for previous entries for the current user
		$entry_exist = Entry::where('user_id','=',$current_user_id)->orderBy('entry_date', 'desc')->first();
		
		# If an entry already exists for current date
		if(($entry_exist) and ($entry_exist->entry_date)== date('Y-m-d'))
		{
					$entry = new Entry();
					$entry->user_id = $current_user_id;
					# Retrieve latest entry update for current date
					$entry = Entry::where('user_id','=',$current_user_id)
									->orderBy('entry_date', 'desc')->first();
					# Update existing record
					$entry->fitness_entry = $entry->fitness_entry." ".$fitness;
					$entry->save();
		}
		# No entry for the current user for current date
		else
		{
					$entry = new Entry();
					$entry->user_id = $current_user_id;
					# Insert new row with a new entry for the day
					DB::table('entries')->insert(array(
						'user_id' => $current_user_id, 
						'entry_date' => date('Y-m-d'),
						'fitness_entry'=>$fitness
					));
		}
	}
	

?>