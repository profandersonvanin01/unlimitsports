<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="GYm,fitness,business,company,agency,multipurpose,modern,bootstrap4">  
    <meta name="author" content="Themefisher.com">
    <title>GymFit| Fitness template</title>
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
              <!-- <h1 class="text-lg text-white mt-2">INSCRIÇÃO FINALIZADA</h1> -->
            </div>
          </div>
        </div>
      </section>
      <!-- contact form start -->
      <section class="contact-form section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <div class="section-title">
                <div class="divider mb-3"></div>
                <h2>INSCRIÇÃO FINALIZADA</h2>
                <div class="divider mb-3"></div>
                <p class="mt-3">Sua equipe foi inscrita com sucesso! Deseja Inscrever outra equipe?</p>
                <div class="row">
                  <div class="col-6">
                    <a href="competicoes.php">SIM</a>
                  </div>
                  <div class="col-6">
                  <a href="index.php">NÃO</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="row justify-content-center pb-5">
            <div class="col-lg-9 text-center">
              <form id="contact-form">
                <div class="form-row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <input name="user_name" type="text" class="form-control" placeholder="Your Name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <input name="user_email" type="text" class="form-control" placeholder="Email Address">
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group-2">
                      <textarea name="user_message" class="form-control" rows="8" placeholder="Your Message"></textarea>
                    </div>

                    <div class="text-center">
                      <button class="btn btn-main mt-3 " type="submit">Send Message</button>
                    </div>
                  </div>
                </div>
                <div class="error" id="error">Sorry Msg dose not sent</div>
                <div class="success" id="success">Message Sent</div>
              </form>
            </div>
          </div> -->
        </div>
      </section>

      <!-- RODAPÉ -->
      <?php 
        include 'rodape.php';
      ?>
      <!-- FIM RODAPÉ	 -->
    </div>
  
    <!-- SCRIPTS -->
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!--  Magnific Popup-->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Form Validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="plugins/google-map/gmap.js"></script>

    <script src="js/script.js"></script>

  </body>

</html>