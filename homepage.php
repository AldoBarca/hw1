<?php 
session_start();

$conn=mysqli_connect('localhost','root','','ospedale');
$nome_utente=$_SESSION['user'];

$query="SELECT * FROM  utenti Where nome_utente='$nome_utente'";
$res= mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($res);
$nome=$row["nome"];
$password=$row["password"];

$ruolo=$row["ruolo"];

// USO DI API REST DA PHP CHE USA I DATI GET PER FARE UNA RICHIESTA E RICAVARE LE CALORIE DI UN DATO ALIMENTO.
// NON SONO RIUSCITO A EVITARE IL RICARICAMENTO DELLA PAGINA A CAUSA DEL DOVER RICEVERE DATI TRAMITE GET/POST PER LA RICHIESTA API REST DA PHP.
if(isset($_GET['alimento'])){
$alimento=$_GET['alimento'];


$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://food-calorie-data-search.p.rapidapi.com/api/search?keyword=" .$alimento,
	CURLOPT_RETURNTRANSFER => true,
	
	
	CURLOPT_MAXREDIRS => 100,
	
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: food-calorie-data-search.p.rapidapi.com",
		"x-rapidapi-key: 26754f21bamshaa28ca2e54f8ea1p132e17jsnab333c16b5c4"
	],
]);


$risultato=curl_exec($curl);
$json= json_decode($risultato,true);
$calorie=$json[0]['energ_kcal'];





curl_close($curl);}




mysqli_close($conn);

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@1&display=swap" rel="stylesheet">
    <link rel="https://fonts.google.com/share?selection.family=Roboto:ital,wght@1,300" rel="stylesheet">
    <link rel="stylesheet" href="homepage.css?ts=<?=time()?>&quot“">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    
    <script src="script.js" defer></script>
    <title> Homepage 
    </title>

</head>

<body>
    <article>
        <header>

            <nav>
                <div class="navbar">
                    <a href="#chi_siamo"> Chi siamo </a>
                    <a href="#visita_spec">Prenota una visita specialistica!</a>
                    <a href="#novità">Novità</a>
                    <a href="#logout">Torna al login</a>

                </div>
            </nav>

            <h1> Ospedale regionale di Sicilia</h1>
            <div class="overlay"></div>
        </header>

        <div class="riempimento"></div> 
 <section id='flex'><div><h1>Benvenuto <?php echo $nome .'! Clicca qui per la tua cartella clinica.' ?> 
</h1><div id='conten'></div></div></section>
<div class="riempimento"></div> 
<section id='research'>
<?php 
if($ruolo=='Op'){
echo "
       <h1 id='piccolo'> Inserendo il dato richiesto si può visualizzare e modificare la scheda di un paziente</h1>


            <form name='ricerca' id='search'>
               <p class='blue'> Inserisci il codice fiscale </p>
                <input type='text' id= 'modulo_operatore'>
                <input type='submit' value='Cerca'>


            </form> 
             ";}
            ?>




  
  <div class='hidden' id='no_risultati'></div>


<div class='hidden' id='dati_paziente'>
   
  <div class='container_dati'>
      <div >
            <strong>Nominativo: </strong> <p id='nominativo'></p>
      </div>

        
    </div>

  <div class='container_dati2'>

       <div id='modifica'>
        <strong> Reparto: </strong><p id='reparto'></p>
       </div>

           
  </div>
  <div class='container_dati3'>

        <div id='modify'>
          <strong>Terapia da seguire: </strong><p id='terapia'></p>
        
        </div>  

  </div>

  <div class='container_dati4' >
        <div class='hidden' id='modifica_reparto'>
        <form name='reparto' id='rep'>
               <p class='green'> Inserisci il reparto attuale del paziente:  </p>
                <input type='text' id= 'modulo_reparto'>
                <input type='submit' value='Modifica reparto'>


            </form> 
       </div>

        <div class='hidden' id='modifica_terapia'>
        <form name='terapia' id='ter'>
               <p class='green'> Inserisci la terapia da seguire: </p>
                <input type='text' id= 'modulo_terapia'>
                <input type='submit' value='Modifica terapia'>


            </form> 
        </div>  


  </div>
  <input type='hidden' id='cf_nascosto'>
<input type='hidden' id='terapia_nascosta'>
<input type='hidden' id='reparto_nascosto'>
<h3 id='ok_ter' class='hidden blue'>Terapia modificata correttamente!</h3>
<h3 id='ok_rep' class='hidden blue'>Reparto modificato correttamente!</h3>
<h3 id='problema' class='hidden red'>Errore nell'inserimento del dato.</h3>

</div>

</section>








<div class="riempimento"></div> 
        <section class="griglia">

            <div class="riempimento"></div>



            <section class="hidden" id="ScrittaPreferiti">

                <div>
                    <h1> Lista accertamenti medici prenotati con successo.</h1>
                </div>


                <div class="preferiti">
                    <div class="Visita hidden" id="p1">

                        <div class="pref ">
                            <strong>Esame del sangue</strong>
                            <img class="checked" id="c1" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="esamesangue.jpg">
                        </div>


                    </div>
                    <div class="Visita hidden" id="p2">
                        <div class="pref">
                            <strong>Elettrocardiogramma</strong>
                            <img class="checked" id="c2" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="elettro.jpg">
                        </div>
                    </div>

                    <div class="Visita hidden" id="p3">
                        <div class="pref">
                            <strong>Endoscopia</strong>
                            <img class="checked" id="c3" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="endoscopia.jpg"></div>


                    </div>
                </div>

                <div class="preferiti">
                    <div class="Visita hidden" id="p4">

                        <div class="pref ">
                            <strong>Biopsia</strong>
                            <img class="checked" id="c4" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="biopsia.jpg">
                        </div>


                    </div>
                    <div class="Visita hidden" id="p5">
                        <div class="pref ">
                            <strong>Cistografia</strong>
                            <img class="checked" id="c5" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="cistografia.jpg">
                        </div>
                    </div>

                    <div class="Visita hidden" id="p6">
                        <div class="pref">
                            <strong>Calcemia</strong>
                            <img class="checked" id="c6" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="calcemia.jpg"></div>


                    </div>
                </div>

                <div class="preferiti">
                    <div class="Visita hidden" id="p7">

                        <div class="pref ">
                            <strong>Broncoscopia</strong>
                            <img class="checked" id="c7" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="broncoscopia.jpg">
                        </div>


                    </div>
                    <div class="Visita hidden" id="p8">
                        <div class="pref ">
                            <strong>Risonanza Magnetica</strong>
                            <img class="checked" id="c8" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="risonanza.jpg">
                        </div>
                    </div>

                    <div class="Visita hidden" id="p9">
                        <div class="pref">
                            <strong>Tampone</strong>
                            <img class="checked" id="c9" src="spunta.jpg">
                        </div>
                        <div class="immagine">
                            <img src="tampone.jpg"></div>


                    </div>
                </div>

                <div class="blocco"></div>

            </section>
            <a name="visita_spec"></a>
            <div>
                <h1>Lista controlli medici da prenotare cliccando nel quadrato bianco </h1>

            </div>
            <div ><h3 class='hidden' id='visita_non_inserita'>Errore, impossibile prenotare la visita al momento. Riprova più tardi!</h3></div>
            <div class="barra">
                <em> Tutti gli elementi </em>
                <input type="text" id="ricerca">
            </div>



            <div class="flexbox">

                <div class="Visita" id="es">
                    <div class="pref" id="v1">
                        
                        <img class="unchecked" id="u1" src="unchecked.jpg">
                    </div>

                    <div class="immagine" id="img1">
                      
                    </div>
                    <div class="scritta" id="d1">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
                <div class="Visita" id="ec">
                    <div class="pref" id="v2">
                        
                        <img class="unchecked" id="u2" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img2">
                       
                    </div>
                    <div class="scritta" id="d2">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
                <div class="Visita" id="endoscopia">
                    <div class="pref" id="v3">
                        
                        <img class="unchecked" id="u3" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img3">  </div>
                    <div class="scritta" id="d3">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>

            </div>




            <div class="flexbox">
                <div class="Visita" id="biopsia">
                    <div class="pref" id="v4">
                        
                        <img class="unchecked" id="u4" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img4">
                       </div>
                    <div class="scritta" id="d4">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
                <div class="Visita" id="cistografia">
                    <div class="pref" id="v5">
                      
                        <img class="unchecked" id="u5" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img5"> </div>
                    <div class="scritta" id="d5">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
                <div class="Visita" id="calcemia">
                    <div class="pref" id="v6">
                        
                        <img class="unchecked" id="u6" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img6">
                      
                    </div>
                    <div class="scritta" id="d6">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>

            </div>



            <div class="flexbox" id="ultimaFlex">

                <div class="Visita" id="broncoscopia">
                    <div class="pref" id="v7">
                        
                        <img class="unchecked" id="u7" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img7">
                     </div>
                    <div class="scritta" id="d7">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
                <div class="Visita" id="rm">
                    <div class="pref" id="v8">
                        
                        <img class="unchecked" id="u8" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img8">
                       </div>
                    <div class="scritta" id="d8">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
                <div class="Visita" id="tampone">
                    <div class="pref" id="v9">
                        
                        <img class="unchecked" id="u9" src="unchecked.jpg">
                    </div>
                    <div class="immagine" id="img9">
                       </div>
                    <div class="scritta" id="d9">
                        <p class="b">Clicca per più dettagli</p>
                        <p class="hidden c">Clicca per meno dettagli</p>
                    </div>
                </div>
            </div>







        </section>


        <a name="chi_siamo"></a>


        <h1>Chi siamo?</h1>

        <section class="section1">

            <div class="img1">

              
            </div>
            <div class="img2">

               
            </div>

        </section>

        <div class="riempimento" id="spazio"></div>

        <section class="section3">
            <div id='foto3'></div>

            <p class="paragrafo3">
                <div class='blu'>I nostri reparti:</div>
                </br>
                <div class="reparti">
                    <div>Anestesia-Referente:
                        <p> Maria Rossi</p>
                    </div>

                    </br>
                    <div>Cardiologia-Referente :
                        <p> Mario Viola </p>
                    </div>


                    </br>
                    <div>Chirurgia-Referente:
                        <p> Luigi Verdi </p>
                    </div>

                    </br>
                    <div> Day Hospital-Referente:
                        <p> Maria Verdi </p>
                    </div>

                    </br>
                    <div>Neurologia-Referente:
                        <p> Luigi Rossi </p>
                    </div>

                    </br>
                </div>
            </p>
        </section>
     
        <div class="titolo">
            <h3>Salute uguale alimentazione corretta, trova il peso calorico di un alimento</h3>
        </div>
        <div class="form">

<form name='alimenti' action='homepage.php' method='get' id='get_kcal'>
    Inserisci un alimento(in inglese)
    <input type="text" id="alimento" name='alimento'>
    <input type="submit" value="Cerca">


</form>

<?php if(isset($calorie)) echo " <h3> Il peso calorico è:  $calorie kcal </h3>" ?>



</div>

        <div class="titolo">
            <h3>Resta aggiornato sui dati covid di ogni nazione</h3>
        </div>
        <div class="form" id='agg_cov'>

            <form name='aggiornamenti'>
                Inserisci una nazione
                <input type="text" id="nazione">
                <input type="submit" value="Cerca">


            </form>
            <div class="hidden" id="risultati">


            </div>

        </div>
        

        





        <div class="Api">
            <a name="novità"></a>
            <h3>Aggiornamenti Covid19 Italia</h3>
            <div class="Api1" id="CovidNews">

            </div>
            <div class="Api2">

            </div>

        </div>

<input type='hidden' name='nome_nascosto' id='nome_ut' value='<?php echo $nome_utente;?>'>
<input type='hidden' name='cognome_nascosto' id='pass' value='<?php echo $password;?>'>
        <a name="logout"></a>
        <footer id='footer'>
            <p>Sito di un ipotetico plesso ospedaliero creato da Aldo Barca (O46002236) partendo dal progetto di database sullo stesso.</p>
            <a href='logout.php'>Logout</a>
        </footer>
    </article>
</body>




</html>