<?php 

session_start();

$input = json_decode(file_get_contents('php://input'), true);
if(isset($input['nome_utente'])&& isset($input['password'])) {
    
  
    // Verifichiamo le credenziali tramite query
    $conn=mysqli_connect('localhost','root','','ospedale');
    $nome_utente=mysqli_real_escape_string($conn,$input['nome_utente']);
    $password=mysqli_real_escape_string($conn,$input['password']);
    $query="SELECT * FROM  utenti Where nome_utente='$nome_utente' And password= '$password'";
    $res= mysqli_query($conn,$query);

    if(mysqli_num_rows($res)>0){
    $_SESSION['user']=$input['nome_utente'];
    $query2="SELECT ruolo from utenti where nome_utente='$nome_utente' And password= '$password'";
    $res2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_assoc($res2);
    echo 'OK';
    
    
    /*Ipotetica modalità di reindirizzamento a due diverse homepage in base a se si è operatori_sanitari o pazienti.
     Ho poi deciso di non implementarla a favore di un'unica homepage.

    if($row['ruolo']=='Paz'){
    header('Location: homepage.php');
    exit; }else if($row['ruolo']=='Op') {header('Location:homepage_operatori.php');exit;}*/

    }
    else{
        
         echo 'NOK';


    }
   
    mysqli_close($conn);}

    
?>