
<?php 

require_once('include/function.php');
require_once("include/database.php");


function soloGenereConteggi($gen) {

          $genere=0;

        switch ($gen) {

        case "Rock": 
          $genere="2";
        break;

        case 'Dance/elettronica': 
          $genere='4';
        break;

        case 'Pop': 
          $genere='1';
        break;

        case 'Classica/Soundtrack': 
          $genere='22';
        break;

         case "Musica d'autore": 
          $genere='17';
        break;
        }

        return $genere;

}



$sentimento=$_POST['sentimento']; 
$genere=$_POST['genere']; 



$sentimento=numero_sentimento($sentimento);


$genere=soloGenereConteggi($genere);

/*
if($sentimento=="") { while( in_array( ($sentimento = rand(196,214)), array(199, 200,203,205,206,207,208,209,213) ) );
//var_dump($sentimento);
}




if(isset($_POST['genere'])) { 

  while( in_array( ($genere = rand(1,22)), array(3,5,6,7,8,9,10,11,12,13,14,15,16,18,19,20,21) ) );
//var_dump($genere);

}

*/


$sentimentoN= da_num_a_sentimento($sentimento);
$genereN=prendiGenere($genere);



 $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE sentimento='$sentimento' AND genere='$genere' "); 
      

       $canzoni= (Array) $database->fetch_array($canzoni);  

     if($canzoni['COUNT(canzone)']==0) { echo "non ci sono video con la combinazione<br/> <strong>".$sentimentoN."</strong> & <strong>".$genereN.  "</strong>";} 

       else { 
       
       if($canzoni['COUNT(canzone)'] <=10 ) { echo "il conteggio dei valori <strong>".$sentimentoN."</strong> & <strong>".$genereN.  "</strong> ha bisogno di pi&ugrave; video <br>"; } 
       elseif($canzoni['COUNT(canzone)'] <=20) { echo "il conteggio dei valori <strong>".$sentimentoN."/".$genereN.  "</strong>  &egrave; potrebbe andare meglio <br>"; }
        elseif($canzoni['COUNT(canzone)'] <=30) { echo "il conteggio dei valori <strong>".$sentimentoN."/".$genereN.  "</strong>  &egrave; sufficiente <br>"; }

$video=$database->query("SELECT canzone, autore, sentimento, fattore_L from iframe WHERE sentimento='$sentimento' AND genere='$genere' AND idUtente='74' LIMIT 3 ");

echo "<i>tra gli altri video hai inserito in passato: </i><br><br>";

while($row=(Array) $database->fetch_array($video)) {
  
  echo "canzone <strong>".carattere($row['canzone'])."</strong> di <strong>".$row['autore']."</strong><br/>";
  echo "<p style='margin-left:10px;'>indica <strong>".$sentimentoN."</strong> con intensità <strong>".$row['fattore_L']."</strong></p>";
}


}// chiusura num_rows


        ?>
