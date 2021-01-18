<?php


if ($_POST['utilisateur']=='test'&& $_POST['mdp']=='test' && !empty($_POST['h-captcha-response']) )
  { 
    
        $secret = "0x473593690cEB68910ad59Ba835efb70DDe8DDF11"; 
        $remote_address = $_SERVER['REMOTE_ADDR'];
        $verify_url = "https://hcaptcha.com/siteverify?secret=".$secret."&response=".$_POST['h-captcha-response']."&remoteip=".$remote_address;
            
        $response = file_get_contents($verify_url); # Get token from post data with key 'h-captcha-response' and Make a POST request with data payload to hCaptcha API endpoint
        $responseData = json_decode($response);
        
    
    
    header('Location: accueil.php');
    exit();
  }
else {
    
    header('Location: connexion_non_reussie.php');
    exit();
}
?>
