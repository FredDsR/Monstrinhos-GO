<?php
require_once('../src/Monstro.php');
require_once('funcoesextras.php');

$operacao = null;

//$_REQUEST procura dados oriundos de $_GET e de $_POST
if(isset($_REQUEST['op'])) $operacao = $_REQUEST['op'];

switch($operacao){
    
    case 'inserir':
    inserir();
    break;

    case 'editar':
    editar();
    break;

    case 'excluir':
    excluir();
    break;

    case 'atualizar':
    atualizar();
    break;
}

function excluir()
{
    if(!isset($_GET['id'])){ //seria bom sempre sanitizar inputs que serao colocados em consultas SQL por mais PDO que seja utilizado
        header('Location: ../jogar.php');
    }
    $monstro = new Monstro();
    $monstro->setId($_GET['id']);
    if($monstro->remover()){
        header('Location: ../jogar.php');
    }else{
        echo 'Não é possivel excluir o registro';
    }

}

/**
 * Requisita pagina de edicao do cadastro enviando os dados do registro solicitado
 */
function editar()
{
    if(!isset($_GET['id'])){
        header('Location: ../jogar.php');
    }
    $monstros = new Monstro();
    $monstro = $monstros->selecionar($_GET['id']);
    if($monstro){ //existe cadastro no banco, vai para pagina de edicao
        
        require('../edita-monstro.php'); //nesta pagina teremos a variavel $monstro com o que queremos editar, veja o arquivo
        exit; //assegurando termino do script porque nao estamos usando redirecionador com header()

    }else{ //nao encontrou registro, retorna pra listagem, pode informar erro pro usuario
        header('Location: ../jogar.php');
    }

}

/**
 * Alvo da pagina de edicao, processa os dados para atualizar (update) do registro 
 * no banco de dados
 */
function atualizar()
{
    if(empty($_POST)){ //se nao tiver dados vindo de uma requisicao com POST retorna pra listagem
        header('Location: ../jogar.php');
    }
    
    //seta as informacoes para atualizar o cadastro de acordo com a edicao via formulario html
    $monstros = new Monstro();
    $monstro = $monstros->selecionar($_POST['id']);
    $monstro->setNome($_POST['nome']);
    $monstro->setHp($_POST['hp']);
    $monstro->setAtaque($_POST['ataque']);
    $monstro->setDefesa($_POST['defesa']);
    $monstro->setAgilidade($_POST['agilidade']);
    $monstro->setSorte($_POST['sorte']);
    
    if( !empty($_FILES['novoArquivo']['name']) ){ //se existe novo arquivo vindo do formulario
        //substituir o arquivo antigo (esta logica nao remove imagens antigas)
        $arquivoCarregado = uploadImagens('novoArquivo', '..\assets\img\monstrinhos'); //uploadImagens consta em funcoesextras.php
        if($arquivoCarregado) $monstro->setImagem($arquivoCarregado);

    }

    if($monstro->atualizar()){ //envia as alteracoes para SQL UPDATE
        header('Location: ../jogar.php');
    }else{
        echo 'Ocorreu um problema ao atualizar o cadastro do monstro ';
    }
}

function inserir()
{
    if(empty($_POST)){ //se nao tiver dados vindo de uma requisicao com POST retorna pra listagem
        header('Location: ../jogar.php'); 
    }
    $monstro = new Monstro($_POST['nome']);
    $monstro->setHp($_POST['hp']);
    $monstro->setAtaque($_POST['ataque']);
    $monstro->setDefesa($_POST['defesa']);
    $monstro->setAgilidade($_POST['agilidade']);
    $monstro->setSorte($_POST['sorte']);

    if( !empty($_FILES['imagem']['name']) ){
        $arquivoCarregado = uploadImagens('imagem', '..\assets\img\monstrinhos'); //uploadImagens consta em funcoesextras.php
        if($arquivoCarregado) $monstro->setImagem($arquivoCarregado);
    }
    
    if($monstro->salvar()){
        header('Location: ../jogar.php');
    }else{
        echo 'Não foi possível inserir um novo registro no cadastro de monstrinhos';
    }
}