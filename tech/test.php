<?php 
include('const.php');

$conn4 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();

$db_select = mysqli_select_db($conn4, DB_NAME) or die();

$sql4 = "SELECT * FROM osoba INNER JOIN rok_2022 on rok_2022.oc = osoba.oc ";

$res4 = mysqli_query($conn4, $sql4);

if($res4 == true){
    $row = mysqli_fetch_assoc($res4);

$jmeno = $row['jmeno'];
$prijmeni =$row['prijmeni'];
$tel = $row['tel'];
$mobil = $row['mobil'];
$email = $row['email'];
$USEK = $row['usek'];
$stredisko = $row['stredisko'];
$budova = $row['budova'];
$patro = $row['patro'];
$mistnost = $row['mistnost'];

}


$conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();

$db_select = mysqli_select_db($conn2, DB_NAME) or die();

$sql2 = "SELECT * FROM  osoba
INNER JOIN rok_2022 on rok_2022.oc = osoba.oc
INNER JOIN vedouci on rok_2022.stredisko = vedouci.stredisko 
";

$res2 = mysqli_query($conn2, $sql2);
if($res2 == true){
    $row = mysqli_fetch_assoc($res2);

$vedouci = $row['vedouci'];
$stredisko = $row['stredisko'];

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
  <head>
	<title>NOVÝ POŽADAVEK</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />	
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="test.css" media="screen, projection, tv" />
	<link rel="Shortcut Icon" type="image/x-icon" href="images/favicon.ico" />	       
	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/script.js?v=24" type="text/javascript"></script>
  </head>

  <body>
    <div id="master">
		<header>
			<div id="logo">	
				<a href="#" title="Střední škola stavebních řemesel Brno-Bosonohy"><img src="bosonohy_logo.png" alt="Střední škola stavebních řemesel Brno-Bosonohy" style="width: 200px;"/></a>
			</div>
			<div id="social-search">
				<h1>NOVÝ POŽADAVEK</h1>				
			</div>
			<div id="navigation-top">
			</div>
		</header>
   
		<div class="subnavigation">
			<ul>
            <li><a class="btn-secondary" href="<?php echo 'http://localhost/orders/test.php'; ?>">NOVÝ POŽADAVEK</a> </li>
				<li><a class="btn-secondary" href="<?php echo SITEURL; ?>">PŘEHLED POŽADAVKŮ</a></li>
                <li><a class="btn-secondary" href="<?php echo 'http://localhost/orders/task/login.php'?>">PŘIHLÁSIT SE</a></li>
                <li><a class="btn-secondary" href="<?php echo 'http://localhost/orders/task/logout.php'?>">ODHLÁŠENÍ</a></li>
				
			</ul>
		</div>
      
		<div class="content">
			<div class="box downsmall">
				<div class="fields-of-study">
      

					<h2 class="overview">NOVÝ POŽADAVEK</h2>

                    <div class="form"> 
                        <form class="main" method="GET" action=""> 
                        
                            <div class="vlevo"> 

                            
                                <label><strong>Zadejte své osobní číslo:</strong></label> 
                                <input type="text" style="width: 150px" name="oc" value="<?php if(isset($_GET['oc'])) {echo $_GET['oc'];}?>" >
                                <button type="submit">Hledat</button>
                    </form>
	
				
						<form action="" method="post" id="add_task"  enctype="multipart/form-data">						
                        <?php 
                            $con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                if(isset($_GET['oc'])) {
                                    $oc = $_GET['oc'];
                                    $query = "SELECT * FROM osoba WHERE oc='$oc' ";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $row) {
                             ?> 	
                                                    
                        <div>
                         <label>  Název požadovaného zboží: </label> 
                   
                        <input type="text" name="NAZEV_POZADOVANEHO_ZBOZI" style="width: 150px" required>
                            </div>
                            <div> <label> 
                               Komodita : </label> 
                                <select id="komodita" name="KOMODITA" onchange="populate(this.id,'pc')" required  >
                                <option value="">Vyberte</option>
                                <option value="elektrospotrebice">Elektrospotřebiče</option>
                                <option  value="vypocetni_technika">Výpočetní technika</option>
                                <option value="nabytek">Nábytek</option>
                                <option value="sportovni_potreby">Sportovní potřeby</option>
                                <option value="stroje_a_naradi">Stroje a nářadí</option>
                                <option value="ostatni">Ostatní</option>
                                   </select>		
								
 <select id="pc" name="PC"  >

</select>

                                <script type="text/javascript">
function populate(s1,s2) {
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    if(s1.value == "vypocetni_technika") {
        var optionArray = ['Vyberte|Vyberte', 'cad|CAD', 'photoshop|Photoshop', 'excel|Excel'];
    }
    for(var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value =  pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}
</script>
</div>	
<div>
            <label> 
            Priorita nákupu: </label> 
                   
                <select id="priorita_nakupu" name="PRIORITA_NAKUPU" style="width: 150px"  required>
                 <option value="">Vyberte</option>
                 <option value="urgent">urgentní</option>
                 <option value="dulezite">důležité</option>
                 <option value="nespecha">nespěchá</option>
                </select>
            </div> 
                                <div>
                         <label>Předběžný termín nákupu:</label> 
                   
                        <input type="month" name="PREDBEZNA_DOBA_NAKUPU" style="width: 150px" required >
                            </div>
              
	
                            <div>
                    <label> 
                        Tip (pokud máte vybráno): </label> 
                    
                        <input type="text" name="TIP" placeholder="uveďte webovou stránku " style="width: 150px"  >
          
                    </div> 
                    <div> <label> 
                Počet kusů: </label> 
                <input type="number" name="POCET_KUSU" style="width: 150px" required >
            </div>
            <div> <label>  
                Umístění: </label> 
                <input type="text" name="UMISTENI" placeholder="Kde se bude nakoupené zboží používat" style="width: 250px" required> 
            </div>
            <div> <label> 
              Orientační cena: </label> 
            <input type="number" name="ORIENTACNI_CENA" style="width: 150px" required>
              <select id="currency" name="currency"   >
                            <option value="kc">Kč</option>
                 </select>
            </div>
		
            <div> <label> 
                        Poznámka:</label> 
                        <textarea name="POZNAMKA" placeholder="Zde mužete vložit poznamku.. " rows="2" cols="3" ></textarea>
</div>
								
								<div>
	
                                    <input type="submit"  value="odeslat" name="submit" class="submit formular-button" style="width: 150px" onclick="return confirm('Poslat objednavku?')" />
								</div>	
							</div>				
       			
							<div class="vpravo">
              <div>
									<label for="oc">Číslo</label>
									<input type="text" size="10" value="<?php  echo $row['oc']; ?>" name="oc" id="oc" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="jmeno">Jméno</label>
									<input type="text" size="10" value="<?php  echo $row['jmeno']; ?>" name="jmeno" id="jmeno" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="prijmeni">Příjmení</label>
									<input type="text" size="10" value="<?php  echo $row['prijmeni']; ?>" name="prijmeni" id="prijmeni" readonly="readonly"  class="seda"/>
								</div>			
								<div>
									<label for="tel">Telefon</label>
									<input type="text" size="10" value="<?php  echo $row['tel']; ?>" name="tel" id="tel" readonly="readonly" class="seda" />
								</div>		
								<div>
									<label for="mobil">Mobil</label>
									<input type="text" size="10" value="<?php  echo $row['mobil']; ?>" name="mobil" id="mobil" readonly="readonly" class="seda" />
								</div>			
								<div>
									<label for="email">E-mail</label>
									<input type="text" size="10" value="<?php  echo $row['email']; ?>"  name="email" id="email" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="usek">Úsek</label>
									<input type="text" size="10" value="<?php  echo $row['usek']; ?>" name="usek" id="usek" readonly="readonly" class="seda" />
								</div>
								<div>
									<label for="email">Středisko</label>
									<input type="text" size="10"  value="<?php  echo  $row['stredisko']; ?>" name="stredisko" id="stredisko" readonly="readonly" class="seda" />
								</div>	
                <div>
									<label for="email">Vedoucí</label>
									<input type="text" size="10"  value="" name="" id="" readonly="readonly" class="seda" />
								</div>	
								
																<div>
									<label for="email">Patro</label>
									<input type="text" size="10"  value="<?php  echo $row['patro']; ?>" name="patro" id="patro" readonly="readonly" class="seda" />
								</div>	
								<div>
									<label for="email">Místnost</label>
									<input type="text" size="10" value="<?php  echo $row['mistnost']; ?>" name="mistnost" id="mistnost" readonly="readonly" class="seda" />
								</div>									
							</div>		
                            <?php
                } 

            } else {
                echo "žadny  uživatel";
            }
        }

       
       
       ?>						
							</form>
					</div>
				</div>
			</div>    
	   </div>
       <script>
function clicked(e)
{
    if(!confirm('Opravdu odeslat požadavek?')) {
        e.preventDefault();
    }
} 
</script>

		    <footer>

      <div class="footinner">
        <a href="../" class="footer_logo" title="Střední škola stavebních řemesel Brno-Bosonohy"></a>
        <div class="footer-info">
          <span class="telefon">+420 547 120 661</span>
          <span class="email"><a href="mailto:sekretariat@soubosonohy.cz">sekretariat@soubosonohy.cz</a></span>
          <span class="adress">Pražská 38b, 642 00 Brno - Bosonohy</span>
        </div>
        <div class="copyright">
          <p>Copyright © 2014-2015 Střední škola stavebních řemesel<br/> Created by <a href="http://www.efectel.cz">Efectel.cz</a></p>
        </div> 
      </div>
    </footer>
	</div>	
  </body>
</html>
<?php 
if(isset($_POST['submit'])) {
$stredisko = $_POST['stredisko'];
$NAZEV_POZADOVANEHO_ZBOZI = $_POST['NAZEV_POZADOVANEHO_ZBOZI'];
$POCET_KUSU = $_POST['POCET_KUSU'];
$KOMODITA = $_POST['KOMODITA'];
$PRIORITA_NAKUPU = $_POST['PRIORITA_NAKUPU'];
$UMISTENI = $_POST['UMISTENI'];
$ORIENTACNI_CENA = $_POST['ORIENTACNI_CENA'];
$PREDBEZNA_DOBA_NAKUPU = $_POST['PREDBEZNA_DOBA_NAKUPU'];
$prijmeni = $_POST['prijmeni'];
$TIP = $_POST['TIP'];
$oc = $_POST['oc'];
$POZNAMKA = $_POST['POZNAMKA'];
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();

$db_select = mysqli_select_db($conn, DB_NAME);

$sql = "INSERT INTO rok_202201 SET
vedouci= '$vedouci',
NAZEV_POZADOVANEHO_ZBOZI='$NAZEV_POZADOVANEHO_ZBOZI',
POCET_KUSU = '$POCET_KUSU',
KOMODITA = '$KOMODITA',
PRIORITA_NAKUPU = '$PRIORITA_NAKUPU',
UMISTENI = '$UMISTENI',
ORIENTACNI_CENA = '$ORIENTACNI_CENA',
PREDBEZNA_DOBA_NAKUPU = '$PREDBEZNA_DOBA_NAKUPU',
prijmeni = '$prijmeni',
stredisko = '$stredisko',
oc = '$oc',
TIP = '$TIP',
POZNAMKA = '$POZNAMKA'

";

$res = mysqli_query($conn, $sql);


} 
?>