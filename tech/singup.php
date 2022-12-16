<?php 
include('task/config/constants.php')
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
				<h1>sing up</h1>				
			</div>
			<div id="navigation-top">
			</div>
		</header>
        <body> 


<?php 
    function create_userid() {
        $lenght = rand(4,20);
        $number = "";
        for ($i=0; $i < $lenght; $i++) {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;

        }
        return $number;
    }

if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!$DB = new PDO("mysql:host=localhost;dbname=orders", "root", "")) {
            die("could not connect");

        }

$arr['userid'] = create_userid();
$condition = true;
while($condition) {

    $query = "select id from users where userid = :userid limit 1";
    $stm = $DB-> prepare($query);
    if ($stm) {
        $check = $stm->execute($arr); 
        if($check){ 

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        if(is_array($data) && count($data) > 0) {

            $arr['userid'] = create_userid();
            continue;
        }
    }

    }
    $condition = false;
}


$arr['name'] = $_POST['name'];
$arr['email'] = $_POST['email'];
$arr['password'] = hash('sha1', $_POST['password']);
$arr['rank'] = "user";

$query = "insert into users (userid,name,email,password,rank) values (:userid,:name,:email,:password,:rank)";
    $stm = $DB->prepare($query);
    if ($stm) {
        $check = $stm->execute($arr);
        if(!$check){
            $error = "could not save to database";

        } 
        if($error == "") {
            header("location: login.php");
            die;
        }
    }
 }
?>

<a href="login.php"> login </a>

    <div class="main-content">

        <form method="POST">
            <input class="input" type="text" name="name" placeholder="Name" required><br>
            <input class="input" type="email" name="email" placeholder="Email" required><br>
            <input class="input" type="password" name="password" placeholder="password" required><br>
            <br>
            <input class="button" type="submit" value="Singup"> <br>
        </form>

    </div>
        </body>

</html>
