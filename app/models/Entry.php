<?php 

	class Entry extends Eloquent { 

		
		public function user() {
			# Entry belongs to User
			return $this->belongsTo('User');
		}
	}
?>