<?php


	$metodo = $_POST['metodo'];
	$entrada = $_POST['entrada'];
	$pass = $_POST['passphrase'];
	
	
	
	if ($metodo == "RSA"){ 
		$Cifra =  'OPENSSL_KEYTYPE_RSA';		
	} else $Cifra = 'OPENSSL_KEYTYPE_EC "curve_name" => "prime256v1"';
	
	if (isset($_POST['tipo'])){
		$privkey = file_get_contents('private_key.pem');
		$publickey = file_get_contents('public_key.pem');
	} else {
		$config = array("digest_alg" => "sha256", "private_key_bits" => 2048, "encrypt_key" => 1, "encrypt_key_cipher" => $Cifra);
		$res = openssl_pkey_new($config);
		openssl_pkey_export($res, $privkey, $pass, $config);
		$publickey = openssl_pkey_get_details($res);
		$publickey = $publickey["key"];
		
	}
	
    openssl_public_encrypt($entrada, $crypttext, $publickey);
    $priv = openssl_pkey_get_private($privkey, $pass);
    openssl_private_decrypt($crypttext, $decrypted, $priv);
	
	if (!isset($_POST['tipo'])){
		file_put_contents('private_key.pem', $privkey);	
		file_put_contents('public_key.pem', $publickey);
	}
	
	echo '<br><center><h3> <br> Chave privada:<b> ' .$privkey.'</b><br><br>Chave pública: <b>' .$publickey.' </b><br><br> Palavra Criptografada: <b>' .base64_encode($crypttext). '</b><br><br> Palavra Inicial: <b>' .$decrypted. '</b><h3></center><br><br>';
	
?>

