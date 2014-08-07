<?php
	# Current user-ID
	$current_user_id = Auth::user()->id;
	
	$entry = "";
	$entry_2 = "";
	
	# Set date1 to YY/MM/DD format
	$date_entered = isset($_POST['user_date'])?$_POST['user_date']:'';
	$date1 = date("Y-m-d",strtotime($date_entered)) ;
	# Set date2 to YY/MM/DD format
	$date_entered2 = isset($_POST['user_date2'])?$_POST['user_date2']:'';
	$date2 = date("Y-m-d",strtotime($date_entered2)) ;
	
	# Set sections(Personal/Professional/Fitness)
	$section_name_1 = isset($_POST['section_name_1'])?$_POST['section_name_1']:'';
	$section_name_2 = isset($_POST['section_name_2'])?$_POST['section_name_2']:'';
	
	# Retrieve data for date1
	$data1=Entry::where('user_id','=',$current_user_id)
				->where('entry_date','=',$date1)->first();
	# Retrieve data for date2
	$data2=Entry::where('user_id','=',$current_user_id)
				->where('entry_date','=',$date2)->first();
				
		# Check if data1 exists		
		if($data1)
			{ 
				# Check for sections(personal/professional/fitness)	
				if($section_name_1 == 'personal'){$entry = $data1->personal_entry;}
				elseif($section_name_1 == 'professional'){$entry = $data1->professional_entry;}
				elseif($section_name_1 == 'fitness'){$entry = $data1->fitness_entry;}
			}
		else
			{ $entry = "No previous entries";}
		# Check if data1 exists	
		if($data2)
			{ 
				if($section_name_2 == 'personal'){$entry_2 = $data2->personal_entry;}
				elseif($section_name_2 == 'professional'){$entry_2 = $data2->professional_entry;}
				elseif($section_name_2 == 'fitness'){$entry_2 = $data2->fitness_entry;}
			}
		else
			{$entry_2 = "No previous entries";}
?>