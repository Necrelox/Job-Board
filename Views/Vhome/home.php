<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<section class="box-1" id="home">
    <div class="container">
        <div class="row">
            <div class="text-center animate__animated animate__zoomInDown">
                <img class="img-home" src="../../ressources/home/logo_epitech_interim.png">
                <h1>Bienvenue sur Epitech Interim</h1>
                <p>Avec Epitech interim trouver votre prochain emploi n'a jamais été aussi simple</p>
            </div>
        </div>
</section>

<section id="home" class="box-2">
    <div class="container">
        <div class="row">
            <div class="profile-area">
                <div class="text-center" data-aos="zoom-in">
                    <h2>Les Dernières Offres</h2>
                    <div class="card-group">
                        <?php
                        $ApiAdvertisement = new ApiAdvertisement();
                        $AllRow = json_decode($ApiAdvertisement->Read(json_encode(array())), true);
                        $components = new Components();
                        $components->card(3, (count($AllRow)-1), "advertisement", $AllRow);
                        unset($Components);
                        ?>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="3000">
                        <a href="/Offer"
                            class="margauto btn btn-secondary animate__animated animate__jackInTheBox rounded-pill"
                            role="button">Toutes les offres</a>
                        <?php  if (MainController::VerifConnected()) {
                            echo '<a href="/Offer" class="margauto btn btn-secondary animate__animated animate__jackInTheBox rounded-pill" role="button">Creer une offre</a>';
                            }?>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>