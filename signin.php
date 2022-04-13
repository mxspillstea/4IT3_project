<?php
session_start();
include('connection.php');
include('header.php');
$insertMsg='';
if(isset($_REQUEST['login']))
{
	$email	= strip_tags($_REQUEST['email']);
	$password = strip_tags($_REQUEST['password']);
	
	$query1 ="select * from user where email= :em order by id desc limit 1";
    $stm=$db->prepare($query1);
    $stm->bindParam(":em",$email);
    $stm->execute();
    $count=$stm->rowCount();
    if($count>0)
    {
        $result=$stm->fetch(PDO::FETCH_ASSOC);
        
        $hashp02 = $result['password'];
    	$test02 = password_verify($password, $hashp02);
    	
    // 	if($test02 == true)
    // 	{
    	    $pss = md5($password);
    	    $query1 ="select * from user where email= :em and password= :pwd";
            $stm=$db->prepare($query1);
            $stm->bindParam(":em",$email);
            $stm->bindParam(":pwd",$pss);
            $stm->execute();
            $count1=$stm->rowCount();
            if($count1>0)
            {
                $result=$stm->fetch(PDO::FETCH_ASSOC);
                
                $id = $result['id'];
                
                $ip_add = $_SERVER['REMOTE_ADDR'];
                
                $insert_stmt1=$db->prepare('INSERT INTO ipaddress(ipaddress,user_id) VALUES(:ip_add,:id)'); 
			
        		$insert_stmt1->bindParam(':ip_add',$ip_add);
        		$insert_stmt1->bindParam(':id',$id); 
        		$insert_stmt1->execute();
                
                $_SESSION['user'] = $id;
                $_SESSION['LAST_ACTIVITY'] = time();
                // echo $_SESSION['user'];
                $cookie_name = 'userid';
                $cookie_value = $id;
                
                setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/");
                // echo $cookie_value;
                // echo "Cookie '" . $cookie_name . "' is set!<br>";
                // echo "Value is: " . $_COOKIE[$cookie_name];
                $insertMsg="<div id='show_msg' class='alert alert-success alert-dismissiBle'>
        		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        		<h6> Logged in Successfully........ </h6></div>"; 
        // 		header("refresh:2;upload.php"); 
            }
            else
            {
                $insertMsg="<div id='show_msg' class='alert alert-danger alert-dismissiBle'>
    		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    		<h6> Email or Password Does not Match </h6></div>"; 
            }
    // 	}
    // 	else
    // 	{
    // 	    $insertMsg="<div id='show_msg' class='alert alert-danger alert-dismissiBle'>
    // 		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    // 		<h6> Password Does not Match </h6></div>"; 
    // 	}
    }
    else
    {
        $insertMsg="<div id='show_msg' class='alert alert-danger alert-dismissiBle'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h6> User Does not Exist </h6></div>"; 
    }
}
?>	
<section class="trending-gamepay-area pb-80">
    <div class="container">
        <div class="signup-form col-md-8 offset-2 col-8 ">
            <form action="#" method="post">
		<h2>Sign In</h2>
		<p>Please fill in this form to Login!</p>
		<?php echo $insertMsg ?>
		<hr>
		<div class="row">
		<!--<div class="col-lg-6 col-md-12 mb-30"></div>-->
		<div class="col-lg-6 col-md-12 mb-30">
            <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
			</div>
        </div>
		</div>
		<div class="col-lg-6 col-md-12 mb-30">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div></div>
		
	
		<div class="col-lg-12 col-md-12 mb-30">
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
        </div>
		</div>
		</div>
    </form>
	        <div class="text-center">Already have an account? <a href="#">Login here</a></div>
        </div>
    </div>
</section>

<?php include('footer.php');?>
<script>
	$(".alert-success").fadeTo(2000, 1000).slideUp(1000, function(){
		$(".alert-success").slideUp(1000);
		window.location.href='dashboard.php';
	});
</script>