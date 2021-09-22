<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<style type="text/css">
	body{
	color:blue;
				background-color:pink;
				text-align:center;
				margin-top: 300px;
}
.required:after {
    content:"*";
    color: red;

</style>

	<head>
		<!-- JQUERY CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<title>form</title>
		 <!-- External CSS link -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/index.css');?>">
	</head>
	
	<body>	
		<form name="myForm" id="myform" method="post">
	<div class="splash">
		<h1 class="fade-in">Trivia App</h1>
	</div>
	
	<div class="you" style="margin-right: 350px;">
		<label class="required">what is your name?</label>
	</div>
	   <div class='wrapper'>
	<input type="text" name="name" placeholder="Enter Your name" id="fname_error" class="Name" required>
</div>
</form><br>
 <input type="button" class="btn btn-primary" value="save data" id="butsave" >
 <button class="button" onclick="location.href='<?php echo base_url();?>Form/locate'">Register</button>	 
		<script>
			const splash=document.querySelector('.splash');
			document.addEventListener('DOMContentLoaded',(e)=>{
				setTimeout(()=>{splash.classList.add('display-none');},2000);})

		const header=document.querySelector('.header');
		window.onscroll=function(){
			var top=window.scrollY;
			if(top>=50){
				header.classList.add('active')
			}
			else{
				header.classList.remove('active');
			}
		}
		/* VALIDATION USING AJAX */
			$(document).ready(function() 
{

$("#butsave").click(function()
{
var name = $('#fname_error').val();

var Question1 = $('#Player_Name').val();

var scales = $('#scales_error').val();


	if(name!="" && Question1!=""&& scales!="" )
	{
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/Form/insert'); ?>",
		dataType: 'json',
		data: {name: name,Question1:Question1,scales:scales},
		success: function(res) 
		{
			if(res==1)
			{
			alert('Data saved successfully');	
			}
			else
			{
			alert('Data not saved');	
			}
			
		},
		error:function()
		{
		alert('data not saved');	
		}
		});
	}
	else
	{
	alert("pls fill all fields first");
	}

});
});
    </script>
	</body>
</html>