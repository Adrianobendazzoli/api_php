<?php

//CABEÇALHO
header("Content-Type: application/json"); // Define o tipo de resposta

$metodo= $_SERVER ['REQUEST_METHOD'];
// echo "Método da requisição: ". $metodo;

//CONTEÚDO
// $usuarios = [
//     ["id" => 1, "nome" => "Adriano", "email" => "Adriano@email.com"], 
//     ["id" => 2, "nome" => "Beatriz", "email" => "Beatriz@email.com"]
// ];

// Converte para JSON e retorna
// echo json_encode($usuarios);

    switch ($metodo) {
        case 'GET':
            echo " ações do Método Get";
        break;

        case 'POST':
            echo " ações do Método POST";
        break;
        
        default:
            echo " Metodo não enconrtado";
            break;
    }

?>