<?php



require_once('include/function.php');
require_once("include/database.php");
require_once("vendor/autoload.php");


use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookSDKException;


FacebookSession::setDefaultApplication('1557119901182712', 'dc6e1a7a07e385bdb675d0766f5ca9f6');




$helper = new FacebookCanvasLoginHelper();
$session =$helper->getSession();


/*
function condividi() { 

if($session === "") {
    throw new FacebookSDKException(
        'Session not active, could not load state.'
    );
}

 

 $user_profile= new FacebookRequest(  $session, 'POST', '/me/feed', array(
        'link' => 'http://apps.facebook.com/storialab',
        'message' => 'Emotional Social' ));
    $user_profile = $user_profile->execute();
    $user_profile  = $user_profile->getGraphObject(); 
   

    echo "Posted with id: " .$user_profile->getProperty('name');

} */

/* if($session) {

  try {

    $user_profile= new FacebookRequest( $session, 'GET', '/me' );
    $user_profile = $user_profile->execute();
    $user_profile  = $user_profile->getGraphObject(GraphUser::className()); 
   
    echo "Name: " .$user_profile->getName();

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

} */






/*

echo "<pre>";
var_dump($idUtente);
var_dump($nome);
echo "</pre>";


*/

?>
<!DOCTYPE html>

<html>

<head>

<title>Profilo La(b)Storia principale</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" >



<script type="text/javascript" src="js/jquery.js" /></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://storialab.ssl.altervista.org/css/introjs.css" />
<link rel="stylesheet" href="https://storialab.ssl.altervista.org/css/rangeslider.css">
<link rel="stylesheet" type="text/css" href="https://storialab.ssl.altervista.org/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://storialab.ssl.altervista.org/css/demo.css" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/css/jquery.ui.autocomplete.min.css" />
<link rel="stylesheet" href="https://storialab.ssl.altervista.org/css/autocomplete.css" />
<script src="https://storialab.ssl.altervista.org/js/modernizr.custom.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>



</head>

<body>

<div class="container" >

<div  style="float:right;clear:both;" class="row col-lg-4">
    <form  action="http://www.storialab.it/insert_if/inser_cit.php"  target="_blank" method="post">
    <button class="btn btn-4 btn-4b icon-arrow-left"   target="_blank" ><span style="text-align:right !important;">Inserisci una nuova citazione</span></button>
    </form>

    <form action="http://www.storialab.it/insert_if/index.php"  target="_blank" method="post">
    <? echo"<input type='hidden' value='$nome' name='nome' />"; ?>
    <button  class="btn btn-4 btn-4b icon-arrow-left"  target="_blank">Inserisci un nuovo video</button><br/><br/>
    </form>

   <!--
    <form name="logout" action="http://www.storialab.it/index.php" method="post"> 
      <input type="hidden" name="logout" value="esci"/>
      <input  class="btn btn-4 btn-4b icon-arrow-left" type="submit" value="ESCI" /> 
    </form> -->
</div>
<div class="row" style="border:3px solid orange;">
<p>Tutti noi abbiamo visto un film. I protagonisti del grande schermo
ci fanno emozionare proprio perch&egrave; riassumono in chiave cinematografica le stesse storie
che proviamo noi stessi, giorno dopo giorno. Gente che si lascia, gente che cerca nelle storie
degli altri il senso della propria esistenza.</p>
<p>Magari sar&agrave; un concetto esagerato, per&ograve; sono proprio queste piccole sensazioni a dare
la scossa elettrica di cui abbiamo bisogno, per far s&igrave; che noi stessi immaginiamo le nostre storie
come se fossero piccoli film in costante evoluzione.</p>
<p>Nei punti chiave delle nostre storie vi &egrave; bisogno di stare fermi a pensare, per guardarci intorno 
fissando tutto quello che ci circonda, e soprattutto stare fermi ad ascoltare.
Come nei film, quei momenti hanno bisogno di una canzone, una melodia che consenta di riassumere
tutti i punti che ci sfuggono e che ci consentono di avere un quadro della nostra situazione.</p>
<p>Per questo motivo &egrave; nato <a href='http://www.storialab.it' target="_blank"><strong>StoriaLab</strong></a>, esperimento social che consente al visitatore di trovare la canzone
adatta per un particolare sentimento che sta provando in quel particolare momento chiave della sua
storia.</p>
<p>Riflessione, malinconia, felicit&agrave;, tristezza, curiosit&agrave;: come in un film, l'utente ritrover&agrave; una musica casuale in base al 
genere e al sentimento espresso.</p>
<p>Per ulteriori info, visitare il sito ufficiale dove la piattaforma social sta prendendo forma, e 
magari dare un piccolo contributo per farla evolvere regalando nuove canzoni, nuove citazioni.</p>
<p>Nel frattempo benvenuto in <strong>StoriaLab</strong>, app facebook in versione beta.</p>
</div>
<div class="row col-lg-8 form_wrapper">
<label style="text-align:center; font-size:50px;"><span style="color:white; font-size:20px;">Ciao</span>  <?php ?></label>



<form enctype="multipart/form-data" action="https://storialab.ssl.altervista.org/processing.php" method="post">

<div id="step1">
<section>
<label>Inserisci il tuo umore</label>
<select name="umore">
    <option value="riflessione">riflessione</option>
    <option value="felicit&agrave;">felicit&agrave;</option>
    <option value="malinconia" >malinconia</option>
    <option value="rabbia" >rabbia</option>
    <option value="tristezza" >tristezza</option>
    <option value="riscatto">riscatto</option>
    <option value="amore" >amore</option>
    <option value="curiosit&agrave;">curiosit&agrave;/divertimento</option>
    <option value="confusione">confusione</option>
    <option value="speranza">speranza</option>
</select>
</section>
</div>
<br/><br/><br/>
<div id="step2">
<label>Scelte musicali (solo una)</label><br/>


<ul class="ac-custom ac-radio ac-fill" > 


<li><input type="radio" name="scelte[]" value="rock" ><label>Rock</label></li>
<li><input type="radio" name="scelte[]" value="dance" ><label>Dance/elettronica</label></li>
<li><input type="radio" name="scelte[]" value="pop" ><label>Pop</label></li>
<li><input type="radio" name="scelte[]" value="classica" ><label>Classica/Soundtrack</label></li>
<li><input type="radio" name="scelte[]" value="autore" ><label>Musica d'autore</label></li>

</ul>
<input type="submit" style="text-align:center;" class="btn btn-4 btn-4b icon-arrow-left" name="submit" value="invia" />

</div>
</div>
<br/>
<br/>
<br/>
<label >Mi sento fortunato (uscir&agrave; un video completamente casuale)<input type="checkbox" name="fortunato" ></label>
</form> 
<div style="float:right; clear:both; display:block; width:600px">
<section id="chart"></section>
</div>

<p>Attualmente sono presenti: 
<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>";   ?> canzoni</p>


<div class="row">
<div style="display:block; float:left; width:400px;">
<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  genere='1' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>";   ?> genere POP</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  genere='2' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>";   ?> genere ROCK</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  genere='4' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>";   ?> genere DANCE/ELETTRONICA</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  genere='22' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>";   ?> genere CLASSICA/SOUNDTRACK</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  genere='17' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>";   ?> genere AUTORE</p>
</div>
<div style="display:block; float:right;width:400px;">
<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='196' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento RIFLESSIONE</p>

       <?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='197' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento FELICIT&Agrave;</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='198' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento MALINCONIA</p>

       <?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='201' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento RABBIA</p>

       <?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='202' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento TRISTEZZA</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='204' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento RISCATTO</p>

       <?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='210' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento AMORE</p>

       <?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='211' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento CURIOSIT&Agrave;</p>

<?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='212' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento SPERANZA</p>

       <?php  $canzoni=  $database->query("SELECT COUNT(canzone) FROM iframe WHERE  sentimento='214' "); 
       $canzoni= (Array) $database->fetch_array($canzoni);  echo "<strong>".$canzoni['COUNT(canzone)']."</strong>"; ?> sentimento CONFUSIONE</p>
</div>

</div> <!--row-->

<div class="row">


<div style="width:900px; margin:0 auto;">
<select id="sentimento">
    <option>riflessione</option>
    <option>felicit&agrave;</option>
    <option>malinconia</option>
    <option>rabbia</option>
    <option>tristezza</option>
    <option>riscatto</option>
    <option>amore</option>
    <option>curiosit&agrave;</option>
    <option>confusione</option>
    <option>speranza</option>
</select>
<select id="genere" >
   <option>Rock</option>
   <option>Dance/elettronica</option>
  <option>Pop</option>
  <option>Classica/Soundtrack</option>
  <option>Musica d'autore</option>
</select>
<button onclick="conteggi( $('#sentimento').val(), $('#genere').val() );">Controlla il database</button>
</div>
<div id="conteggi" style="border:2px solid orange;"></div> <!-- id='conteggi' -->
</div>
<script type="text/javascript">

//$( document ).ready(function() {

var sentimento= $('#sentimento').val();
var genere=$('#genere').val();

console.log(sentimento);
   function conteggi(sentimento,genere){
                
  $.post('https://storialab.ssl.altervista.org/conteggi.php', {sentimento:sentimento, genere:genere}, function(data){
    $("#conteggi").html(data);
  });

}
//});

</script>


<div class="row col-lg-12">
<br/><br/><br/><br/><br/><br/>
<br/>

<!-- <div id="step3">
   <div id="js-example-change-value">
        <label >Inserisci l'intensit&agrave; della tua emozione, senza pensarci: lascia agire il subconscio</label>
        
         
          <input type="range" name="fattore" min="1" max="5000" data-rangeslider /> 
          <div style="display:block !important;">
          <div style=" float:right; "><label>MAX</label></div>
          <div><label>MIN</label></div>
          
          </div>

          <div style="display:none !important; "> <output></output> </div>

       



    
    </div>



</div> -->

<br/>








<br/><br/><br/><br/><br/><br/>

<br/><br/><br/><br/><br/><br/>
<?php 

echo "<div class='row col-lg-5'>";
//videoAssegnati($nome);
echo "</div>";


echo "<div class='row col-lg-4 col-xs-offset-1'>";
//echo "Ecco gli ultimi video che hai visualizzato:<br/><br/>";

//ultimiVideo(); 
echo "</div>"; 




?>
<br/>
<br/>
<br/>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.min.js"></script>
<script src="https://storialab.ssl.altervista.org/js/scriptD3.js"></script>

<script src="https://storialab.ssl.altervista.org/js/svgcheckbx.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js" ></script>
    <script src="https://storialab.ssl.altervista.org/js/rangeslider.min.js"></script>
    <script type="text/javascript" src="js/intro.js" /></script>
    <script type="text/javascript">
      function startIntro(){
        var intro = introJs();
          intro.setOptions({
            steps: [
              {
                element: '#step1',
                intro: "<p style='color:black;'> Inserisci il tuo umore, il sentimento che stai provando in questo momento.</p>"

              },
              {
                element: '#step2',
                intro: "<p style='color:black;'>La scelta musicale &egrave; importante per selezionare il video che evidenzier&agrave; il tuo stato d'animo.</p>",
                
              }
             /* {
                element: '#step3',
                intro: "<p style='color:black;'>scegli il tuo fattoreL senza pensarci: lascia agire il subconscio.</p>",
                
              } */
            
            ]
          });

          intro.start();
      }
    </script>
    <script>
        $(function() {
        
         var $document   = $(document),
                selector    = '[data-rangeslider]',
                $input      = $(selector);

            $document.on('change', selector, function(e) {
                var value = e.target.value,
                    output = e.target.parentNode.getElementsByTagName('output')[0];
                output.innerHTML = value;
            });

            $input.rangeslider({

                // Deactivate the feature detection
                polyfill: false,

                // Callback function
                onInit: function() {},

                // Callback function
                onSlide: function(position, value) {},

                // Callback function
                onSlideEnd: function(position) {}
            });
        
       	  // Example functionality to demonstrate programmatic value changes
            $document.on('click', '#js-example-change-value button', function(e) {
                var $inputRange = $('input[type="range"]', e.target.parentNode),
                    value = $('input[type="number"]', e.target.parentNode)[0].value;

                $inputRange.val(value).change();
            });

            
            

            

        }); 
    </script>







</div>
</div> <!--container -->

</body>



</html>