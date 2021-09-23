<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<style type="text/css">	/* INTERNAL CSS */
			body{
				
				background-color:pink;
				text-align:center;
				margin-top: 200px;
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
}
.this{
	background-color: salmon; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

h3{
	color: #ff8000;
}
p{
	color:#404040;
}
h2{
	color:#1a001a;
}	
	</style>
	<head>
		<!-- JQUERY CDN -->
		<form method="post" action="<?php echo base_url(); ?>Form/Color">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<title>form</title>
		 <!-- External CSS link -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/index.css');?>">
	</form>
	</head>

	<body>	
		 

	
	
		<h2>SUMMARY</h2>
<?php foreach($EduData as $post): ?>
	
		
<h3>Hello:"<?php echo $post->UserName; ?>"</h3>
<?php   endforeach;?>

		
<h2>Here are the answers selected:</h2>

<h3>Who is the best cricketer in the world?</h3>

 <?php foreach($some as $get): ?>
	
<p>Answer:"<?php echo $get->Player_Name; ?>"</p>
<?php   endforeach;?> </p>

<h3>What are the colors in the national flag?</h3>

 <?php foreach($color as $var): ?>
<p>Answer":<?php echo $var->ColorName; ?>"</p>
<?php   endforeach;?> </p>

 <input type="button" onclick="location.href='<?php echo base_url();?>Form/History'" class="this" value="History" id="save">
 <button class="button" onclick="location.href='<?php echo base_url();?>Form/index'">Finish</button> 


	
			
			





	
	</body>
</html>