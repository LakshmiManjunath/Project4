	<!--  Reference to the minified jQuery library(local copy)  -->
	<script src="js/jquery-1.11.0.min.js" type="text/javascript"> </script>
	
	 <!--  javascript to highlight the navigations  -->
	<script type="text/javascript" src="js/phighlightnavigation.js"> </script>
	<!--  slide show  -->
	<script src="js/slideshow/slideShow.js"></script>
	
	<!--  jQ plugin for text-editor  -->
	<script src="js/text-editor/jquery-te-1.4.0.min.js" type="text/javascript"></script>
	
	
	<!--  jQ for UI widget datepicker  -->
	<script src="js/ui/jquery-ui.min.js"></script>
	
	<!-- On loading the document, the datepicker and the text-editor widgets are triggered -->
	<script type="text/javascript">
		$(document).ready(function(){
		
	<!--  Triggers date-picker widget -->
    $( "#datepicker" ).datepicker();
	
	<!--  Triggers jQuerytext-editor widget -->
	$(".editor").jqte({titletext:[
        {title:"Text Format"},
        {title:"Font Size"},
        {title:"Select Color"},
        {title:"Bold",hotkey:"B"},
        {title:"Italic",hotkey:"I"},
        {title:"Underline",hotkey:"U"},
        {title:"Ordered List",hotkey:"."},
        {title:"Unordered List",hotkey:","},
        {title:"Subscript",hotkey:"down arrow"},
        {title:"Superscript",hotkey:"up arrow"},
        {title:"Outdent",hotkey:"left arrow"},
        {title:"Indent",hotkey:"right arrow"},
        {title:"Justify Left"},
        {title:"Justify Center"},
        {title:"Justify Right"},
        {title:"Strike Through",hotkey:"K"},
        {title:"Add Link",hotkey:"L"},
        {title:"Remove Link",hotkey:""},
        {title:"Cleaner Style",hotkey:"Delete"},
        {title:"Horizontal Rule",hotkey:"H"}
    ]});

		$(".form").submit(function()
		{
			$("#display_data").css( 'display','block' );
		});
});
	
		//$( ".form_input" ).submit( alert( "Successfully updated!!"));
 


	</script>
	
