/**
 * WEBSITE: https://themefisher.com
 * TWITTER: https://twitter.com/themefisher
 * FACEBOOK: https://www.facebook.com/themefisher
 * GITHUB: https://github.com/themefisher/
 */

(function ($) {
	'use strict';

	$(window).scroll(function () {
		if ($('.navigation').offset().top > 100) {
			$('.navigation').addClass('fixed-nav');
		} else {
			$('.navigation').removeClass('fixed-nav');
		}
	});


	$('.portfolio-gallery').each(function () {
		$(this).find('.popup-gallery').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	});


	$('#contact-form').validate({
		rules: {
			user_name: {
				required: true,
				minlength: 4
			},
			user_email: {
				required: true,
				email: true
			},
			// user_subject: {
			// 	required: false
			// },
			user_message: {
				required: true
			}
		},
		messages: {
			user_name: {
				required: 'Come on, you have a name don\'t you?',
				minlength: 'Your name must consist of at least 2 characters'
			},
			user_email: {
				required: 'Please put your email address'
			},
			user_message: {
				required: 'Put some messages here?',
				minlength: 'Your name must consist of at least 2 characters'
			}

		},
		submitHandler: function (form) {
			$(form).ajaxSubmit({
				type: 'POST',
				data: $(form).serialize(),
				url: 'sendmail.php',
				success: function () {
					$('#contact-form #success').fadeIn();
				},
				error: function () {

					$('#contact-form #error').fadeIn();
				}
			});
		}
	});



	$('.testimonial-slider').slick({
		slidesToShow: 1,
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 5000,
		dots: true
	});




	// Init Magnific Popup
	$('.portfolio-popup').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery: {
			enabled: true
		},
		mainClass: 'mfp-with-zoom',
		navigateByImgClick: true,
		arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
		tPrev: 'Previous (Left arrow key)',
		tNext: 'Next (Right arrow key)',
		tCounter: '<span class="mfp-counter">%curr% of %total%</span>',
		zoom: {
			enabled: true,
			duration: 300,
			easing: 'ease-in-out',
			opener: function (openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});
	
	
	
	// Código para o botão de competição e formulário
	//const competitionButton = document.getElementById('competitionButton');
	
	const formulario = document.getElementById('formulario');

	const categorySelectContainer = document.getElementById('categorySelectContainer');
	//Adicionei este para o formato da equipe
	const formatoEquipeContainer = document.getElementById('formatoEquipeContainer');
	//fim 
	const teste = document.getElementById('teste');

	const competicaoSelect = document.getElementById('competicao');
	const formContainer = document.getElementById('formContainer');
	const categorySelect = document.getElementById('category');
	const formatoSelect = document.getElementById('formato');
	const teamMembersContainer = document.getElementById('teamMembers');
	const addMemberButton = document.getElementById('addMemberButton');

	// // Mostrar o select de categorias ao clicar no botão da competição
	// competitionButton.addEventListener('click', () => {
	// 	categorySelectContainer.classList.remove('hidden');
	// });

	// Mostrar o select de categorias ao selecionar competição
	competicaoSelect.addEventListener('change',() =>{
		if (competicaoSelect.value) {
			categorySelectContainer.classList.remove('hidden');
			console.log('competição ==> ',competicaoSelect.value);
		} else {
			categorySelectContainer.classList.add('hidden');
		}
	});


	// Mostrar o select de formato de equipe ao selecionar uma categoria
	categorySelect.addEventListener('change', () => {
		if (categorySelect.value) {
			formatoEquipeContainer.classList.remove('hidden');
			console.log('categoria ==> ',categorySelect.value);
		} else {
			formatoEquipeContainer.classList.add('hidden');
		}
	});
	
	// Mostrar o formulário de inscrição ao selecionar o formato
	formatoSelect.addEventListener('change', () => {
	 	if (formatoSelect.value) {
			formContainer.classList.remove('hidden');
			console.log('formato ==> ',formatoSelect.value);
	  	} else {
	 		formContainer.classList.add('hidden');
	  	}
	});

	// Função para adicionar mais integrantes da equipe
	// addMemberButton.addEventListener('click', () => {
	// 	const memberCount = teamMembersContainer.children.length + 1;

	// 	const newMember = document.createElement('div');
	// 	newMember.classList.add('member');
	// 	newMember.innerHTML = `
	// 		<label for="name${memberCount}">Nome:</label>
	// 		<input type="text" id="name${memberCount}" name="name${memberCount}" placeholder="Nome do Integrante">
	// 		<label for="cpf${memberCount}">CPF:</label>
	// 		<input type="text" id="cpf${memberCount}" name="cpf${memberCount}" placeholder="CPF do Integrante">
	// 		<label for="email${memberCount}">E-mail:</label>
	// 		<input type="email" id="email${memberCount}" name="email${memberCount}" placeholder="E-mail do Integrante">
	// 	`;

	// 	teamMembersContainer.appendChild(newMember);
	// });

})(jQuery);