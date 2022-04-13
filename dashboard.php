<?php session_start(); include('connection.php'); include('header.php');
// echo $_COOKIE[$cookie_name];
if(!isset($_COOKIE[$cookie_name])) {
  header('Location: logout.php');
}
else
{
     $val = $_COOKIE[$cookie_name];
}

$val = $_SESSION['user'];
?>
  
  <script src="js/jquery.min.js"> </script>  
  <script src="js/popper.min.js"> </script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>  
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">   
  <script src="js/jquery.dataTables.min.js"> </script>  
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >  
</head>  
<style>  
body {  
  margin: 0;  
    min-height: 100vh;  
  padding: 0;  
  background-color: var(--clr-light);  
  color: var(--clr-black);  
  font-family: 'Poppins', sans-serif;  
  font-size: 1.125rem;  
  justify-content: center;  
  align-items: center;  
}  
h2 {  
font-family: 'Indie Flower', cursive;  
font-size: 32px;  
  color: #03A9F4;  
  font-weight: bold;  
  text-align: center;  
  padding: 20px 0;  
}  
  
table caption {  
    padding: .5em 0;  
}  
  
table.dataTable th  
{  
  white-space: nowrap;  
}  
table.dataTable td {  
  white-space: nowrap;  
}  
.p {  
  text-align: center;  
  padding-top: 140px;  
  font-size: 14px;  
}  
</style>  
<section class="trending-gamepay-area pb-100">
    <div class="container">  
        <div class="row">  
            <div class="col-xs-12 offset-1">  
                <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">  
                    <thead>  
                      <tr>  
                        <th style="background: azure;"> Ip Address</th>  
                        <th style="background: azure;"> Name </th>  
                        <th style="background: azure;"> Email </th>  
                        <th style="background: azure;"> Date </th>  
                      </tr>  
                    </thead>  
                    <tbody>  
                    <?php 
                        $query1 ="SELECT ipaddress.ipaddress, ipaddress.date, user.name, user.email FROM ipaddress INNER JOIN user ON ipaddress.user_id = user.id where user.id= :id";
                        $stm=$db->prepare($query1);
                        $stm->bindParam(':id',$val); 
                        $stm->execute();
                        while($result=$stm->fetch(PDO::FETCH_ASSOC))
                        {
                            $date = $result['date'];
                            $dt = date("d-m-Y",strtotime($date));
                    ?>
                        <tr>  
                            <td> <?php echo $result['ipaddress']; ?> </td>  
                            <td> <?php echo $result['name']; ?> </td>  
                            <td> <?php echo $result['email']; ?> </td>  
                            <td> <?php echo $dt ?></td>  
                        </tr>  
                    <?php 
                        }
                    ?>  
                    </tbody> 
                </table>  
            </div>  
        </div>  
    </div> 
<br></br>
</section>

<script>  
$('table').DataTable();  
</script>  
<?php include('footer.php');?>