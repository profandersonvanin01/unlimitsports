<?php
    echo "Dados do formulário <br>";

    // Recupera os dados do formulário
    $competicao = $_POST['competicao'];
    $categoria = $_POST['categoria'];
    $formato_equipe = $_POST['formato_equipe'];
    $nome_equipe = $_POST['nome_equipe'];

    // Exibe as informações básicas
    echo "Competição ID: $competicao<br>";
    echo "<hr>";
    echo "Categoria ID: $categoria<br>";
    echo "<hr>";
    echo "Formato: $formato_equipe<br>";
    echo "<hr>";

    echo "Nome Equipe: $nome_equipe<br>";
    echo "<hr>";

    // Recupera os dados dos membros
    $nomes_membros = $_POST['membro_nome'];  // Array com os nomes
    $cpfs_membros = $_POST['membro_cpf'];    // Array com os CPFs
    $emails_membros = $_POST['membro_email']; // Array com os e-mails

    // Exibe as informações dos membros
    for ($i = 0; $i < count($nomes_membros); $i++) {
        echo "Membro " . ($i + 1) . ":<br>";
        echo "Nome: " . htmlspecialchars($nomes_membros[$i]) . "<br>"; // htmlspecialchars para prevenir XSS
        echo "CPF: " . htmlspecialchars($cpfs_membros[$i]) . "<br>";
        echo "E-mail: " . htmlspecialchars($emails_membros[$i]) . "<br>";
        echo "<hr>";
    }
?>
