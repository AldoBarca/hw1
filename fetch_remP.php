<?php 

$input = json_decode(file_get_contents('php://input'), true);
if(isset($input['nome_utente'])&&isset($input['password'])&&isset($input['visita']))
{
   
    
   
    $conn=mysqli_connect('localhost','root','','ospedale');
    $nome_utente=mysqli_real_escape_string($conn,$input['nome_utente']);
    $password=mysqli_real_escape_string($conn,$input['password']);
    $visita=mysqli_real_escape_string($conn,$input['visita']);
    
    $query="DELETE FROM visita WHERE password='$password' AND visita='$visita'";
     
    $res=mysqli_query($conn, $query);
     
    if (!$res) {echo 'errore';} else echo 'ok';
  
    mysqli_close($conn);
}




    
?>
