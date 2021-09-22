<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<style type="text/css">	/* INTERNAL CSS */
			body{
				color:blue;
				background-color:pink;
				text-align:center;
				margin-top: 200px;
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
		  <input type="button" onclick="location.href='<?php echo base_url();?>Form/index'" class="btn btn-primary" value="History" id="save">
 <button class="button" onclick="location.href='<?php echo base_url();?>Form/index'">Finish</button> 
		

	
	
		<h2>SUMMARY</h2>
	<p>Hello:<span><?php foreach($EduData as $post): ?>
	
<p><?php echo $post->UserName; ?></p></span>
<?php   endforeach;?></p>	
		


		
<p>Here are the answers selected:</p>

<p>Who is the best cricketer in the world?</p>

<p>Answer: “<?php foreach($some as $get): ?>
	
<p><?php echo $get->Player_Name; ?></p>
<?php   endforeach;?> “</p>

<p>What are the colors in the national flag?</p>

<p>Answers : </p>

		<!-- <div class="right">
			<a style="border: 1px solid red; background-color: red;" href="<?php echo base_url(); ?>">next</a> -->	<!--Link to form  -->
			<!-- CODE FOR DISPLAY DATA IN TABLE -->
			
			


 


	
	</body>
</html>