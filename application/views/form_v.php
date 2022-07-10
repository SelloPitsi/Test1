<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script data-require="bootstrap" data-semver="3.3.5" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style type="text/css">
		
		.container_div{
			position: absolute;
		    top: 25%;
		    left: 0;
		    right: 0;
		    bottom: 0;
		}

		.is-error p {
			color: red;
		}

		.is-success  h1 {
			color: green;
		}
	</style>
</head>
<body>

	<div class="container container_div" >
		<h1 align="center">Create new user</h1>
		 <div class="is-error" align="center">
    		<?php echo validation_errors(); ?>
    	</div>
    	<div class="is-success" align="center">
    		<h1><?=$message?></h1>
    	</div>
		<form action="<?php echo base_url('Test_c/saveUser'); ?>" method="post">
		  <div class="form-row justify-content-center" >
		    <div class="form-group col-md-6" >
		      <label for="inputEmail4">Name</label>
		      <input type="text" class="form-control" id="name" name="name" value="<?php echo ($reset) ? "" : set_value('name'); ?>">
		      
		    </div>
		     <div class="form-group col-md-6" >
		      <label for="inputEmail4">Surname</label>
		      <input type="text" class="form-control" id="surname" name="surname" value="<?php echo  ($reset) ? "" :  set_value('surname'); ?>">
		      
		    </div>
		  </div>
		  <div class="form-row justify-content-center" >
		    <div class="form-group col-md-6" >
		      <label for="inputEmail4">ID No</label>
		      <input type="text" class="form-control" id="id_no" name="id_no" value="<?php echo  ($reset) ? "" :  set_value('id_no'); ?>">
		      
		    </div>
		     <div class="form-group col-md-6" >
		      <label for="inputEmail4">Date of Birth</label>
		      <input type="date" class="form-control" id="dob" name="dob" max="<?php echo date("Y-m-d") ?>" value="<?php echo  ($reset) ? "" : set_value('dob'); ?>">
		      
		    </div>
		  </div>
		  <div class="form-row justify-content-center" >
		  	<input type="button" onClick="this.form.submit(); this.disabled=true; this.value='Saving...'; " type="submit" class="btn btn-primary" value="Submit" />
		  </div>
		</form>
	</div>
	
</body>
</html>