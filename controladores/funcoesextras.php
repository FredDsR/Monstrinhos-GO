<?php
/**
 * Este arquivo contem funcoes extras que nao fazem parte de entidades e que apoiam o
 * desenvolvimento do sistema, sao funcionalidades variadas e de reuso comum por todo o sistema
 */

/**
 * Upload de Imagens, somente para arquivos com extensao png, jpg e gif.
 *
 * @param string $nomeInput valor do name, atributo da tag input file no html (name="nomeInput")
 * @param string $diretorio caminho destino onde o arquivo deve ser enviado
 * @return string|boolean string com nome do arquivo se upload ocorreu com sucesso, false do contrario
 */
function uploadImagens($nomeInput, $diretorio){
    
    //fazer upload de arquivos
    //somente podem ser aceitos arquivos do tipo 
    //imagem (png, jpg, jpeg, gif)
    //apos validar o arquivo, move-lo para o sistema
    //retornar ao usuario se o arquivo foi processado com sucesso ou nao

    $permitidos = ['png', 'jpg', 'gif'];
	
    $arquivo = $_FILES[$nomeInput]['name'];
    
	$extensao = pathinfo($arquivo, PATHINFO_EXTENSION); //pega extensao do arquivo
    
	$nomeOriginal = pathinfo($arquivo, PATHINFO_FILENAME); //pega nome do arquivo
    $nomeOriginal = trim($_FILES[$nomeInput]['name']); //remove espacos no inicio e fim do arquivo

    $arquivoNomeFinal = preg_replace('/\\s+/', ' ', $nomeOriginal); //remove espacos em branco entre palavras (expressao regular)

    if( in_array($extensao, $permitidos) ){ //arquivo e uma imagem valida
        
        $arquivoCarregado = move_uploaded_file($_FILES[$nomeInput]['tmp_name'], $diretorio .'/'. $arquivoNomeFinal );

        if($arquivoCarregado) return $arquivoNomeFinal; //conseguiu efetuar o upload, retorna nome do arquivo
        return false; //nao conseguiu efetuar upload, verificar diretorio onde estaop os arquivos, caminhos, permissoes de escrita...
    }

    return false; //o arquivo nao e uma imagem valida
}
