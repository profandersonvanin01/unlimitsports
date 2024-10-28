<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="GYm,fitness,business,company,agency,multipurpose,modern,bootstrap4">

	<meta name="author" content="Themefisher.com">

	<title>Unlimit | Sports</title>

	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<!-- Icofont Css -->
	<link rel="stylesheet" href="plugins/icofont/icofont.min.css">
	<!-- Themify Css -->
	<link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
	<!-- animate.css -->
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<!-- Magnify Popup -->
	<link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<?php 
		include 'menu.php';
	?>

	<div class="main-wrapper ">
		<section class="page-title bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">						
						<h1 class="text-lg text-white mt-2">Incrições </h1>
					</div>
				</div>
			</div>
		</section>
		<!-- Section pricing start -->
		<section class="section pricing">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 text-center">
						<div class="section-title">
							<div class="divider mb-3"></div>
							<h2>Escolha a competição</h2>
						</div>
					</div>
				</div>
				<form id="formulario" action="cadastra_competicao.php" method="POST">
					<div class="container">
						<div id="competicaoSelect">
							<select id="competicao" name="competicao">
								<option value="">Escolha uma competição</option>
								<?php								
									include 'conecta.php';
									
									// String SQL para selecionar a competição ativa
									$sql = "SELECT * FROM competicao WHERE ativo = 1";
									$consulta = $conn->query($sql);
									$id_competicao = "";
									while ($competicao = $consulta->fetch_assoc()){
										$dataBanco = $competicao['data_competicao'];
										$dataFormatada = DateTime::createFromFormat('Y-m-d', $dataBanco)->format('d/m/Y');
										echo "<option value='".$competicao['id_competicao']."'>".$competicao['nome_competicao']." - ".$dataFormatada."</option>";
									}						
								?>	
							</select>							
						</div>

						<!-- tirei o botão daqui, para submeter o formulario completo -->

						<div id="categorySelectContainer" class="hidden">
							<label for="category">Selecione a Categoria:</label>
							<!--Select alimentado pela busca no banco, com as categorias disponiveis sobre a competição criada pelo administrador da competição -->
							<select id="category" name="categoria">
								<?php								
									// String SQL para selecionar a categoria
									$sql2 = "SELECT * FROM categorias";
									$consulta2 = $conn->query($sql2);
									while ($categoria = $consulta2->fetch_assoc()){	
										echo "<option value='".$categoria['id_categoria']."'>".$categoria['categoria']."</option>";																		
									}							
								?>	
							</select>
						</div>

						<div id="formatoEquipeContainer" class="hidden">
							<label for="formato">Selecione o formato de sua equipe:</label>		
							<select id="formato" name="formato_equipe">
								<?php								
									// String SQL para selecionar a formato da equipe
									$sql3 = "SELECT * FROM formato_equipe";
									$consulta3 = $conn->query($sql3);
									
									while ($formato = $consulta3->fetch_assoc()){
										echo "<option value='".$formato['id_formato']."'>".$formato['formato']."</option>";																			
									}							
								?>	
							</select>						
						</div>

						<div id="formContainer" class="hidden">
							<div class="main-wrapper">
								<h3 class="centered-title">Formulário de Inscrição</h3>
								<label for="teamName">Nome da Equipe:</label>
								<input type="text" id="nome_equipe" name="nome_equipe" placeholder="Digite o nome da equipe">								
							</div>
						</div>
						<button type="submit">Enviar</button>
					</div>
				</form>
				
			</div>
		</section>		
		<!-- RODAPÉ -->
		<?php 
			include 'rodape.php';
		?>
		<!-- FIM RODAPÉ	 -->
	</div>
	<!-- 
    Essential Scripts
    =====================================-->


	<!-- Main jQuery -->
	<script src="plugins/jquery/jquery.js"></script>
	<!-- Bootstrap 4.3.1 -->
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Slick Slider -->
	<script src="plugins/slick-carousel/slick/slick.min.js"></script>
	<!--  Magnific Popup-->
	<script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	<!-- Form Validator -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
	
	<script src="js/script.js"></script>

</body>

</html>