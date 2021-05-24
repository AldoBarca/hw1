<?php
session_start();
session_destroy();

//Andiamo alla pagina di accesso

header('Location: login.php');
exit;

?>