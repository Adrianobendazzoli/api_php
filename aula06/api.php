<?php

//CABEÇALHO
header("Content-Type: application/json"); // Define o tipo de resposta

$metodo= $_SERVER ['REQUEST_METHOD'];
// echo "Método da requisição: ". $metodo;

//CONTEÚDO
 //$usuarios = [
    // ["id" => 1, "nome" => "Adriano", "email" => "Adriano@email.com"], 
    // ["id" => 2, "nome" => "Beatriz", "email" => "Beatriz@email.com"]
 //];

// Converte para JSON e retorna
 //echo json_encode($usuarios);
    $arquivo = 'usuarios.json';

    //verifica se o arquivo existe, sxe não ele cria um com um array vazio
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    //lê o conteudo json
    $usuarios = json_decode(file_get_contents($arquivo),true);

    switch ($metodo) {
        case 'GET':
            //echo " ações do Método Get";
            echo json_encode($usuarios);
        break;

        case 'POST':
            //echo " ações do Método POST";
            $dados = json_decode(file_get_contents('php://input'),true);
            //print_r($dados);
            $NovoUser = [
                "id"=> $dados["id"],
                "nome"=> $dados["nome"],
                "email"=> $dados["email"]
            ];

            //adiciona o novo usuário ao array existente
            array_push($usuarios, $NovoUser);
            echo json_encode('Usuário inserido com sucesso!!');
            print_r($usuarios);
        break;
        
        default:
            echo " Metodo não enconrtado";
            break;
    }

?>