<?php
    // Carregar o .env
    require 'carrega_env.php';
    loadEnv(__DIR__ . '/.env');

    // Obter as variáveis de ambiente
    $host = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $database = $_ENV['DB_DATABASE'];

    // Criar a conexão com o banco de dados
    $conn = new mysqli($host, $username, $password, $database);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    //echo "Conexão bem-sucedida!";
?>