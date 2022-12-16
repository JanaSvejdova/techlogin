<?php 
include "const.php";
include "req.php";
								


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

  </head>

  <body>
    <div id="master">
		<header>
			
			<div id="social-search">
				<h1>NOVÝ POŽADAVEK</h1>				
			</div>
			<div id="navigation-top">
			</div>
		</header>
   
		<div class="subnavigation">
    <ul>
				<li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/order.php'; ?>">NOVÝ POŽADAVEK</a> </li>
				<li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/task/index.php'; ?>">PŘEHLED POŽADAVKŮ</a></li>
                <li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/task/login.php'?>">PŘIHLÁSIT SE</a></li>
                <li><a class="btn-secondary" href="<?php echo 'http://localhost/tech/task/logout.php'?>">ODHLÁŠENÍ</a></li>
                
			
		</div>
		<div class="content">
			<div class="box downsmall">
				<div class="fields-of-study">
      

					<h2 class="overview">NOVÝ POŽADAVEK</h2>

                    <div class="form"> 
                  
	
				
						<form action="insert.php" method="POST" id="add_task"  enctype="multipart/form-data">						
                      
                                             
                        <div>
                         <label>  Název požadovaného zboží: </label> 
                   
                        <input type="text" name="NAZEV_POZADOVANEHO_ZBOZI" style="width: 150px" required>
                            </div>
                            <div> <label> 
                               Komodita : </label> 
                                <select id="komodita" name="KOMODITA"  >
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

</div>	
<div>
            <label> 
            Priorita nákupu: </label> 
                   
                <select id="priorita_nakupu" name="PRIORITA_NAKUPU" style="width: 150px" required>
                 <option value="">Vyberte</option>
                 <option value="urgent">urgentní</option>
                 <option value="dulezite">důležité</option>
                 <option value="nespecha">nespěchá</option>
                </select>
            </div> 
                                <div>
                         <label>Předběžný termín nákupu:</label> 
                   
                        <input type="month" name="PREDBEZNA_DOBA_NAKUPU" style="width: 150px">
                            </div>
              
	
                            <div>
                    <label> 
                        Tip (pokud máte vybráno): </label> 
                    
                        <input type="text" name="TIP" placeholder="uveďte webovou stránku " style="width: 150px" required  >
          
                    </div> 
                    <div> <label> 
                Počet kusů: </label> 
                <input type="number" name="POCET_KUSU" style="width: 150px"  required>
            </div>
            <div> <label>  
                Email: </label> 
                <input type="text" name="email" placeholder="email" style="width: 150px" required > 
            </div>
            <div> <label> 
              Orientační cena: </label> 
            <input type="number" name="ORIENTACNI_CENA" style="width: 150px">
              <select id="currency" name="currency"   >
                            <option value="kc">Kč</option>
                 </select>
            </div>
		
            <div> <label> 
                        Poznámka:</label> 
                        <textarea name="POZNAMKA" placeholder="Zde mužete vložit poznamku.. " rows="2" cols="3" ></textarea>
</div>

								<div>
	
                                    <input  type="submit"  value="odeslat" name="submit" class="submit formular-button" style="width: 150px" />
								</div>	
							</div>				
       			
				
					</form>
					</div>
				</div>
			</div>    
    </div>
  
    

	</div>	
  </body>
</html>

