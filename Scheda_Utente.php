<?php 
session_start();

$conn=mysqli_connect('localhost','root','','ospedale');
$nome_utente=$_SESSION['user'];
$query="SELECT * FROM  utenti Where nome_utente='$nome_utente'";
$res= mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($res);
$nome=$row["nome"];
$cognome=$row["cognome"];
$cf=$row["codice_fiscale"];
$password=$row["password"];
$genere=$row["genere"];
$terapia=$row["terapia"];
$reparto=$row["reparto"];
$posto_auto=$row["posto_auto"];
$ruolo=$row["ruolo"];
if($posto_auto===NULL && $ruolo==='Op') $posto_auto='Nessun posto auto riservato richiesto';
if($ruolo== 'Paz') $ruolo="Paziente";
if($ruolo=='Op') $ruolo="Operatore sanitario";
if($ruolo=='Paziente') $posto_auto="Posto auto disponibile solo per gli Operatori";
if($terapia===NULL)$terapia= 'Nessuna terapia al momento';
if($reparto===NULL)$reparto= 'Non in degenza attualmente'


?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="Scheda_utente.css?ts=<?=time()?>&quot“">
    <script src="login.js" defer></script>
    <title>Scheda <?php echo $ruolo .' '. $nome .' '. $cognome ?></title>
</head>


<body>

    <article>
        <header>
        <h1> Dati personali </h1>  
        </header>

<section>
<div class='flex'id='nom'>
<div class='riga'><strong>Nome:  </strong><?php echo " <p> &nbsp;  $nome </p>" ?></div>
<div class='riga'><strong>Cognome:</strong> <?php echo " <p>  &nbsp; $cognome </p>" ?></div>
</div>

<div class='flex' id='cf'>
<div  class='riga'><strong>Codice Fiscale: </strong><?php echo " <p> &nbsp;  $cf </p>"?></div>
</div>

<div class='flex' id='f3'>
<div  class='riga'><strong>Genere: </strong><?php echo " <p> &nbsp;  $genere </p>"?></div>
<div  class='riga'><strong>Ruolo:</strong> <?php  echo " <p>  &nbsp; $ruolo </p>"?> </div>
</div>


<div class='flex' id='f4'>

<div  class='riga'><strong>Terapia: </strong><?php echo " <p> &nbsp;  $terapia </p>"?></div>
<div  class='riga'><strong>Reparto:</strong> <?php  echo " <p>  &nbsp; $reparto </p>"?> </div>

</div>

 <div class='flex' id='posto'>

<div  class='riga'><strong>Posto auto: </strong> <?php echo "<p> &nbsp;  $posto_auto </p>"?></div>


</div>




<div class='flex'>
<div id='stile'><a href='homepage.php' id='home'>Torna alla pagina principale</a></div>
</div>

</section>



    </article>
</body>
</html>

