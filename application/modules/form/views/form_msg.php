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

.button{
	background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-right: 100px;

}
input[type=text] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
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
	
	<div class="you" style="margin-right: 370px;">
		<h3 style="margin-left: 210px;">what is your name?<span style="color: red">*</span></h3>
	</div>
	   <div class='wrapper'>
	<input type="text" name="name" placeholder="Enter Your name" id="fname_error" class="Name" required onkeypress="return /[a-z]/i.test(event.key)">
</div>
</form><br>
 <input type="button" class="button" value="Next" id="butsave" >
 	 
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




	if(name!="")
	{
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/Form/insert'); ?>",
		dataType: 'json',
		data: {name: name},
		success: function(res) 
		{
			// if(res==1)
			// {
			// alert('Data saved successfully');
			// window.location = "<?php echo base_url();?>Form/locate"; 	
			// }
			// else
			// {
			// alert('Data not saved');	
			// }
			 window.location = "<?php echo base_url();?>Form/locate/"+res;
			
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