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
	
		<!-- <div class="right">
			<a style="border: 1px solid red; background-color: red;" href="<?php echo base_url(); ?>">next</a> -->	<!--Link to form  -->
			<!-- CODE FOR DISPLAY DATA IN TABLE -->
			<form class="" id="myform" action="Form/player_insert" method="post">
				<button type="submit" name="button"> Click </button>
			<div class="question1"style="margin-right: 350px;">
		<p>Who is the best cricketer in the world?</p>
	</div>
	<div class="questionS"style="margin-right: 350px;">
	<p>Options:</p>
	<input type="radio" id="Question_error" name="Question1" value="Sachin" required>
<label for="Sachin Tendulkar">A) Sachin Tendulkar</label><br><br>
<input type="radio" id="Question_error" name="Question1" value="Kohli">
<label for="Virat Kolli">B) Virat Kohli</label><br><br>
<input type="radio" id="Question_error" name="Question1" value="Gilchirst">
<label for="Adam Gilchirst">C) Adam Gilchirst</label><br><br>
<input type="radio" id="Question_error" name="Question1" value="adam">
<label for="Jacques Kallis">D) Jacques Kallis</label><br><br>
</div>
<div id="result"></div>  
</form>

 <button class="button" onclick="location.href='<?php echo base_url();?>Form/multicheck'">Register</button>
 <script>
function clickMe(){
var result ="<?php player_insert(); ?>"
document.write(result);
}


</script>
	
	</body>
</html>

