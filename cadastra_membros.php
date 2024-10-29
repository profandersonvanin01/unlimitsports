<?php
	include 'conecta.php';
	$nome_equipe = $_GET['nome_equipe'];
	$id_formato = $_GET['id_formato'];
?>

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
							<h2>Cadastre os membros da Equipe: </h2>
							<div class="divider mb-3"></div>
							<h2><b><?php echo $nome_equipe; ?></b></h2>
							<div class="divider mb-3"></div>
						</div>
					</div>
				</div>
				<!-- Recuperar o ID da equipe e outros dados da equipe  -->
				<?php
					$sql = "SELECT * FROM equipe WHERE nome_equipe = '$nome_equipe'";
					$consulta = $conn->query($sql);					
					while ($dados = $consulta->fetch_assoc()){
						$id_equipe = $dados['id_equipe'];
						$nome_equipe = $dados['nome_equipe'];
						$id_competicao = $dados['fk_competicao_id_competicao'];						
					}

					// recuperar a quantidade (formato) de membros da equipe
					$sql2 = "SELECT qtde FROM formato_equipe WHERE id_formato = '$id_formato'";
					$consulta2 = $conn->query($sql2);					
					while ($dados2 = $consulta2->fetch_assoc()){
						$qtde = $dados2['qtde'];											
					}
					// Aqui você pode passar o valor para JavaScript
					echo "<p>Total de Membros da Equipe:</p>";
    				echo "<p id='formato'>$qtde</p>";
				?>

				<form id="formulario" action="finaliza_inscricao.php?id_equipe=<?php echo $id_equipe;?>" method="POST">
					<div class="container">
						
						<div id="formContainer">
							<div class="main-wrapper">																
								<h4>Integrantes da Equipe</h4>

								<button type="button" onclick="gerarInputs()">Cadastrar</button>
								<div class="divider mb-3"></div>

								<!-- Container onde os inputs serão inseridos dinamicamente -->
								<div id="membros"><div>	

								<script>
									let inputsFilled = 0; // Contador de inputs preenchidos
									function gerarInputs() {
										// Obtém o valor selecionado no select
										const qtde = parseInt(document.getElementById('formato').textContent);
										console.log('Inputs ==> ',qtde);
										const inputsContainer = document.getElementById('membros');
										
										// Limpa o container para evitar duplicação de inputs
										inputsContainer.innerHTML = '';
										inputsFilled = 0; // Resetar o contador

										// Cria a quantidade de inputs especificada
										for (let i = 1; i <= qtde; i++) {
											// Cria o rótulo e o campo de input para Nome
											const labelNome = document.createElement('label');
											labelNome.setAttribute('for', 'nome_' + i);
											labelNome.textContent = `Nome do membro ${i}:`;
											
											const inputNome = document.createElement('input');
											inputNome.setAttribute('type', 'text');
											inputNome.setAttribute('name', 'membro_nome[]');
											inputNome.setAttribute('id', 'nome_' + i);
											inputNome.setAttribute('placeholder', `Nome do membro ${i}`);
											inputNome.oninput = function() {
												this.value = this.value.toUpperCase(); // Converte para maiúsculas
												checkInputs(); // Chama a função de validação
											};
											
											// Cria o rótulo e o campo de input para CPF
											const labelCpf = document.createElement('label');
											labelCpf.setAttribute('for', 'cpf_' + i);
											labelCpf.textContent = `CPF do membro ${i}:`;
											
											const inputCpf = document.createElement('input');
											inputCpf.setAttribute('type', 'text');
											inputCpf.setAttribute('name', 'membro_cpf[]');
											inputCpf.setAttribute('id', 'cpf_' + i);
											inputCpf.setAttribute('placeholder', `DIGITE SOMENTE NÚMEROS`);

											// Aplicar máscara ao CPF
											$(inputCpf).mask('000.000.000-00');

											inputCpf.oninput = checkInputs; // Adiciona o evento de validação
											
											// Cria o rótulo e o campo de input para E-mail
											const labelEmail = document.createElement('label');
											labelEmail.setAttribute('for', 'email_' + i);
											labelEmail.textContent = `E-mail do membro ${i}:`;
											
											const inputEmail = document.createElement('input');
											inputEmail.setAttribute('type', 'email');
											inputEmail.setAttribute('name', 'membro_email[]');
											inputEmail.setAttribute('id', 'email_' + i);
											inputEmail.setAttribute('placeholder', `E-mail do membro ${i}`);

											inputEmail.oninput = checkInputs; // Adiciona o evento de validação
											
											// Adiciona os rótulos e os inputs ao container
											inputsContainer.appendChild(labelNome);
											inputsContainer.appendChild(inputNome);
											inputsContainer.appendChild(document.createElement('br')); // Quebra de linha para layout
											
											inputsContainer.appendChild(labelCpf);
											inputsContainer.appendChild(inputCpf);
											inputsContainer.appendChild(document.createElement('br')); // Quebra de linha para layout
											
											inputsContainer.appendChild(labelEmail);
											inputsContainer.appendChild(inputEmail);
											inputsContainer.appendChild(document.createElement('br')); // Quebra de linha para layout
											
											inputsContainer.appendChild(document.createElement('br')); // Quebra de linha para separar membros
										}

										checkInputs(); // Chama a função para verificar inputs na geração inicial
									}
									function checkInputs() {
										const inputs = document.querySelectorAll('#membros input');
										inputsFilled = Array.from(inputs).filter(input => input.value).length;

										// Se todos os inputs estiverem preenchidos, mostra o botão
										if (inputsFilled === inputs.length) {
											document.getElementById('submitBtn').style.display = 'block';
										} else {
											document.getElementById('submitBtn').style.display = 'none';
										}
									}
								</script>
							</div>
						</div>
						<button type="submit" id="submitBtn" style="display:none;">Enviar</button>
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
	<!-- Mascara CPF -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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