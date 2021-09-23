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
	color:#006600;
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<title>form</title>
		 <!-- External CSS link -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/index.css');?>">
	</head>

	<body>	
		 

	
	
		<h2>SUMMARY</h2>
	<?php foreach($data as $post): ?>
		<p>Game<?php echo $post->id; ?><span>:</span></p>
		<p>Date and Time :<?php echo $post->CreatedDateTime; ?></p>

	<p>Name:"<?php echo $post->UserName; ?>"</p>

<h3>Who is the best cricketer in the world?<h3>
<p>Answer: <?php echo $post->Player_Name; ?></p>

<h3>What are the colors in the national flag?<h3>
<p>Answer: <?php echo $post->ColorName; ?></p>
<?php   endforeach;?>	

	</body>
</html>