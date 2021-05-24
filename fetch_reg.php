<?php 

session_start();
/* Alle varie pagine php ho sempre inviato i dati tramite l'header application/json di conseguenza i dati inviati sono
immagazzinati dentro $input 

*/
$input = json_decode(file_get_contents('php://input'), true);
if(isset($input['nome_utente'])&& isset($input['password'])&&isset($input['nome'])&&isset($input['cognome'])&&!empty($input['ruolo'])
&&!empty($input['genere'])&&isset($input['codf'])
) {
    
  
    //connessione classica al database e due query con le variabili già con escape fatto
    $conn=mysqli_connect('localhost','root','','ospedale');
    $nome_utente=mysqli_real_escape_string($conn,$input['nome_utente']);
    $nome=mysqli_real_escape_string($conn,$input['nome']);
    $cognome=mysqli_real_escape_string($conn,$input['cognome']);
    $password=mysqli_real_escape_string($conn,$input['password']);
    $genere=mysqli_real_escape_string($conn,$input['genere']);
    $ruolo=mysqli_real_escape_string($conn,$input['ruolo']);
    $codf=mysqli_real_escape_string($conn,$input['codf']);
    //le prime due query verificano se esiste un account con quel nome_utente/codice_fiscale e in caso ritorna un errore al quale in js corrisponde
    // la stampa di un messaggio personalizzato.
    $query1 = "SELECT nome_utente FROM utenti WHERE nome_utente='$nome_utente'";
    $query3="SELECT nome_utente FROM utenti WHERE codice_fiscale='$codf'";
    $res1 = mysqli_query($conn, $query1);
    $res2=mysqli_query($conn, $query3);
    if (mysqli_num_rows($res1) > 0|| mysqli_num_rows($res2)>0) {
        echo 'nome_utente_utilizzato';
        
    }else{
      //l'ultima query effettivamente salva nel database il tutto
     $query2="INSERT INTO utenti(nome, cognome, nome_utente, password, ruolo, genere,codice_fiscale)
       VALUES('$nome', '$cognome', '$nome_utente', '$password', '$ruolo', '$genere','$codf')";
      
      $res=mysqli_query($conn, $query2);
      if (!$res) {echo 'errore';} else echo 'ok';}
   
    mysqli_close($conn);}




    
?>