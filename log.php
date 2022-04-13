<?php include('header.php');?>
  
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
            <th style="background: azure;"> Ip </th>  
            <th style="background: azure;"> Log Time </th>  
            <th style="background: azure;"> Population </th>  
            <th style="background: azure;"> Median Age </th>  
            <th style="background: azure;"> Area (Km?)</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td> Andhra Pradesh </td>  
            <td> English, Hindi </td>  
            <td> 41,803,125</td>  
            <td> 31.3 </td>  
            <td> 2,780,387 </td>  
          </tr>  
          <tr>  
            <td> Himachal Pradesh </td>  
            <td> English 79%, native and other languages </td>  
            <td> 23,630,169 </td>  
            <td> 37.3 </td>  
            <td> 7,739,983 </td>  
          </tr>  
          <tr>  
            <td> Gwalier </td>  
            <td> Hindi </td>  
            <td> 11,128,40 </td>  
            <td> 43.2 </td>  
            <td> 131,956 </td>  
          </tr>  
          <tr>  
            <td> Ludhiana </td>  
            <td> Panjabi </td>  
              <td> 23,630,169 </td>  
            <td> 37.3 </td>  
            <td> 7,739,983 </td>  
          </tr>  
          <tr>  
            <td> Goa </td>  
            <td> native </td>  
           <td> 41,803,125</td>  
            <td> 31.3 </td>  
            <td> 2,780,387 </td>  
          </tr>  
          <tr>  
            <td> Mumbai </td>  
            <td> Native </td>  
           <td> 23,630,169 </td>  
            <td> 37.3 </td>  
            <td> 7,739,983 </td>  
          </tr>  
        </tbody>  
        <tfoot>  
          
     </tfoot>  
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