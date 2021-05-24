<?php


$input = json_decode(file_get_contents('php://input'), true);
if(isset($input['nome_utente'])&& isset($input['password'])) {
    
  
    
    $conn=mysqli_connect('localhost','root','','ospedale');
    $nome_utente=mysqli_real_escape_string($conn,$input['nome_utente']);
    $password=mysqli_real_escape_string($conn,$input['password']);
    $query="SELECT visita FROM  visita Where nome_utente='$nome_utente' And password= '$password'";
    $res= mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($res)){

        $visite[]=$row;

    }
    $visite[]='a';
    
    if($visite) {echo json_encode($visite);}
    mysqli_close($conn);
   
    

    
    }

    
?>