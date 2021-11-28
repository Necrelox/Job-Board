<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<section id="home">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo '#staticBackdropcre' . $this->arrow['id']; ?>">
                        Creer un Job
                    </button>

                    <div class="modal fade" id="<?php echo 'staticBackdropcre' . $this->arrow['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id='<?= $this->arrow["id"] . "1001" ?>'>Création du job :</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/Offer">
                                    <div class="modal-body">
                                        <label for="id='<?= $this->arrow["id"] . "2002" ?>'" class="form-label font_bold">Nom du job</label>
                                        <input type="text" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>' name="CreateJobName" required/>

                                        <label for="id='<?= $this->arrow["id"] . "2003" ?>'" class="form-label font_bold">Description</label>
                                        <textarea type="text" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>' name="CreateJobDescription" required></textarea>

                                        <label for="id='<?= $this->arrow["id"] . "3004" ?>'" class="form-label font_bold">Date</label>
                                        <input type="datetime-local" class="form-control" id='<?= $this->arrow["id"] . "1000" ?>'name="CreateJobDate" required/>

                                        <label for="id='<?= $this->arrow["id"] . "4004" ?>'" class="form-label font_bold">Salaire</label>
                                        <input type="text" class="form-control" id='<?= $this->arrow["id"] . "5000" ?>'placeholder="Salaire" name="CreateJobWage" required/>
                                        <input type="hidden" name="updateID" value='<?= $this->arrow["id"]?>'/>
                                    </div>
                                    <div class="modal-footer center_button">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary" name="CreateJob" '>Creer</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="profile-area">
                <div class="card-group">
                    <?php
                    $ApiAdvertisement = new ApiAdvertisement();
                    $AllRow = json_decode($ApiAdvertisement->Read(json_encode(array())), true);
                    $components = new Components();
                    $components->card(count($AllRow), (count($AllRow)-1), "advertisement", $AllRow);
                    unset($Components);
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>