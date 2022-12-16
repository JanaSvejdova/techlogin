<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaa";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM rok_2022");

$stmt->execute();
$result = $stmt ->fetchAll(PDO::FETCH_BOTH);
foreach( $result as $row ) {
     $row['NAZEV_POZADOVANEHO_ZBOZI'];
     $row['PRIORITA_NAKUPU'];
     $row['prijmeni'];
     $row['stredisko'];
     $row['PREDBEZNA_DOBA_NAKUPU'];
     $row['ORIENTACNI_CENA'];
     $row['email'];

}