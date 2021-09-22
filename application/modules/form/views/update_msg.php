<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="post" action="<?php echo base_url(); ?>Form/multicheck">

  <input type="checkbox" id="checkItem" name="check[]" value="1">Car<br>
  <input type="checkbox" id="checkItem" name="check[]" value="2">Bike<br>
  <input type="checkbox" id="checkItem" name="check[]" value="3">Cycle<br>
  <button type="submit" class="btn btn-primary" style="width:200px" name="save">Submit</button>
</form>
</body>
</html>
 