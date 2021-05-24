<?php


$input = json_decode(file_get_contents('php://input'), true);
if(isset($input['terapia'])&&isset($input['cf'])) {
    
  
    $conn=mysqli_connect('localhost','root','','ospedale');
    $cf=mysqli_real_escape_string($conn,$input['cf']);
    $terapia=mysqli_real_escape_string($conn,$input['terapia']);
    $query="UPDATE utenti SET terapia='$terapia' where codice_fiscale='$cf'";
    
    $res= mysqli_query($conn,$query);
    if (!$res) {echo 'errore';} else echo 'ok';
   
    mysqli_close($conn);
}
if(isset($input['reparto'])&&isset($input['cf'])) {
    
  
    $conn=mysqli_connect('localhost','root','','ospedale');
    $cf=mysqli_real_escape_string($conn,$input['cf']);
    $reparto=mysqli_real_escape_string($conn,$input['reparto']);
    $query="UPDATE utenti SET reparto='$reparto' where codice_fiscale='$cf'";
    $res= mysqli_query($conn,$query);
    if (!$res) {echo 'errore';} else echo 'ok';
   
    mysqli_close($conn);
}
    

    
    

    
?>