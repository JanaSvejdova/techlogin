<?php 
include('config/constants.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title> Schovalovaní</title>
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
<header>
			<div id="logo">	
				<a href="/" title="Střední škola stavebních řemesel Brno-Bosonohy"><img src="bosonohy_logo.png" alt="Střední škola stavebních řemesel Brno-Bosonohy" /></a>
			</div>
			<div id="social-search">
				<h1>login</h1>				
			</div>
			<div id="navigation-top">
			</div>
           
		</header>

        <body> 


<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!$DB = new PDO("mysql:host=localhost;dbname=aaa", "root", "")) {
            die("could not connect");
        }
       
     
        $arr['email'] = $_POST['email'];
        $arr['heslo'] = $_POST['heslo'];
        

        $query = "SELECT *  FROM osoba where email = :email && heslo = :heslo limit 1";

        
        $stm = $DB->prepare($query);
        if($stm) {

            $check = $stm->execute($arr);
            if($check){ 
                $data = $stm -> fetchAll(PDO::FETCH_ASSOC);
                if(is_array($data) && count($data) > 0) {
                    $_SESSION['myid'] = $data[0]['oc'];
                    $_SESSION['myname'] = $data[0]['jmeno'];
                    $_SESSION['myrank'] = $data[0]['rank'];
                    $_SESSION['myemail'] = $data[0]['email'];

                } else {
                 echo   $error = "Wrong username or password";
                }
            }

            if($error == "") {

                header("Location: dodavatel.php");
                die;
            }
        }

 }
?>

    <div class="main-content">
        <form method="POST">
            
            <input class="input" type="email" name="email" placeholder="Email" required><br>
            <input class="input" type="password" name="heslo" placeholder="heslo" required><br>
            <br>
            <input class="button" type="submit" value="login"> <br>
        </form>

    </div>
        </body>

</html>
