<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<div class="article_arrow">
    <span></span>
    <span></span>
    <span></span>
</div>
<section class="box" id="home">
    <div class="container">
        <div class="row">
            <div class="text-center animate__animated animate__zoomInDown">
                <h1 class="color_text_h1">Nos Entreprises partenaires</h1>
                <p>L’agence d’emploi orienté toutes activités en Principauté.</p>
            </div>
        </div>
</section>

<section id="home">
    <div class="container">
        <div class="row">
            <div class="profile-area">
                <div class="card-group">
                    <?php
                    $ApiCompanies = new ApiCompanie();
                    $AllRow = json_decode($ApiCompanies->Read(json_encode(array())), true);
                    $components = new Components();
                    $components->card(3, (count($AllRow)-1), "companies", $AllRow);
                    unset($Components);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>