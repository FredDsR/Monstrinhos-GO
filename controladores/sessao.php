<?php

session_start();
$operacao = null;

if(isset($_REQUEST['op'])) $operacao = $_REQUEST['op'];

switch($operacao){

    case 'login':
        login();
        break;
    
    case 'logout':
        logout();
        break;
    
}


function login(){
	$senhaCorreta = sha1(admin);
	$emailAdmin = "admin@monstrinhosgo.com";
	
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	
    $senha = sha1($senha);//cifrando senhas
	
    $validacao = true;
	
	if($email != $emailAdmin){
		$validacao = false;
	}
    if($senha != $senhaCorreta){
		$validacao = false;
	}
	if($validacao){
        session_regenerate_id();
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = 'Administrador';
        $_SESSION['email'] = $email;
        header('Location: ../jogar.php');

    }else{//credenciais invalidas
        header('Location: ../index.php?error=credenciais');
    }
}


function logout(){
    session_destroy();
    header('Location: ../index.php');
}

function isSessaoValida(){
    
    if(!isset($_SESSION['logado'])){
        header('Location: index.php');
    }
}

function checkSessao(){
    if(!isset($_SESSION['logado'])) return false;
    return true;
}




