
<?php 

/* file php dove sono contenuti i dati da inviare poi tramite API REST alla homepage*/
 $files=array(
     array(
   "titolo"=>"Esame del sangue",
   "immagine"=>"esamesangue.jpg",
   "descrizione"=>"Esame generico del sangue per rilevare eventuali anomalie."
     ),
     array("titolo"=>"Elettrocardiogramma",
     "immagine"=>"elettro.jpg",
     "descrizione"=>"Esame per monitorare lo status del cuore e rilevare eventuali anomalie."
    ),
     array("titolo"=>"Endoscopia",
     "immagine"=>"endoscopia.jpg",
     "descrizione"=>"Esame atto per diagnosticare condizioni correlate al sistema digestivo e studiare sintomi dello stesso sistema."
    ),
     array("titolo"=>"Biopsia",
     "immagine"=>"biopsia.jpg",
     "descrizione"=>"Esame che consiste nel prelievo di campioni di tessuto per esaminarli e che spesso si concentra sul reperimento di cellule anomale che possono indicare presenza di infiammazione o di malattia.")
     ,
     array("titolo"=>"Cistografia",
     "immagine"=>"cistografia.jpg",
     "descrizione"=>"Un esame radiologico che permette di studiare la funzionalità di vescica e uretra e localizzarne calcoli e polipi."
    ),
     array("titolo"=>"Calcemia",
     "immagine"=>"calcemia.jpg",
     "descrizione"=>"Esame per monitorare la quantità di calcio nel sangue sia corretta."
    ),
     array("titolo"=>"Broncoscopia",
     "immagine"=>"broncoscopia.jpg",
     "descrizione"=>"Indagine strumentale mirata ad esplorare visivamente bronchi e laringe per verificare che non vi siano arrossamenti o anomalie."
    ),
     array("titolo"=>"Risonanza magnetica",
     "immagine"=>"risonanza.jpg",
     "descrizione"=>"La risonanza magnetica è una tecnica diagnostica che sfrutta i campi magnetici per creare immagini particolareggiate e tridimensionali della anatomia interna di una determinata area del corpo umano."
    ),
     array("titolo"=>"Tampone",
     "immagine"=>"tampone.jpg",
     "descrizione"=>"Tampone ad uso medico che serve a rilevare la presenza di sars covid 19."
     ) ,
     array(
     "immagine"=>"reparto.jpg"
    ),
     array(
     "immagine"=>"fotoosp.jpg",
     "descrizione"=>"Abbiamo vinto la prestigiosa Coppa Del Nonno e siamo stati confermati come migliore ospedale immaginario della Sicilia!"
    ),array(
        "immagine"=>"Settore_medico.jpg",
        "descrizione"=>"Il nostro personale è estremamente preparato, accogliente e pronto a offrirti un servizio di prima qualità!"
       ),array("immagine"=>"cartella.jpg"),
       array("immagine"=>"modifica.jpg")
    );
  echo json_encode($files);


?>