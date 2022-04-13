<?php session_start(); include('connection.php'); 
// echo $_COOKIE[$cookie_name];
if(!isset($_COOKIE[$cookie_name])) {
  header('Location: logout.php');
}
else
{
    $val = $_COOKIE[$cookie_name];
}

$val = $_SESSION['user'];
include('header.php');
if(isset($_REQUEST['submit']))
{
	$name = $_FILES['photo']['name'];
	$size = $_FILES['photo']['size'];
	$tmp  = $_FILES['photo']['tmp_name'];  
	$type = $_FILES['photo']['type'];

	if($name != '')
	{
		if(is_uploaded_file($_FILES['photo']['tmp_name'])) 
		{
			if (strpos($name, '.php') !== false || strpos($name, '.html') !== false || strpos($name, '.phtml') !== false) 
			{
				echo "<script>alert('Cant Upload Image with file extension name !!!');</script>";
				$pro_man_img = '';
			}
			else
			{
				$pro_man_img = rand(0,99999999).$name;
				
				if(move_uploaded_file($tmp, 'upload_img/'.$pro_man_img))
				{
				    
				}
				else
				{
					$pro_man_img = '';
				}
			}
		}
		else
		{
		  $pro_man_img = '';
		}
	}
	else
	{
		$pro_man_img = $_REQUEST['image1'];
	}
	
	if(isset($_REQUEST['edit']))
	{
		try
		{
			$id = $_REQUEST['edit'];	
			$update_stmt=$db->prepare('UPDATE attachment SET image=:pro_man_img WHERE id=:id'); //sql update query
			
			$update_stmt->bindParam(':pro_man_img',$pro_man_img); 
			$update_stmt->bindParam(':id',$id);
			 
			if($update_stmt->execute())
			{
				$insertMsg="<div id='show_msg' class='alert alert-success alert-dismissiBle'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<h4> Update Successfully........ </h4></div>"; 
				header("refresh:2;upload.php");	//refresh 2 second and redirect to index.php page
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}
	else
	{
		try
		{
			$insert_stmt=$db->prepare('INSERT INTO attachment(user_id,image) VALUES(:val,:pro_man_img)'); 
				
			$insert_stmt->bindParam(':pro_man_img',$pro_man_img);
			$insert_stmt->bindParam(':val',$val);
				
			if($insert_stmt->execute())
			{
				$insertMsg="<div id='show_msg' class='alert alert-success alert-dismissiBle'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<h4> Insert Successfully........ </h4></div>"; 
				header("refresh:2;upload.php");
			}
		}
		catch(PDOException $e)
		{
			$insertMsg= $e->getMessage();
		}
	}
}

?>

<section class="trending-gamepay-area pb-80">
                <div class="container">
                 
                        
                       <div class="signup-form col-md-8 offset-2 col-8 ">
    <form action="" method="post" enctype="multipart/form-data" >
		<h2>Upload File</h2>
	<?php echo $insertMsg ?>
	<?php 
		if(isset($_REQUEST['edit']))
		{
			$id=$_REQUEST['edit'];
			$select_stmt=$db->prepare("SELECT * FROM attachment WHERE id =:id");
			$select_stmt->bindParam(':id',$id);
			$select_stmt->execute();
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
			$image = $row['image'];
		}
	?>
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
    				<input type="file" class="form-control" name="photo"  required="required">
    			</div>
            </div>
            <input type="hidden" class="form-control" placeholder="Enter Content" name="image1" value="<?php if(isset($_REQUEST['edit'])){ echo $image; } ?>">
			<?php if(isset($_REQUEST['edit'])){ ?>
		        <?php 
                    if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'webp')
                    {
                ?>
                        <img src="upload_img/<?php echo $row['image']; ?>" alt="" style="height: 200px" /> 
                <?php 
                    }
                    else if($extension == 'pdf')
                    {
                ?>
                        <a href="upload_img/<?php echo $row['image']; ?>" download><i class="fa fa-download"></i></a> 
                <?php 
                    }
                    else if($extension == 'msword' || $extension == 'vnd.ms-powerpoint' || $extension == 'vnd.ms-excel' || $extension == 'vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    {
                ?>
                        <a href="upload_img/<?php echo $row['image']; ?>" download><i class="fa fa-download"></i></a> 
                <?php 
                    }
                    else
                    {
                ?>
                        <a href="upload_img/<?php echo $row['image']; ?>" download><i class="fa fa-download"></i></a> 
                <?php         
                    }
                ?>   
			<?php } ?>
		</div>
	
		
	
		<div class="col-lg-12 col-md-12 mb-30">
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Upload</button>
        </div>
		</div>
		</div>
    </form>

</div>
                      
                    </div>
                
            </section>
<?php include('footer.php');?>
<script>
	$(".alert-success").fadeTo(2000, 1000).slideUp(1000, function(){
		$(".alert-success").slideUp(1000);
		window.location.href='view_attachment.php';
	});
</script>