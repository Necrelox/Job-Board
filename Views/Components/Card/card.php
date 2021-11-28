<script>
    AOS.init();
</script>
<div class="col-md-4 box-job">
    <div data-aos="fade-up" data-aos-duration="3000">
        <div class="card">
            <div class="img1"> <img src="../../ressources/job/default.jpg" alt=""></div>
            <div class="img2"><img src="../../ressources/job/logo_epitech_interim.png" alt=""></div>
            <?php if ($this->want === "advertisement") {?>
                <div class="main-text">
                    <h2 class="text"> <?= $this->arrow["name"] ?></h2>

                    <?php if ($this->page === "/Partner" || $this->page === "/Offer") {?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo '#staticBackdrop' . $this->arrow['id']; ?>">
                                        Mettre à jour
                                    </button>

                                    <div class="modal fade" id="<?php echo 'staticBackdrop' . $this->arrow['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id='<?= $this->arrow["id"] . "1001" ?>'>Modication du job :<span class="color_text_h1"> <?= $this->arrow["name"] ?></span></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <form method="POST" action="/Offer">
                                                    <div class="modal-body">
                                                        <label for="id='<?= $this->arrow["id"] . "1002" ?>'" class="form-label font_bold">Nom du job</label>
                                                        <input type="text" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>' value='<?php echo $this->arrow["name"]?>' name="ModifJobName" required/>

                                                        <label for="id='<?= $this->arrow["id"] . "1003" ?>'" class="form-label font_bold">Description</label>
                                                        <textarea type="text" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>' name="ModifDescription" required><?php echo $this->arrow["description"]?></textarea>

                                                        <label for="id='<?= $this->arrow["id"] . "1004" ?>'" class="form-label font_bold">Date</label>
                                                        <input type="datetime-local" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>' value='<?php echo $this->arrow["date"]?>' name="ModifDate" required/>

                                                        <label for="id='<?= $this->arrow["id"] . "1004" ?>'" class="form-label font_bold">Salaire</label>
                                                        <input type="text" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>' value='<?php echo $this->arrow["wage"]?>' placeholder="Salaire" name="ModifWage" required/>
                                                        <input type="hidden" name="updateID" value='<?= $this->arrow["id"]?>'/>
                                                    </div>
                                                    <div class="modal-footer center_button">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary" name="ModifySave" '>Sauvegarder</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <form action="/Offer" method="POST">
                                        <input type="hidden" name="updateID" value='<?= $this->arrow["id"]?>'/>
                                        <button type="submit" class="btn btn-danger" data-dismiss="alert" name="DeleteAdvertisement" aria-label="Close"><span aria-hidden="true">Supprimer</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="show_none" id='<?=$this->arrow["id"] ?>'>
                        <p class="color_text_h1 margin_text">Description : <?php echo $this->arrow["description"]?> </p>
                        <p>Date : <?php echo $this->arrow["date"]?> </p>
                        <p>Salaire : <?php echo $this->arrow["wage"]?> </p>
                    </div>
                </div>
            <?php } else if ($this->want === "companies"){?>
            <div class="main-text">
                <h2 class="text"> <?= $this->arrow["name"] ?></h2>
                <div class="show_none" id='<?=$this->arrow["id"] ?>'>
                    <p class="color_text_h1 margin_text">Description : <?php echo $this->arrow["description"]?> </p>
                </div>
            </div>
            <?php } ?>
            <script type="text/javascript" src="./Views/Components/Card/LearnMore.js"></script>
            <button type="button" class="btn btn-info" onclick="LearnMoreActivate('<?=$this->arrow['id'] ?>')">learn more</button>
        </div>
    </div>
</div>

