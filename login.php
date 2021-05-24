<?php 
$errore=false;
session_start();
$ok=false;



if(isset($_SESSION['user']))
{
    header('Location: homepage.php');
    exit; 


}
if(isset($_GET['value'])){
    $ok=true;
}

    
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css?ts=<?=time()?>&quot“">
    <script src="login.js" defer></script>
    <title>Benvenuto! Inserisci i tuoi dati</title>
</head>




<body>
    
    <article>
        <header>
            <h1 > Inserisci i tuoi dati per accedere!</h1>
            
        </header>
    <div class="p_iniziale">
            <section>
                <div class="login" id="log">
                        
                        <form name='form_login'  id='form_login' method='post' action='login.php'>
                            <label>Nome utente: <input type= 'text' name= 'nome_utente' id='nome_utente'></label>
                            <label > <div class='a'>Password: </div><input type='password' name='password' id='password'></label>
                            <label > &nbsp;<input id='b' class='submit' value='Accedi' name='login' type='submit'></label>
                            
                        </form>
                            <h3 class='hidden' id='errore_login'>Inserisci dei dati. </h3>
                            <h3 class='hidden' id="cred_sbagliate"> Credenziali sbagliate. </h3>
                            <?php  if($ok)  echo "<h3 id='successo'>Registrazione effettuata con successo!</h3>";
                            $ok=false;?>
                            <div id='stile'><a href='registrazione.php' id='reg'>Non hai un account? Registrati ora!</a></div>

                            
                   
                </div>
            </section>

            
           
    
      </div>


        <footer>


            <a id='sponsor'>Accedi per utilizzare moltissime funzionalità!</a>
        </footer>
    </article>
</body>


</html>
