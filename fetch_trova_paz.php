<?php
$input = json_decode(file_get_contents('php://input'), true);
if(isset($input['cf']))
{

    
    $conn=mysqli_connect('localhost','root','','ospedale');
    $cf=mysqli_real_escape_string($conn,$input['cf']);
    $query="SELECT nome,cognome,genere,terapia,reparto FROM  utenti Where codice_fiscale='$cf'";
    $res= mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($res)){
    $ris[]=$row;}


    $ris[]='nessun paziente trovato';
if($ris){echo json_encode($ris);}
    mysqli_close($conn);


}




?>