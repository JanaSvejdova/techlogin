<?php 
include('config/constants.php');
include('../show.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>PŘEHLED POŽADAVKŮ</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />	
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen, projection, tv" />
	<link rel="Shortcut Icon" type="image/x-icon" href="images/favicon.ico" />	       
	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="test.css">

</head>
  <body>
    <div id="master">
		<header>
			<div id="logo">	
				<a href="/" title="Střední škola stavebních řemesel Brno-Bosonohy"><img src="bosonohy_logo.png" alt="Střední škola stavebních řemesel Brno-Bosonohy" /></a>
			</div>
			<div id="social-search">
				<h1>PŘEHLED POŽADAVKŮ</h1>				
			</div>
			<div id="navigation-top">
			</div>
		</header>
        

		<div class="subnavigation">
        <ul>
				<li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/order.php'; ?>">NOVÝ POŽADAVEK</a> </li>
				<li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/task/index.php'; ?>">PŘEHLED POŽADAVKŮ</a></li>
				<li><a ><?php
            if(isset($_SESSION['myemail']))
            {
                echo $_SESSION['myemail'];
            }
            
            ?> </a>
            </li>
                <li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/task/logout.php'?>">ODHLÁŠENÍ</a></li>
                                
			
		</div>
      
      <div class="content">
          <div class="box downsmall">
              <div class="fields-of-study">
              <h2>Přehled požadavků na nakup</h2>

			
                <form action="show.php" method="get" > 
	<table id="prehled">
	<thead>
		<tr>
            <td>Název zboží</td>
            <td>Požadavek zadal</td>
            <td>Priority</td>
            <td>Email</td>
            <td>Termín</td>
            <td>Orientační cena</td>
            
          
        </tr>
	</thead>
   <?php foreach($result as $row){
echo "
<tr>
 <td>{$row['NAZEV_POZADOVANEHO_ZBOZI']}</td>
 <td>{$row['PRIORITA_NAKUPU']}</td>
 <td>{$row['prijmeni']}</td>
 <td>{$row['email']}</td>
 <td>{$row['PREDBEZNA_DOBA_NAKUPU']}</td>
 <td>{$row['ORIENTACNI_CENA']}</td>
 </td>
";
} ?>
                    
</tr>
	</table>
 
				</div>
			</div>	
		</div>				
       

	</div>	
  </body>
</html>
