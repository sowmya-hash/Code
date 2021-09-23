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
}
p{
  font-size: 20px;
  color:black;
}
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
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
			<form class="" id="myform" action="<?php echo base_url(); ?>Form/player_insert" method="post">
				<input type="hidden" name="userId" value="<?=$this->uri->segment(3);?>">
			<div class="question1"style="margin-right: 350px;">
		<p>Who is the best cricketer in the world?</p>
	</div>
	<div class="questionS"style="margin-right: 350px;">
	<p>Options:</p>
<label class="container">Sachin Tendulkar
  <input type="radio"id="Sachin_Tendulkar" name="Question1" value="Sachin Tendulkar"  required>
  <span class="checkmark" style="margin-left: 700px;"></span>
</label>
<label class="container">Kohli
  <input type="radio" id="Virat_Kohli" name="Question1" value="Kohli">
  <span class="checkmark" style="margin-left: 700px;"></span>
</label>
<label class="container">Gilchirst
  <input type="radio" id="Adam_Gilchirst" name="Question1" value="Gilchirst">
  <span class="checkmark" style="margin-left: 700px;"></span>
</label>
<label class="container">Jacques Kallis
  <input type="radio"  id="Jacques_Kallis" name="Question1" value="Jacques Kallis">
  <span class="checkmark" style="margin-left: 700px;"></span>
</label>

</div>


<button type="submit"  onclick=" checkButton()" name="button" class="button"> Next </button> 
      
<h3 id="disp" style= "color:green"> </h3>  
<h4 id="error" style= "color:red"> </h4>    
</form>

 <script>  
function checkButton() {    
            if(document.getElementById('Sachin_Tendulkar').checked) {   
                document.getElementById("disp").innerHTML   
                    = document.getElementById("Sachin_Tendulkar").value   
                    + " radio button is checked";   
            }   
            else if(document.getElementById('Virat_Kohli').checked) {   
                document.getElementById("disp").innerHTML   
                    = document.getElementById("Virat_Kohli").value   
                    + " radio button is checked";     
            }   
            else if(document.getElementById('Adam_Gilchirst').checked) {   
                document.getElementById("disp").innerHTML   
                    = document.getElementById("Adam_Gilchirst").value   
                    + " radio button is checked";     
            }   
            else if(document.getElementById('Jacques_Kallis').checked) {   
                document.getElementById("disp").innerHTML   
                    = document.getElementById("Jacques_Kallis").value   
                    + " radio button is checked";
                     
            }  
            else {   
                document.getElementById("error").innerHTML   
                    = "You have not selected any player"; 

            }   
        }   
    </script>   

	
	</body>
</html>

