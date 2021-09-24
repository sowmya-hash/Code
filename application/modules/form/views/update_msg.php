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

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<head>

</head>
<body>
  <form class="" id="myform" action="<?php echo base_url(); ?>Form/colorinsert" method="post"><div class="question1"style="margin-left: 30px;">
    <p>What are the colors in the Indian national flag? Select all:<span style="color: red">*</span></h3></p>
  </div>
 
<input type="hidden" name="userId" value="<?=$this->uri->segment(3);?>">
<label class="container">White
  <input type="checkbox"  id="checkItem" name="check[]"value="White" required>
  <span class="checkmark" style="margin-left: 900px;"></span>
</label>
<label class="container">Yellow
  <input type="checkbox"  id="checkItem" name="check[]" value="Yellow" >
  <span class="checkmark" style="margin-left: 900px;"></span>
</label>
<label class="container">Green
  <input type="checkbox"  id="checkItem" name="check[]" value="Green"  >
  <span class="checkmark" style="margin-left: 900px;"></span>
</label>
<label class="container">Orange
  <input type="checkbox"  id="checkItem" name="check[]"  value="Orange" >
  <span class="checkmark" style="margin-left: 900px;"></span>
</label>

 <button type="submit"  onclick=" deleteData()" name="button" class="button" style="margin-left: 30px;"> Next </button> 

 <h3 id="disp" style= "color:green"> </h3>  
<h4 id="error" style= "color:red"> </h4>  

<script type="text/Javascript">
    function deleteData() {
      if(document.getElementById('checkItem').checked) {   
                document.getElementById("disp").innerHTML   
                    = document.getElementById("checkItem").value   
                    + " checkbox  is checked";   
            }  
            else {   
                document.getElementById("error").innerHTML   
                    = "You have not selected any player"; 

            }    
        }
      
</script>
</form>
</body>
</html>
 