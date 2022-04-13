<?php include('connection.php');
include('header.php');
$insertMsg='';
if(isset($_REQUEST['register']))
{
	$name	= strip_tags($_REQUEST['name']);
	$email	= strip_tags($_REQUEST['email']);
	$password = strip_tags($_REQUEST['pswd']);
	
	$pass = md5($password);
	try
	{
		$insert_stmt=$db->prepare('INSERT INTO user(name,email,password) VALUES(:name,:email,:pass)'); 
			
		$insert_stmt->bindParam(':name',$name);
		$insert_stmt->bindParam(':email',$email); 
		$insert_stmt->bindParam(':pass',$pass); 
			
		if($insert_stmt->execute())
		{
			$insertMsg="<div id='show_msg' class='alert alert-success alert-dismissiBle'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<h6> Registered Successfully........ </h6></div>"; 
			header("refresh:2;signin.php"); 
		}
	}
	catch(PDOException $e)
	{
		$insertMsg= $e->getMessage();
	}
	
}
?>	
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
  opacity: 1 !important;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
  width: 230px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<section class="trending-gamepay-area pb-80">
    <div class="container">
        <div class="signup-form col-md-8 offset-2 col-8 mb-30">
            <?php echo $insertMsg ?>
            
            <form action="" class="was-validated" method="post">
                <div class="mb-3 mt-3">
                  <label for="uname" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="uname" placeholder="Enter Name" name="name" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="mb-3 mt-3">
                  <label for="uname" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password: 
                    <div class="tooltip"><i class="fa fa-question-circle"></i>
                      <span class="tooltiptext">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                    </div>
                    </label>
                  <input type="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter password" name="pswd" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                  
                </div>
                <div class="mb-3">
                  <label for="pwd" class="form-label">Confirm Password:</label>
                  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="cpswd" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                  <span id = "message" style="color:red"> </span>
                </div>
                <button type="submit" name="register" class="btn btn-primary">Register</button>
             </form>
        </div>      
    </div>
</section>

<?php include('footer.php');?>	

<script>
    $('#password, #confirm_password').on('keyup', function () {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
        $(':input[type="submit"]').prop('disabled', false);
      } else 
      {
        $('#message').html('Not Matching').css('color', 'red');
        $(':input[type="submit"]').prop('disabled', true);
      }
    });
</script>
<script>
	$(".alert-success").fadeTo(2000, 1000).slideUp(1000, function(){
		$(".alert-success").slideUp(1000);
		window.location.href='signin.php';
	});
</script>
