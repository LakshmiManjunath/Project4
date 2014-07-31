$(document).ready(function(){
		var mybodyid = $('body').attr('id');
		console.log(mybodyid);
		var section_name = "#section_"+ mybodyid;
		$(section_name).attr('id','iamhere');	
	
});

