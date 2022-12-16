<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaa";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $conn->prepare("INSERT INTO rok_2022 (NAZEV_POZADOVANEHO_ZBOZI, POCET_KUSU, ORIENTACNI_CENA, email) 
                        VALUES (:NAZEV_POZADOVANEHO_ZBOZI, :POCET_KUSU, :ORIENTACNI_CENA, :email)");
$stmt->bindParam(':NAZEV_POZADOVANEHO_ZBOZI', $NAZEV_POZADOVANEHO_ZBOZI);
$stmt->bindParam(':POCET_KUSU', $POCET_KUSU);
$stmt->bindParam(':ORIENTACNI_CENA', $ORIENTACNI_CENA);
$stmt->bindParam(':email', $email);

$NAZEV_POZADOVANEHO_ZBOZI = $_POST["NAZEV_POZADOVANEHO_ZBOZI"];
$POCET_KUSU = $_POST["POCET_KUSU"];
$ORIENTACNI_CENA = $_POST["ORIENTACNI_CENA"];
$email = $_POST['email'];
$stmt->execute();



$nameErr = $emailErr = $prijmeniErr  = $ORIENTACNI_CENAErr = "";
$NAZEV_POZADOVANEHO_ZBOZI = $email = $ORIENTACNI_CENA = $prijmeni  = "";

if ("REQUEST_METHOD" == "POST") {
  if (empty($_POST["NAZEV_POZADOVANEHO_ZBOZI"])) {
    $nameErr = "Nazev zboží is required";
  } 

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }

  if (empty($_POST["prijmeni"])) {
    $prijmeniErr = "prijmeni je povinne ";
  } 
  if (empty($_POST["ORIENTACNI_CENA"])) {
    $ORIENTACNI_CENAErr = "ORIENTACNI_CENA is required";
  }
}

header("location: ../tech/task/index.php");