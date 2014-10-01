
<?php


error_reporting(E_ALL^ E_WARNING); 
error_reporting(E_ALL^ E_NOTICE); 


require_once('include/function.php');
require_once("include/database.php");
require_once("vendor/autoload.php");









function cambiaValore_i($val, $id) {

	$valorei=$val;
$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
	echo 'Errore durante la connessione al server MySQL';
	exit();
}

$sql= mysqli_query($conn, "UPDATE iframe SET valore_i='$valorei' WHERE idiFrame='$id'");

if(!$sql) 
	{ die('problemi...' .mysqli_error($conn));}


}

function immagine($imm) {
	header('Content-type:jpeg ');


}











function inserisciUltime($id, $cit) {

	$nome=$_SESSION['nome'];

			$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

			if (mysqli_connect_errno()) {
				echo 'Errore durante la connessione al server MySQL';
			exit();
		}

			$sql= mysqli_query($conn, "UPDATE utente SET ultimi_id='{$id}',ultime_cit='{$cit}' WHERE Nome='$nome'" );

			if(!$sql) {
 				die("la richiesta non &egrave; avvenuta..." .mysqli_error($conn));
		}





		} 








?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<script type="text/javascript" src="js/jquery.js" /></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/rangeslider.css">



	<title></title>
</head>
<body>
<script type="text/javascript">
  // You probably don't want to use globals, but this is just example code
  var fbAppId = '1557119901182712';
  var objectToLike = 'http://storialab.it/index.php';

  

  /*
   * This is boilerplate code that is used to initialize
   * the Facebook JS SDK.  You would normally set your
   * App ID in this code.
   */

  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : fbAppId, // App ID
      status     : true,    // check login status
      cookie     : true,    // enable cookies to allow the
                            // server to access the session
      xfbml      : true,     // parse page for xfbml or html5
                            // social plugins like login button below
      version        : 'v2.0',  // Specify an API version
    });

    // Put additional init code here
  };

  // Load the SDK Asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  /*
   * This function makes a call to the og.likes API.  The
   * object argument is the object you like.  Other types
   * of APIs may take other arguments. (i.e. the book.reads
   * API takes a book= argument.)
   *
   * Because it's a sample, it also sets the privacy
   * parameter so that it will create a story that only you
   * can see.  Remove the privacy parameter and the story
   * will be visible to whatever the default privacy was when
   * you added the app.
   *
   * Also note that you can view any story with the id, as
   * demonstrated with the code below.
   *
   * APIs used in postLike():
   * Call the Graph API from JS:
   *   https://developers.facebook.com/docs/reference/javascript/FB.api
   * The Open Graph og.likes API:
   *   https://developers.facebook.com/docs/reference/opengraph/action-type/og.likes
   * Privacy argument:
   *   https://developers.facebook.com/docs/reference/api/privacy-parameter
   */

  function postLike() {
    FB.api(
       'https://graph.facebook.com/me/og.likes',
       'post',
       { object: objectToLike,
         privacy: {'value': 'SELF'} },
       function(response) {
         if (!response) {
           alert('Error occurred.');
         } else if (response.error) {
           document.getElementById('result').innerHTML =
             'Error: ' + response.error.message;
         } else {
           document.getElementById('result').innerHTML =
             '<a href=\"https://www.facebook.com/me/activity/' +
             response.id + '\">' +
             'Story created.  ID is ' +
             response.id + '</a>';
         }
       }
    );
  }
</script>

<!--
  Login Button

  https://developers.facebook.com/docs/reference/plugins/login

  This example needs the 'publish_actions' permission in
  order to publish an action.  The scope parameter below
  is what prompts the user for that permission.
-->


<!--<div class="svg-wrap">
			<svg width="64" height="64" viewBox="0 0 64 64">
				<path id="arrow-left-1" d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z" />
			</svg>
			<svg width="64" height="64" viewBox="0 0 64 64">
				<path id="arrow-right-1" d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z" />
			</svg>
			
		</div> -->
<div class="row col-lg-12 ">
<div id="welcome"></div>


<?php


    
    
/* function controllo($um) {

	$umore=$um;
	
	$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');
	$query="SELECT sentimento FROM iframe";
	$controllo= mysqli_query($conn, $query);

	while($row= mysqli_fetch_assoc($controllo)) {
		
			if ($umore != $row['sentimento']) {
		
				echo "non è stata ritrovata nessuna corrispondenza";
		
		}
		
	
		
		}
		
		
	
		
		

} */

/*
    
$i=$_POST['i']; //interesse per il video

$im=$_POST['im']; //impatto nella sua vita

$f=$_POST['f']; //fantasia stuzzicata
$c=$_POST['c']; //consiglio degli altri
$s= $_POST['fattore']; //fantasia generale

$cm=$_POST['cm']; //consiglio dei più antipatici
*/

//$s= $_POST['fattore'];



//if($s == 0) { }

$s= rand(1, 5000); 
$i= rand(1, $s);
$im= rand(1, 5000); 
$f= rand(1, $im);
if($f <=300) { $f=rand(3000,5000);}
$c= rand(1, $i);
if($c <=100) { $f=rand(1000,4000);}
$cm= rand(1, $c);


/*
echo "<pre>";
echo "fattore".$s. "<br/>";
echo "fattore-i".$i. "<br/>";
echo "fattore-im".$im. "<br/>";
echo "fattore-f".$f. "<br/>";
echo "fattore-c".$c. "<br/>";
echo "fattore-cm".$cm. "<br/>";
echo "</pre>";
*/


$fattoreU=0; //FATTORE U 

/*
if(IsChecked('check','fattore_random')) {  $s= rand(1, 5000); } 

if(IsChecked('valori','valore_i_random')) {  $i= rand(1, 5000); }
if(IsChecked('valori','valore_im_random')) {  $im= rand(1, 5000); }
if(IsChecked('valori','valore_f_random')) {  $f= rand(1, 5000); }
if(IsChecked('valori','valore_c_random')) {  $c= rand(1, 5000); }
if(IsChecked('valori','valore_cm_random')) {  $cm= rand(1, 5000); }

*/


if ($s==0) {
	$s=rand(100,400);
	}

if ($cm==0) {
	$cm=rand(100,400);
	}


$fattoreU= round((100*($i+$f) / $s+$c) + (($im+ $c) / $cm));

//echo "fattore-u".var_dump($fattoreU);

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
	echo 'Errore durante la connessione al server MySQL';
	exit();
}






 

if(isset($_POST['scelte'])) {
        $musica = implode($_POST['scelte'],', '); 
 }   else {
        $musica = 'Nessun valore selezionato'; } 
        

$umore= $_POST['umore'];
//var_dump($musica);



$umore= numero_sentimento($umore);
var_dump($umore);




$nome=$_SESSION['nome'];

$idUtente= prendiID($nome);
//var_dump($idUtente);

//inserisciSentimento($umore, $idUtente);

$musica=numero_genere($musica);


		

		

 
        
		$richiesta= " SELECT * ";
		$richiesta .= "FROM iframe JOIN citazioni ";
		
		$richiesta .= "WHERE iframe.sentimento= '$umore' "; 
		
		
		//$richiesta .= "AND ( fattore_L <= " .$fattoreU. " ) ";
		$richiesta .= "AND genere= '$musica' ";
		//$richiesta .= "AND citazioni.sentimento =  '$umore' ";
		$richiesta .= "ORDER BY RAND()";
		$richiesta .= "LIMIT 1"; 
		





//$richiesta .= "AND ( fattore_L <= " .$fattoreU. " ) ";

	
	$risultato= mysqli_query($conn, $richiesta);
	
	if(!$risultato) {
 		die("la richiesta non &egrave; avvenuta..." .mysqli_error($conn));
	}



?> <a href="index.php"><button class="btn btn-4 btn-4b icon-arrow-left">vai indietro</button></a> <?

	
	if($fattoreU <= rand(1, 5000)) {

		

	
	
		while ($row= mysqli_fetch_assoc($risultato)) {
		
		?>



				

				<div
  class="fb-login-button"
  data-show-faces="true"
  data-width="200"
  data-max-rows="1"
  data-scope="publish_actions">
</div>
<!--<input
  type="button"
  value="Create a story with an og.likes action"
  onclick="postLike();">
</div> -->


<div class="fb-share-button" data-href="https://www.storialab.it/processing.php" data-width="200px"></div>


<div id="result"></div>

				<?
		
		//if (!cont_iframe(row['idiFrame']) {
		
			if ($row['fattore_L']<= rand(1, 5000)) {
				
				$_SESSION['id']=$row['idiFrame'];
				$_SESSION['citazione']=$row['idCitazione'];
				$id=$_SESSION['id'];
				$cit=$_SESSION['citazione'];
			
				//$idUtente=$row['idUtente'];
				$numSentimento=$row['sentimento'];
			
				$sentimento=carattere(da_num_a_sentimento($row['sentimento']));
				echo "<div style='text-align:right !important;'><h1>".$sentimento."</h1></div>";
				//var_dump($row['sentimento']);
				
				//var_dump($sentimento);

			inserisciUltime($idUtente, $cit);
				//echo "<p>2</p>";
				//prendiImmagine($id, $numSentimento);
				echo "<section>";
				echo "<div class='titolo' >". $row['canzone'] ."<br/></div>";
				
				echo  "<iframe width='420' height='315' src='//www.youtube.com/embed/".$row['collegamento']."?autoplay=1'  frameborder='0' allowfullscreen></iframe><br/>";
				
				echo "<label>FattoreL:</label><p style='font-size:30px;'>" . $row['fattore_L'] ."</p><br/>";
				echo "<p style='font-size:30px;'> secondo: <strong>" .prendiNome($row['idUtente'])." ".prendiCognome($row['idUtente']).  "</strong></p><br/>";

				echo  $row['citazione'] ."<br/>";
				echo  $row['autore'] ."<br/><br/><br/><br/>";
				echo "<form action='insert_if/insert.php' method='post'>";
				$id=$row['idiFrame'];
				//var_dump($id);
				echo "<div id='js-example-change-value'>";
				echo"<label>Interesse dimostrato per il video</label>";
				echo "<input type='range' id='valore_i' value=".$row['valore_i']." min='1' max='5000' name='valore_i' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Impatto dell'emozione provata nella vita quotidiana </label>";
				echo "<input type='range' id='valore_im' value=".$row['valore_im']." min='1' max='5000' name='valore_im' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Influenza degli altri subita in questo periodo</label>";
				echo "<input type='range' id='valore_c' value=".$row['valore_c']." min='1' max='5000' name='valore_c' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Solitudine provata in questo periodo</label>";
				echo "<input type='range' id='valore_cm' value=".$row['valore_cm']." min='1' max='5000' name='valore_cm' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Quanto lavori di fantasia con questa canzone?</label>";
				echo "<input type='range' id='valore_f' value=".$row['valore_f']." min='1' max='5000' name='valore_f' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<input type='hidden' name='id' value='$id' />";
				echo"<input type='hidden' name='nome' value='$nome' />";
				//echo "<input type='submit' id='cambia' value='cambia i valori' name='cambia'>";
				echo "<div id='valori_cambiati'></div>";	
				echo "</form>";
				echo "</section>";
				

				

				$data = array($row['valore_i'], $row['valore_im'], $row['valore_c'], $row['valore_cm'], $row['valore_f'] );
    
    		//prendiSentimento();

    		  		

    		//altroUtente();
   	     		
    		
    		//echo "<pre>";
    		//var_dump(json_encode($data));     
			//echo "</pre>";	
				
				?>
               
                
                 <br/><br/><br/><br/><br/><br/>


<br/><br/><br/>
<?php
				echo"<a href='index.php'><button class='btn btn-4 btn-4b icon-arrow-left'>vai indietro</button></a>";

			?>

			<!--<section class="color-4">
			<form action="prima_scena.php" method="post" >
			<label>Inserisci un contesto in cui ti stai ritrovando...</label>
			<input type="text" name="umore" placeholder="inserisci la situazione" />
			<input type="submit" class="btn btn-4 btn-4a icon-arrow-right"  name="submit" value="vai alla prima scena" />
			</form>
			<br/>
			<form action="altra_combo.php" method="post" >
			<label>completa questa scena</label>
			<input type="text" name="umore" placeholder="inserisci la situazione" />
			<input type="submit" name="submit" value="completa attuale scena" />
			</form>
			<br/>
			<form action="random.php" method="post" >
			<label>vai nella storia di un altro utente</label>
			<input type="text" name="umore" placeholder="inserisci la situazione" />
			<input type="submit" name="submit" value="colpo di scena" />
			</form>
			<a href="principale.php">vai indietro</a>
			</section> -->
				
			
			
			
			
			<?php
			
			/* echo "<p>Come sarebbe stato scialbo essere felici! (Marguerite Yourcenar)</p>"; */
		
	} 	else {	

				$sentimento=carattere(da_num_a_sentimento($row['sentimento']));
				echo "<div style='text-align:right !important;'><h1>".$sentimento."</h1></div>";

				echo "<section>";


				
				$_SESSION['id']=$row['idiFrame'];
				$_SESSION['citazione']=$row['idCitazione'];
				$id=$_SESSION['id'];
				$cit=$_SESSION['citazione'];
				
			

			inserisciUltime($id, $cit);

				//echo "<div style='text-align:right !important;'><h1>".da_num_a_sentimento($row['sentimento'])."</h1></div>";
				echo "<section>";
				echo "<div class='titolo' >". $row['canzone'] ."<br/></div>";
				echo  "<iframe width='420' height='315' src='//www.youtube.com/embed/".$row['collegamento']."?autoplay=1'  frameborder='0' allowfullscreen></iframe><br/>";
				echo $fattoreU;
				echo "<label>FattoreL:</label><p style='font-size:30px;'>" . $row['fattore_L'] ."</p><br/>";
				echo "<p style='font-size:30px;'> secondo: <strong>" .prendiNome($row['idUtente'])." ".prendiCognome($row['idUtente']).  "</strong></p><br/>";

				echo  $row['citazione'] ."<br/>";
				echo  $row['autore'] ."<br/>";
				echo "</div>";
				echo "<form action='insert_if/insert.php' method='post'>";
				$id=$row['idiFrame'];
				
				//var_dump($id);
				echo "<div id='js-example-change-value'>";
				echo"<label>Interesse dimostrato per il video</label>";
				echo "<input type='range' id='valore_i' value=".$row['valore_i']." min='1' max='5000' name='valore_i' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Impatto dell'emozione provata nella vita quotidiana </label>";
				echo "<input type='range' id='valore_im' value=".$row['valore_im']." min='1' max='5000' name='valore_im' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Influenza degli altri subita in questo periodo</label>";
				echo "<input type='range' id='valore_c' value=".$row['valore_c']." min='1' max='5000' name='valore_c' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Solitudine provata in questo periodo</label>";
				echo "<input type='range' id='valore_cm' value=".$row['valore_cm']." min='1' max='5000' name='valore_cm' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo"<label>Quanto lavori di fantasia con questa canzone?</label>";
				echo "<input type='range' id='valore_f' value=".$row['valore_f']." min='1' max='5000' name='valore_f' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo "<input type='hidden' name='id' value='$id' />";
				echo"<input type='hidden' name='nome' value='$nome' />";
				//echo "<input type='submit'  id='cambia' value='cambia i valori'  name='cambia' />";
				echo "<div id='valori_cambiati'></div>";
				echo "</form>";
				echo "</section>"; 

			

				//altroUtente();

				$data = array($row['valore_i'], $row['valore_im'], $row['valore_c'], $row['valore_cm'], $row['valore_f'] );
    		
    		/*
    		echo "<pre>";
    		prendiSentimento();
   	     	echo "</pre>";	
    			*/


    		
    		//var_dump(json_encode($data));     
				

				?>
                <br/><br/><br/><br/><br/><br/>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- primo_ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7543123859390493"
     data-ad-slot="6155357669"></ins>

<br/><br/><br/>
			<a href="index.php"><button class="btn btn-4 btn-4b icon-arrow-left">vai indietro</button></a>
		
			
			
			
			<?php
		
		
		
			
			/*echo "<p>È certamente vero che noi dobbiamo pensare alla felicità degli altri; 
			ma non si dice mai abbastanza che il meglio 
			che possiamo fare per quelli che amiamo è ancora l'essere felici. (Émile-Auguste Chartier)</p>"; */
			
		
		}
		
		
		
	//}
		
	}
	
	} //-> fine $fattoreU
	
	else {
	
	echo "<div class='row col-lg-12 principale'>";
	

	/*echo "ecco un video a caso presente nel database, che gli altri utenti hanno inserito:";
	
		$richiesta = "SELECT * ";
		$richiesta .= "FROM iframe, citazioni ";
		$richiesta .= "ORDER BY RAND() ";
		$richiesta .= " LIMIT 1";
	
		$risultato= mysqli_query($conn, $richiesta);
	
		if(!$risultato) {
 		die("la richiesta non &egrave; avvenuta..." .mysqli_error($conn));
	} */
	?>

<!--
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
 				 var js, fjs = d.getElementsByTagName(s)[0];
  				if (d.getElementById(id)) return;
  				js = d.createElement(s); js.id = id;
 				 js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&appId=1557119901182712&version=v2.0";
 				 fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-share-button" data-type="button_count" data-href="http://www.storialab.it/processing.php"></div>

-->

<div
  class="fb-login-button"
  data-show-faces="true"
  data-width="200"
  data-max-rows="1"
  data-scope="publish_actions">
</div>
<!--<input
  type="button"
  value="Create a story with an og.likes action"
  onclick="postLike();">
</div> -->

<div id="result"></div>

				<?
	
	
	while ($row= mysqli_fetch_assoc($risultato)) {
		
		
				
				$_SESSION['id']=$row['idiFrame'];
				$_SESSION['citazione']=$row['idCitazione'];
				$id=$_SESSION['id'];
				$cit=$_SESSION['citazione'];
				
				

				inserisciUltime($id, $cit);

			
		
				$sentimento=carattere(da_num_a_sentimento($row['sentimento']));
				$canzone=$row['canzone'];
				echo "<div style='text-align:right !important;'><h1>".$sentimento."</h1></div>";
				echo "<section>";
				echo "<div  style='display:block; width:600px; margin-left:auto; margin-right:auto; text-align:center;'>";
				echo "<div class='effect-layla'>";

				echo "<div class='titolo' ><h2>". $row['canzone'] ."</h2><br/></div>";
				
				echo  "<iframe width='420' height='315' src='//www.youtube.com/embed/".$row['collegamento']."?autoplay=1'  frameborder='0' allowfullscreen></iframe><br/>";
				$id=$row['idiFrame'];
				//var_dump($id);

				echo "<p style='font-size:30px;'> FattoreL: " . $row['fattore_L'] ."</p><br/>";
				
				echo "<p style='font-size:30px;'> secondo: <strong>" .prendiNome($row['idUtente'])." ".prendiCognome($row['idUtente']).  "</strong></p><br/>";
				echo  "<p>".$row['citazione'] ."</p><br/>";
				echo  "<p>".$row['autore'] ."</p><br/><br/><br/><br/>";
				
				echo "</div>";




				echo "<form action='insert_if/insert.php' method='post'>";
				echo"<label>Interesse dimostrato per il video</label>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_i' value=".$row['valore_i']." min='1' max='5000' name='valore_i' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo"<label>Impatto dell'emozione provata nella vita quotidiana </label>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_im' value=".$row['valore_im']." min='1' max='5000' name='valore_im' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo"<label>Influenza degli altri subita in questo periodo</label>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_c' value=".$row['valore_c']." min='1' max='5000' name='valore_c' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo"<label>Solitudine provata in questo periodo</label>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_cm' value=".$row['valore_cm']." min='1' max='5000' name='valore_cm' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				echo "</div>";
				echo"<label>Quanto lavori di fantasia con questa canzone?</label>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_f' value=".$row['valore_f']." min='1' max='5000' name='valore_f' data-rangeslider /><br/>";
				echo"  <div style='display:block !important; margin-bottom:100px;'>";
         echo " <div style=' float:right; clear:both; '><label>MAX</label></div>
          <div style=' float:left;'><label>MIN</label></div>
          
          </div>

          <div style='display:none !important; '> <output></output> </div>";
				
				$data = array("valore_i"=>$row['valore_i'], 
							  "valore_im"=>$row['valore_im'],
							  "valore_c"=> $row['valore_c'], 
							  "valore_cm"=>$row['valore_cm'], 
							  "valore_f"=>$row['valore_f'] );

				$json= json_encode($data);

				echo "</div>";
				echo "<input type='hidden' name='id' value='$id' />";
				echo"<input type='hidden' name='nome' value='$nome' />";
				echo"<input type='hidden' name='valori' value='$json' />";
				//echo "<input type='submit' value='cambia i valori'  name='cambia'>";
				
				echo "</form>";
				echo"<p style='font-size:20px; text-align:center; margin-bottom:20px; margin-top:20px;'> Se non ti piace il video assegnato<br/>,
				puoi inserire direttamente tu il tuo video preferito con il relativo sentimento che vuoi assegnare
	 			<a href='insert_if/index.php' target='_blank'>cliccando qui</a></p><br/> ";
				echo "</div>";

			//altroUtente();
			
			/*
			echo "<pre>";
			prendiSentimento();
			echo "</pre>";	
			*/
    
    	/*
    		$studioValori= new ArrayClass();
   	     		
    		
    		$max=$studioValori->array_max($data);
    		$min= $studioValori->array_min($data);
   	     	$order= $studioValori->array_order($data);
    		
    	
    		
    		
    		var_dump(json_encode($max));  
    		var_dump(json_encode($min));  
    		var_dump(json_encode($order));  
    		var_dump(json_encode($data));   

			
			*/
			

			?>

				
			<br/><br/><br/><br/><br/><br/>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- primo_ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7543123859390493"
     data-ad-slot="6155357669"></ins>

<br/><br/><br/><br/><br/><br/>
				
	
				<?php
	
		}
		
		//altroUtente();
		
		
		
		
	
		
	
	} 
	
	?>

	<!--<section class="color-4" style="background-color:black;">
				<h2>Round Slide</h2>
				<nav class="nav-roundslide">
					<a class="prev" href="/item1">
						<span class="icon-wrap"><svg class="icon" width="32" height="32" viewBox="0 0 64 64"><use xlink:href="#arrow-left-4"></svg></span>
						<h3>Hannah Leigh</h3>
					</a>
					<a class="next" href="/item3">
						<span class="icon-wrap"><svg class="icon" width="32" height="32" viewBox="0 0 64 64"><use xlink:href="#arrow-right-4"></svg></span>
						<h3>Greg Kennedy</h3>
					</a>
				</nav>
			</section> -->

	<?php
	






//pulsante "mi sento fortunato

if(isset($_POST['fortunato'])) {

$genere="";
$musica="";
$fattoreL= 1;

$richiesta="SELECT * FROM iframe ORDER BY RAND() LIMIT 1 ";
$risultato= mysqli_query($conn, $richiesta);

if(!$risultato) {
 die("la richiesta non &egrave; avvenuta...");
}

	while ($row= mysqli_fetch_assoc($risultato)) {

		?>
		<meta property="og:title" content="<? echo $row['canzone'];  ?>"/>
		<meta property="og:site_name" content="StoriaLab"/>
		<meta property="og:description" content="Emotional Social" />

		<?
	
				$id=$row['idiFrame'];
				$_SESSION['id']=$row['idiFrame'];
		
		echo  $row['canzone'] ."<br/>";
				echo  "<iframe width='420' height='315' src='//www.youtube.com/embed/".$row['collegamento']."?autoplay=1'  frameborder='0' allowfullscreen></iframe> .'<br/>";
		echo $fattoreU;
		echo "<p style='font-size:30px;'>" . $row['fattore_L'] ."</p><br/>";
		echo "<form action='insert_if/insert.php' method='post'>";

				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_i' value=".$row['valore_i']." min='1' max='5000' name='valore_i' data-rangeslider /><br/>";
				echo"<output></output>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range'  id='valore_im' value=".$row['valore_im']." min='1' max='5000' name='valore_im' data-rangeslider /><br/>";
				echo"<output></output>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_c' value=".$row['valore_c']." min='1' max='5000' name='valore_c' data-rangeslider /><br/>";
				echo"<output></output>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_cm' value=".$row['valore_cm']." min='1' max='5000' name='valore_cm' data-rangeslider /><br/>";
				echo"<output></output>";
				echo "</div>";
				echo "<div id='js-example-change-value'>";
				echo "<input type='range' id='valore_f' value=".$row['valore_f']." min='1' max='5000' name='valore_f' data-rangeslider /><br/>";
				echo"<output></output>";
				echo "</div>";
				echo "<input type='hidden' name='id' value='$id'>";

				//echo "<input type='submit' id='cambia' value='cambia i valori'  name='cambia'>";
				echo "<div id='valori_cambiati'></div>";
				echo "</form>";
?>
			<br/><br/><br/><br/><br/><br/>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- primo_ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7543123859390493"
     data-ad-slot="6155357669"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br/><br/><br/>
				<a href="index.php"><button class="btn btn-4 btn-4b icon-arrow-left">vai indietro</button></a>
				</div>
	
				<?php
	
		} 
		
		
	
	
   
  
}

/*
if($umore=" ") {
 echo '<iframe width="420" height="315" src="//www.youtube.com/embed/SdhAfMor9BM" frameborder="0" allowfullscreen></iframe>';

} */


//$richiesta="SELECT * FROM iframe WHERE sentimento='felice' AND ( fattore_L <= " .$fattoreU. ") LIMIT 1 "; //WHERE sentimento='felice'




//switch ($musica) 

?>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js" ></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/rangeslider.min.js"></script>
    
    
    
    
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

    </body>

    
    </html>

<?

/*function prendiImmagine($id, $numSentimento) {
	
	

	$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
	echo 'Errore durante la connessione al server MySQL';
	exit();
}

$query="SELECT * from immagini where  sentimento_imm='$numSentimento' AND idUtente='25' ";

$risultato= mysqli_query($conn, $query);

if(!$risultato) 
	 { die('problemi...' .mysqli_error($conn));}

	while($row= mysqli_fetch_assoc($risultato)) {
		
		$id=$row['idImmagini'];
		var_dump($id);
		echo '<p>ecco l\'immagine: <img src="http://www.storialab.it/get.php?id='.$id.'" alt="imm '.$id.'"/> </p>';
		
		echo '<p>'.carattere(da_num_a_sentimento($row['sentimento_imm'])).'</p>';

	}
	

} *


function inserisciSentimento($umore, $idUtente) {


//$umore=numero_sentimento($umore);

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
	echo 'Errore durante la connessione al server MySQL';
	exit();
}

$query="UPDATE utente SET sentimento='$umore' where idUtente='$idUtente' ";

$risultato= mysqli_query($conn, $query);

if(!$risultato) 
	 { die('problemi...' .mysqli_error($conn));}


}

function prendiSentimento() {

	$utente= rand(15, 75);
	$nome=prendiNome($utente);
	$cognome=prendiCognome($utente);
	
/*
	var_dump($utente);
	var_dump($nome);
	var_dump($cognome);





	

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
	echo 'Errore durante la connessione al server MySQL';
	exit();
}

$query="SELECT idUtente, nome,cognome, sentimento FROM utente where nome='$nome' and cognome='$cognome' AND idUtente='$utente' LIMIT 1 ";

$risultato= mysqli_query($conn, $query);

if(!$risultato) { die('problemi...' .mysqli_error($conn)); }
	

while($row=mysqli_fetch_assoc($risultato)) {
	echo "l'utente <strong>" .$nome." ".$cognome. '</strong> attualmente sta provando <strong>' .da_num_a_sentimento($row['sentimento']). '</strong><br/>';
	
}

}*/ 



 ?>