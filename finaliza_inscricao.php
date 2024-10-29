<?php
    include 'conecta.php';
    $id_equipe = $_GET['id_equipe'];

    // Recupera os dados dos membros
    $nomes_membros = $_POST['membro_nome'];  // Array com os nomes
    $cpfs_membros = $_POST['membro_cpf'];    // Array com os CPFs
    $emails_membros = $_POST['membro_email']; // Array com os e-mails
    
    for ($i = 0; $i < count($nomes_membros); $i++) {

        $consulta = "INSERT INTO atletas (nome_atleta,email_atleta,cpf_atleta,fk_equipe_id_equipe) VALUES ('$nomes_membros[$i]','$emails_membros[$i]','$cpfs_membros[$i]','$id_equipe')";
        $conn->query($consulta);
    }
    //echo "INSCRIÇÃO FINALIZADA!";
    header('Location: final.php');
?>