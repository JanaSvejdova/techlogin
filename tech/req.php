<?php

$nameErr = $emailErr = $prijmeniErr  = "";
$NAZEV_POZADOVANEHO_ZBOZI = $email = $ORIENTACNI_CENAErr = $prijmeni  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["NAZEV_POZADOVANEHO_ZBOZI"])) {
    $nameErr = "Nazev zboží is required";
  } else {
    $NAZEV_POZADOVANEHO_ZBOZI = test_input($_POST["NAZEV_POZADOVANEHO_ZBOZI"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["prijmeni"])) {
    $prijmeniErr = "prijmeni je povinne ";
  } else {
    $prijmeni = test_input($_POST["prijmeni"]);
  }

  if (empty($_POST["ORIENTACNI_CENA"])) {
    $ORIENTACNI_CENAErr = "ORIENTACNI_CENA is required";
  } else {
    $ORIENTACNI_CENA = test_input($_POST["ORIENTACNI_CENA"]);
  }
}
?>
