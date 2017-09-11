<?php
session_start();

$index = true;

require ("public/includes/dbconnection.php");
    $query = $conn->query('SELECT * FROM workshops');
    $workshops = $query->fetchAll();
    $query = $conn->query('SELECT * FROM services');
    $services = $query->fetchAll();
    $query = $conn->query('SELECT * FROM contacts');
    $contacts = $query->fetchAll();

    include ('public/includes/header.php');
?>
	<section id="workshops" class="gray-bg">
		<div class="container-fluid" style="padding: 0">
            <div class="row">
                <div class="col-lg-6 part">
                    <img src="public/resources/img/interior.jpeg" width="100%"/>
                </div>
                <div class="col-lg-6 part">
                    <h4>Pour voir nos réalisations intérieurs, cliquez sur le bouton ci-dessous.</h4>
                    <p><a href="interior.php">Intérieur</a></p>
                </div>
            </div>
		</div>
	</section>
    <section id="workshops" class="gray-bg">
        <div class="container-fluid" style="padding: 0">
            <div class="row">
                <div class="col-lg-6 part">
                    <h4>Pour voir nos réalisations extérieurs, cliquez sur le bouton ci-dessous.</h4>
                    <p><a href="exterior.php">Extérieurs</a></p>
                </div>
                <div class="col-lg-6 part">
                    <img src="public/resources/img/exterior.jpg" width="100%"/>
                </div>
            </div>
        </div>
    </section>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Nos services</h2>
				<h4 class="light muted text-red">Découvrez nos services ci-dessous.</h4>
			</div>
			
			<div class="row services">
                <?php
                foreach ($services as $service){
                    echo'
                        <div class="col-md-4">
                            <div class="service">
                                <div class="icon-holder">
                                    <img src="public/resources/' . $service['src'] . '" alt="" class="icon">
                                </div>
                                <h4 class="heading text-red">' . $service['label'] . '</h4>
                                <p class="description text-red"> ' . htmlentities( $service['description'], ENT_DISALLOWED, 'ISO-8859-1') . ' </p>
                            </div>
                        </div>   ';
                }
                ?>
			</div>
			
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="contacts" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Contact</h2>
				<h4 class="light muted text-red">Contactez-nous par téléphone, ou envoyer un courriel à tout moment.</h4>
			</div>
			<div class="row">
                <div class="col-md-2">

                </div>
                <?php

                    foreach ($contacts as $key => $contact){
                        $label = $contact['label'];
                        echo '
                            <div class="col-md-4">
                                <div class="service contact">
                                    <div class="icon-holder" style="background: #f7f7f7;">
                                        <img src="public/resources' . $contact['src'] . '" alt="" class="icon">
                                    </div>
                                    <h4 class="heading text-red">' . htmlentities($label, ENT_XHTML, 'ISO-8859-1') . ' </h4>
                                    <p class="description text-red">' . $contact['info'];
                                    if($key == 0) {
                                        echo ' <a href="#contact" data-toggle="modal" data-target="#messageModal" class="btn btn-red-fill expand">Cliquez ici</a>';
                                    }
                                    echo'</p>
                                    <br>
                                </div>
                            </div>';
                    }
                ?>
			</div>
		</div>
	</section>

    <!-- Scripts -->
    <script type="text/javascript">
        function modalFunction(img) {
            document.getElementById("modalImgId").setAttribute("src", "public/resources/img/work/" + img);
        }
    </script>

<?php
    include ('public/includes/footer.php');
?>