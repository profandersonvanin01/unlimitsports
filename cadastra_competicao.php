<?php
    include 'conecta.php';								
    
    //echo "Dados do formulário <br>";

    // Recupera os dados do formulário
    $competicao = $_POST['competicao'];
    $categoria = $_POST['categoria'];
    $formato_equipe = $_POST['formato_equipe'];
    $nome_equipe = strtoupper($_POST['nome_equipe']);

    $sql = "SELECT * FROM equipe WHERE nome_equipe = '$nome_equipe'";
    $consulta = $conn->query($sql);
    $registros = $consulta->num_rows;
    if ($registros > 0) {
        echo "ERRO. ESSA EQUIPE JÁ EXISTE!";
        header('Location: competicoes.php');
    }
    else{
        $consulta2 = "INSERT INTO equipe (nome_equipe,fk_competicao_id_competicao) VALUES ('$nome_equipe','$competicao')";
        $conn->query($consulta2);
        $consulta3 = "INSERT INTO modalidade (fk_categorias_id_categoria,fk_competicao_id_competicao,fk_formato_equipe_id_formaato) VALUES ('$categoria','$competicao','$formato_equipe')";
        $conn->query($consulta3);
        header('Location: cadastra_membros.php?nome_equipe=' . urlencode($nome_equipe) . '&id_formato=' . urlencode($formato_equipe));

    }
?>
