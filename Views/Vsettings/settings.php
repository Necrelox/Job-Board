
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            Email :
            <?=$this->rowUser[0]["email"]?>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                modifier le mail
            </button>
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Changement d'adresse mail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/Settings">
                            <div class="modal-body">
                                <label for="SettingsEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="SettingsEmail" name="SettingsEmail" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            Password : ********
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                modifier le mot de passe
            </button>
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel2">Changement de mot de passe</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/Settings">
                            <div class="modal-body">
                                <label for="SettingsMdp" class="form-label">Mot de passe actuel</label>
                                <input type="password" class="form-control" id="SettingsMdp" name="SettingsMdp" required>
                                <label for="SettingsMdp1" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="SettingsMdp1" name="SettingsMdp1" required>
                                <label for="SettingsMdp2" class="form-label">confirmation</label>
                                <input type="password" class="form-control" id="SettingsMdp2" name="SettingsMdp2" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            Phone :
            <?=$this->rowUser[0]["phone"]?>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                modifier le téléphone
            </button>

            <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modifier le téléphone</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/Settings">
                            <div class="modal-body">
                                <label for="SettingsPhone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="SettingsPhone" name="SettingsPhone" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            Companie :
            <?php
            $ApiCompanie = new ApiCompanie();
            $who = json_decode($ApiCompanie->Read(json_encode(array("id"=>array(0=>$this->rowUser[0]["companie_id"])))), true);
            echo $who[0]['name'];
            unset($ApiCompanie);

            ?>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                Ajouter une companie
            </button>

            <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter la companie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/Settings">
                            <div class="modal-body">

                                <label for="AddNameCompanie" class="form-label">Companie</label>
                                <input type="text" class="form-control" id="AddNameCompanie" name="AddNameCompanie">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger" name="LeaveCompanie">Quitter</button>
                                <button type="submit" class="btn btn-primary" name="AddCompanie">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                    Crée une companie
                </button>

                <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Créer la companie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/Settings">
                                <div class="modal-body">
                                    <label for="CreateNameCompanie" class="form-label">Nom de la Companie</label>
                                    <?php
                                    if ($this->ErrorNameCompanie === 1) {
                                        ?>
                                        <input type="text" class="form-control is-invalid" id="CreateNameCompanie" name="CreateNameCompanie" required>
                                        <small><p>Erreur le nom de l'entreprise est trop court.</p></small>

                                    <?php }
                                    if ($this->ErrorNameCompanie === 2) {
                                        ?>
                                        <input type="text" class="form-control is-invalid" id="CreateNameCompanie" name="CreateNameCompanie" required>
                                        <small><p>Erreur l'entreprise existe déjà.</p></small>

                                    <?php }
                                    if ($this->ErrorNameCompanie === 0) {
                                        ?>
                                        <input type="text" class="form-control" id="CreateNameCompanie" name="CreateNameCompanie" required>
                                    <?php } ?>

                                    <label for="CreateDescCompanie" class="form-label">Description Companie</label>
                                    <textarea type="text" class="form-control" id='CreateDescCompanie' name="CreateDescCompanie" required> </textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" name="CreateCompanie">Creer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

