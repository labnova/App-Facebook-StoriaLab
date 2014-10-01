<?php


function ultimiVideo() {



$nome=$_SESSION['nome'];



$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
    echo 'Errore durante la connessione al server MySQL';
    exit();
} 

$id= mysqli_query($conn, "SELECT ultimi_id FROM utente WHERE Nome='$nome' " );
$citazione= mysqli_query($conn, "SELECT ultime_cit FROM utente WHERE Nome='$nome' " );

$row= mysqli_fetch_assoc($id);
$row2= mysqli_fetch_assoc($citazione);

$valore_id= $row['ultimi_id'];
$valore_cit= $row2['ultime_cit'];





$richiesta=mysqli_query($conn, "SELECT iframe.canzone, iframe.collegamento FROM iframe, utente WHERE utente.ultimi_id='{$valore_id}' AND utente.ultime_cit='{$valore_cit}' AND iframe.idiFrame='{$valore_id}' ");

while($row=mysqli_fetch_assoc($richiesta)) {

    $collegamento=$row['collegamento'];

    echo "<h2>".$row['canzone'] ."</h2><br/>";
    echo  "<iframe width='420' height='315' src='//www.youtube.com/embed/$collegamento'  frameborder='0' allowfullscreen></iframe><br/>";



}

}



function prendiGenere($num) {
$genere="";
  switch ($num) {
    case '1':
      $genere='pop';
      break;
     case '2':
      $genere='rock';
      break;
     case '4':
      $genere='dance/elettronica';
      break;
    case '22':
      $genere='classica/soundtrack';
      break;
    case '17':
      $genere='autore';
      break;
    
    
  }

return $genere;

}




function criptaPassword($pass) {
  $password=$pass;
  $hash_format="$2y$10$";
  $salt='ciaoFacciamo22caratteri';

  $insieme= $hash_format.$salt;

  $hash=crypt($insieme,$password);

  return $hash;
}

function ultimiVideoInseriti() {

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
  echo 'Errore durante la connessione al server MySQL';
  exit();
} 

$query="SELECT idiFrame, canzone, genere, sentimento, idUtente FROM iframe  ORDER BY idiFrame DESC LIMIT 4 ";

$risultato= mysqli_query($conn, $query);



if(!$risultato) 
   { die('problemi...' .mysqli_error($conn));}

while($row=mysqli_fetch_assoc($risultato)) {

  echo "<p><strong>" .$row['canzone']."</strong> di genere<strong> " .prendiGenere($row['genere']). "</strong> indica <strong>" .carattere(da_num_a_sentimento($row['sentimento'])). "</strong> inserita da <strong>" .prendiNome($row['idUtente']). "</strong></p><br/>";
}



}





$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
  echo 'Errore durante la connessione al server MySQL';
  exit();
} 

//require_once 'include.php';

function carattere($stringa) {

  $stringa=str_replace("à","&agrave;",$stringa); 
  return $stringa;
}

/*------ROBA PER REGISTRAZIONE FACEBOOK ------------*/



function retrieve_fields($sf) {

    return json_encode($sf);
}

function verify_fields($f,$sf) {
    $fields = json_encode($sf);
    return (strcmp($fields,$f) === 0);
}

function register_user($resp) {
    extract($resp["registration"],EXTR_PREFIX_ALL, "fb");

    // prepare values
    $fb_id = mysql_real_escape_string($resp["user_id"]);
    $fb_birthday = date("Y-m-d" , strtotime($fb_birthday));
    $fb_name = mysql_real_escape_string($fb_name);
    $fb_location = mysql_real_escape_string($fb_location["name"]);

    $query_str = "INSERT INTO users VALUES (NULL, '$fb_id', '$fb_name', '$fb_email', '$fb_gender', '$fb_birthday', '$fb_location') ON DUPLICATE KEY UPDATE fb_id=fb_id";
    mysql_query($query_str);
}

function check_registration($fb, $fb_fields) {
    if ($_REQUEST) {
        $response = $fb->getSignedRequest();
        if ($response && isset($response["registration_metadata"]["fields"])) {
            $verified = verify_fields($response["registration_metadata"]["fields"], $fb_fields);

            if (!$verified) { // fields don't match!
                header("location: bad.php");
            } else { // we verifieds the fields, insert the Data to the DB
                $GLOBALS['congratulations'] = TRUE;
                register_user($response);
            }
        }
    }
}

function get_user_by_id($id) {
    $res = mysql_query("SELECT * FROM users WHERE fb_id = '$id'");
    if($res) {
        $row = mysql_fetch_array($res);
        return $row;
    } else
        return FALSE;
}


/*------FINE ROBA PER REGISTRAZIONE FACEBOOK ------------*/



function prendiID($nome) {

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
    echo 'Errore durante la connessione al server MySQL';
    exit();
} 

$id= mysqli_query($conn, "SELECT idUtente FROM utente WHERE Nome='$nome' " );

$row= mysqli_fetch_assoc($id);

$idUtente=$row['idUtente'];

return $idUtente;




}



function prendiNome($id) {

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
    echo 'Errore durante la connessione al server MySQL';
    exit();
} 

$nome= mysqli_query($conn, "SELECT nome FROM utente WHERE idUtente='$id' " );

$row= mysqli_fetch_assoc($nome);

$idUtente=$row['nome'];

return $idUtente;




}

function prendiCognome($id) {

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
    echo 'Errore durante la connessione al server MySQL';
    exit();
} 

$cognome= mysqli_query($conn, "SELECT cognome FROM utente WHERE idUtente='$id' " );

$row= mysqli_fetch_assoc($cognome);

$idUtente=$row['cognome'];

return $idUtente;




}


function videoAssegnati($nome) {

	$nome=prendiID($nome);

	$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

	if (mysqli_connect_errno()) {
    echo 'Errore durante la connessione al server MySQL';
    exit();
	} 


$query="SELECT utente.iframeAssegnati, utente.sentimentoAssegnato, utente.altriUtenti, iframe.canzone, iframe.collegamento, iframe.fattore_L ";
$query .= " FROM utente, iframe";
$query .= " WHERE utente.iframeAssegnati= iframe.idIframe";
$query .= " AND utente.idUtente= $nome"; 


$nome= mysqli_query($conn, $query);

if(!$nome) { die('problemi...' .mysqli_error($conn)); }







while($row= mysqli_fetch_assoc($nome)) {
	$utenteAssegnante= prendiNome($row['altriUtenti']);


	echo "<strong>".$utenteAssegnante. " </strong> ti ha appena assegnato un nuovo video con sentimento  <strong>".da_num_a_sentimento($row['sentimentoAssegnato'])."</strong><br/>";

	echo "<h2>".$row['canzone']."</h2>";
	echo  "<iframe width='420' height='315' src='//www.youtube.com/embed/".$row['collegamento']."'  frameborder='0' allowfullscreen></iframe><br/>";
	echo "<strong>fattore_L:</strong> ".$row['fattore_L'];



}



}


function da_num_a_sentimento($num) {

if ($num==199 || $num==200 || $num=="" || $num==0 ||

	 $num==203 ||
	  $num==205 || 
	   $num==206 || 
	    $num==207 || 
	     $num==208 || 
	      $num==209 || 
	       $num==213 ) { $num= rand(196, 214); }

	$sentimento="";

	

	switch ($num) {

		case '': 
		$sentimento='riflessione';
		break;

		case '196': 
		$sentimento='riflessione';
		break;

		case '197': 
		$sentimento='felicità';
		break;

		case "198": 
		$sentimento="malinconia";
		break;

		case '201': 
		$sentimento='rabbia';
		break;

		case '202': 
		$sentimento='tristezza';
		break;

		case '204': 
		$sentimento='riscatto';
		break;

		case '210': 
		$sentimento='amore';
		break;

		case '211': 
		$sentimento='curiosità';
		break;

		case '212': 
		$sentimento='speranza';
		break;

		case '214': 
		$sentimento='confusione';
		break;
	}

	

	return $sentimento;

}


/**
 * http://webdeveloperswall.com/php/get-youtube-video-id-from-url
**/ 
function extractUTubeVidId($url){
	/*
	* type1: http://www.youtube.com/watch?v=9Jr6OtgiOIw
	* type2: http://www.youtube.com/watch?v=9Jr6OtgiOIw&feature=related
	* type3: http://youtu.be/9Jr6OtgiOIw
	*/
	$vid_id = "";
	$flag = false;
	if(isset($url) && !empty($url)){
		/*case1 and 2*/
		$parts = explode("?", $url);
		if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
			$params = explode("&", $parts[1]);
			if(isset($params) && !empty($params) && is_array($params)){
				foreach($params as $param){
					$kv = explode("=", $param);
					if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
						if($kv[0]=='v'){
							$vid_id = $kv[1];
							$flag = true;
							break;
						}
					}
				}
			}
		}
		
		/*case 3*/
		if(!$flag){
			$needle = "youtu.be/";
			$pos = null;
			$pos = strpos($url, $needle);
			if ($pos !== false) {
				$start = $pos + strlen($needle);
				$vid_id = substr($url, $start, 11);
				$flag = true;
			}
		}
	}
	return $vid_id;
}


function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }
    


function numero_genere($gen) {

$genere=0;

switch ($gen) {

case "pop": 
	$genere="1";
break;

case 'rock': 
	$genere='2';
break;

case 'dance': 
	$genere='4';
break;

case 'chill out': 
	$genere='5';
break;

case 'ska': 
	$genere='6';
break;

case 'punk': 
	$genere='7';
break;

case 'alternative rap': 
	$genere='8';
break;

case 'pop rock': 
	$genere='9';
break;

case 'rap': 
	$genere='10';
break;

case 'alternative rock': 
	$genere='11';
break;

case 'musica leggera': 
	$genere="12";
break;

case 'soundtrack movie': 
	$genere='13';
break;



case 'cantilene': 
	$genere='15';
break;

case 'musical': 
	$genere='16';
break;

case 'autore': 
	$genere='17';
break;

case 'rap metal': 
	$genere='18';
break;

case 'nu metal': 
	$genere='19';
break;

case 'musica italiana': 
	$genere='20';
break;

case 'musica regionale': 
	$genere='21';
break;

case 'classica': 
	$genere='22';
break;

case 'grunge': 
	$genere='23';
break;

}

return $genere;


}

function numero_sentimento($sen) {

$sentimento=0;

switch ($sen) {

case 'armonia': 
	$sentimento='195';
break;

case 'riflessione': 
	$sentimento='196';
break;

case 'felicità': 
	$sentimento='197';
break;

case 'felice': 
	$sentimento='197';
break;

case "malinconia": 
	$sentimento="198";
break;

case 'abbandono': 
	$sentimento='200';
break;

case 'rabbia': 
	$sentimento='201';
break;

case 'tristezza': 
	$sentimento='202';
break;

case 'gioia': 
	$sentimento='203';
break;

case 'riscatto': 
	$sentimento='204';
break;

case 'sorpresa': 
	$sentimento='205';
break;

case 'angoscia': 
	$sentimento='206';
break;

case 'stupore': 
	$sentimento='207';
break;

case 'ribellione': 
	$sentimento='209';
break;

case 'amore': 
	$sentimento='210';
break;

case 'curiosità': 
	$sentimento='211';
break;

case 'speranza': 
	$sentimento='212';
break;

case 'paura': 
	$sentimento='213';
break;

case 'confusione': 
	$sentimento='214';
break;

case 'inquietitudine': 
	$sentimento='215';
break;

case 'divertimento': 
	$sentimento='216';
break;

case 'rassegnazione': 
	$sentimento='217';
break;


}

return $sentimento;

}


function numero_situazione($sit) {

$situazione="";
$caso=0;

$explode($situazione, $sit);

switch(is_array($sit)) {

case "lasciato": 
	$caso=1;
	
	}

return $caso;

}

function numero_scena($scen) {
$scena=0;

switch($scen) {

	case "inizio": 
		$scena=1;
	break;
	
	case "scena_1": 
		$scena=2;
	break;
	
	case "scena_2": 
		$scena=3;
	break;
	
	case "fine": 
		$scena=4;
	break;
	}

return $scena;

}


function altroUtente() {

$utente= array($nome, $cognome, $commento);

$conn= mysqli_connect('localhost', 'storialab', '', 'my_storialab');

if (mysqli_connect_errno()) {
	echo 'Errore durante la connessione al server MySQL';
	exit();
}


$sql=mysqli_query($conn, 'SELECT utente.* FROM utente, iframe WHERE idUtente=FLOOR(1+RAND()*7) AND iframe.idiFrame=utente.   LIMIT 1');

if(!$sql) {
 		die("la richiesta non &egrave; avvenuta..." .mysqli_error($conn));

}

while($row=mysqli_fetch_assoc($sql)) {

echo "<p>".$row['nome'].$row['cognome'].  " ha inserito un nuovo video: </p><br/>";
 

echo $row['racconti'] .'<br/>'; 

}



/* 

$utente[$nome]= $row['nome']; 
$utente[$cognome]= $row['cognome']; 
$utente[$commento]= $row['commento']; 


*/
}


    
/* include_once 'securimage/securimage.php';
$securimage= new Securimage();

if($securimage->check($_POST['captcha_code'])==false) {

?>
<p>sbagliato il codice CAPTCHA. Ti preghiamo di riprovare nuovamente, grazie. :-)<br/>
<a href="http://www.area51editore.com/MeetingRoom/newsletter/index.php">TORNA ALLA NEWSLETTER</a></p>

<?
} else  {  */


?>