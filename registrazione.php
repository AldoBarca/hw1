<?php 
$Reg_Effettuata=false;
  $nome_utente_utilizzato=false;
  $nominativo_utilizzato=false;
  $errore=false;




if(isset($_POST['nome_utente_reg'])&&isset($_POST['password_reg'])
&&isset($_POST['nome'])&&isset($_POST['cognome'])&&!empty($_POST['ruolo'])&&!empty($_POST['genere'])
){
$conn =mysqli_connect('localhost','root','','ospedale') or die('Errore:'.mysqli_connect_error());

    $nome=mysqli_real_escape_string($conn,$_POST['nome']);
    $cognome=mysqli_real_escape_string($conn,$_POST['cognome']);
    $nome_utente=mysqli_real_escape_string($conn,$_POST['nome_utente_reg']);
    $password=mysqli_real_escape_string($conn,$_POST['password_reg']);
    $genere=mysqli_real_escape_string($conn,$_POST['genere']);
    $ruolo=mysqli_real_escape_string($conn,$_POST['ruolo']);

    $query1 = "SELECT nome_utente FROM utenti WHERE nome_utente='$nome_utente'";
    
    $res1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($res1) > 0) {
        $nome_utente_utilizzato = TRUE;
    }

    $query2 = "SELECT nome_utente FROM utenti WHERE nome='$nome' and cognome='$cognome'";
    $res2 = mysqli_query($conn, $query2);
    if (mysqli_num_rows($res2) > 0) {
        $nominativo_utilizzato = TRUE;
    }

    if(!$nome_utente_utilizzato && !$nominativo_utilizzato){
  
     /*$query3= 'INSERT INTO utenti(nome,cognome,nome_utente,password,ruolo,genere)
      values("'.$nome.'","'.$cognome.'","'.$nome_utente.'","'.$password.'","'.$ruolo.'","'.$genere.'")"';*/
     $query3="INSERT INTO utenti(nome, cognome, nome_utente, password, ruolo, genere)
       VALUES('$nome', '$cognome', '$nome_utente', '$password', '$ruolo', '$genere')";
      
      $res=mysqli_query($conn, $query3);
      if (!$res) {$errore=TRUE;} else $Reg_Effettuata=true;
     
    }mysqli_close($conn);}



?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="registrazione.css?ts=<?=time()?>&quot“">
    <script src="registrazione.js" defer></script>
    <title>Benvenuto! Crea il tuo account</title>
</head>




<body>
    
    <article>
        <header>
            
            <h1> Registrati qui! </h1>
        </header>
    <div class="p_iniziale">
            

            <section>
                <div class id="regi" class="registrazione">


                    <form name='registrazione' id='registrazione' method='post' action='registrazione.php'>

                        <label>Nome:<input type= 'text' name= 'nome' id='nom'></label>
                        <label> Cognome:<input type='text' name='cognome' id='cogn'></label>
                        <label id='cf'>Codice Fiscale:<input type='text' name='codf' id='codf'></label>
                        <div>
                            <p class="al">Sesso:</p>
                            <label><input type='radio' name='genere' value='m' id='uomo'>Uomo </label>
                            <label><input type='radio' name='genere' value='f' id='donna'>Donna</label>
                        </div>

                        <div>
                            <p class="ar">Ruolo:</p>
                            <label><input type='radio' name='ruolo' value='Op' id='op'>Oper.San</label>
                            <label><input type='radio' name='ruolo' value='Paz' id='paz'> Paziente</label>
                        </div>
                        
                        <label id="nomm">Nome utente: <input type='text' name='nome_utente_reg' id='nome_u'></label>
                        <label> Password:<input type='password' name='password_reg' id='pw'></label>
                       

                        <label for='ok'><p id="acc">Acconsento al trattamento dei dati personali</p> </label>
                        <label><input type='checkbox' name='ok' id='permesso'></label>
                        <label> &nbsp;<input name='registrazione' type='submit' value='Iscriviti'></label>

                        <a href='login.php'  id='to_login'> Torna al login </a>
                    </form>
                  
                </div>
                
                    <h3 class='hidden' id='errore1'>La password e il codice fiscale devono contenere tra i 5 e 16 caratteri. </h3>
                    <h3 class='hidden' id='errore2'>Bisogna compilare tutti i campi! </h3>
                    <h3 class='hidden' id='errore3'>Per creare un account si deve accettare il trattamento dei dati.</h3>
                    <h3 class='hidden' id='errore4'>Nome utente o codice fiscale già presente.</h3>
                    <h3 class='hidden' id='errore5'>Ops qualcosa è andato storto, riprova più tardi!</h3>
                   
                    
                   
            </section>
           
    
      </div>


        <footer>


            <a id='rassicurazione'>I dati inseriti da te sono al sicuro e solo tu puoi accedervi!</a>
        </footer>
    </article>
</body>


</html>



