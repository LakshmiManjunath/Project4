<?php
	/* Obtaining the current users 'ID' */
	$current_user_id = Auth::user()->id;
	
	/* Check if the form has some value to update*/
	$personal = isset($_POST['personal_entry'])?$_POST['personal_entry']:'';
	
	/************** If there is a personal entry ****************/
	if($personal)
	{
		$entry = new Entry();
		/****** Querying for the latest updated entry for the current user based on the entry_date *******/
		$entry_exist = Entry::where('user_id','=',$current_user_id)->orderBy('entry_date', 'desc')->first();
		
		/* If the above query returns true and if there is an existing record for present day , return true */
		if(($entry_exist) and ($entry_exist->entry_date)== date('Y-m-d'))
		{
					$entry = new Entry();
					$entry->user_id = $current_user_id;
					/* retrieve the record for the current user for the present day */
					$entry = Entry::where('user_id','=',$current_user_id)
									->orderBy('entry_date', 'desc')->first();
					/*************** Update the existing record ****************/
					$entry->personal_entry = $entry->personal_entry." ".$personal;
					$entry->save();	
					
		}
		/** If the above query returns false or if there are no records for the present date , return false **/
		else
		{
					$entry = new Entry();
					$entry->user_id = $current_user_id;
					/*** Insert a new row for the user, for the present date and update the personal_entry ***/
					DB::table('entries')->insert(array(
						'user_id' => $current_user_id, 
						'entry_date' => date('Y-m-d'),
						'personal_entry'=>$personal
					));
		}
	}
	
	
?>