<section class="box" id="home">
    <div class="container">
        <div class="row">
            <div class="text-center animate__animated animate__zoomInDown margin_top">
                <?php
                if ($this->isOk !== true)
                    echo '<div class="text-center animate__animated animate__zoomInDown margin_top"> <h1>Bienvenue sur notre page enregistrement ! 🖊</h1> </div>';
                else {
                    echo '<div class="text-center animate__animated animate__zoomInDown margin_top"> <h1>Votre mail est pas confirmé veuillez vérifier votre boîte mail !</h1> </div>';
                }
                ?>

            </div>

            <?php
                if ($this->isOk !== true)
                    echo '<div class="card shadow-lg p-3 mb-5 bg-white margin_top animate__animated animate__zoomInUp">';
                else {
                    echo '<div class="card shadow-lg p-3 mb-5 bg-white margin_top animate__animated animate__hinge">';
                }
            ?>
                    <form method="POST" action="/Register">
                    <div class="form-group center">

                        <label for="RegisterName">Nom</label>
                        <?php if ($this->ERROR_NAME === 1) { ?>
                        <input name="name" required type="text" minlength="5" maxlength="16" class="form-control is-invalid" id="RegisterName" placeholder="Nom" value="<?= $_POST['name']?>">
                        <?php }?>
                        <?php if ($this->ERROR_NAME === 0) { ?>
                            <input name="name" required type="text" minlength="5" maxlength="16" class="form-control is-valid" id="RegisterName" placeholder="Nom" value="<?= $_POST['name'] ?>">
                        <?php }?>
                        <?php if ($this->ERROR_NAME === -1) { ?>
                        <input name="name" required type="text" minlength="5" maxlength="16" class="form-control" id="RegisterName" placeholder="Nom">
                        <?php }
                        if ($this->ERROR_NAME == 1)
                            echo "<p>Erreur le nom doit être entre 4 et 17 caracteres uniquement alphabetique</p>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="RegisterEmail">Email</label>

                        <?php if ($this->ERROR_EMAIL === 1|| $this->ERROR_EMAIL === 2) { ?>
                            <input name="email"  required type="email" class="form-control is-invalid" id="RegisterEmail" value="<?= $_POST['email'] ?>" placeholder="Entrer votre email">
                        <?php }?>
                        <?php if ($this->ERROR_EMAIL === 0) { ?>
                        <input name="email"  required type="email" class="form-control is-valid" id="RegisterEmail" value="<?= $_POST['email'] ?>" placeholder="Entrer votre email">
                        <?php }?>
                        <?php if ($this->ERROR_EMAIL === -1) { ?>
                        <input name="email"  required type="email" class="form-control" id="RegisterEmail" value="<?= $_POST['email'] ?>" placeholder="Entrer votre email">
                        <?php }

                        if ($this->ERROR_EMAIL === 1)
                            echo "<p>Erreur la syntaxe du mail est incorrect.</p>";
                        if ($this->ERROR_EMAIL === 2)
                            echo "<p>Erreur le mail est déjà utilisé.</p>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="RegisterPassword">Mot de passe</label>
                        <?php if ($this->ERROR_PASSWORD > 0) { ?>
                            <input minlength="5" name="password" required type="password" class="form-control is-invalid" minlength="6" id="RegisterPassword" placeholder="Mot de passe" autocomplete="new-password">
                        <?php }?>
                        <?php if ($this->ERROR_PASSWORD === 0) { ?>
                            <input minlength="5" name="password" value="<?= $_POST['password'] ?>" required type="password" class="form-control is-valid" minlength="6" id="RegisterPassword" placeholder="Mot de passe" autocomplete="new-password">
                        <?php }?>
                        <?php if ($this->ERROR_PASSWORD === -1) { ?>
                            <input minlength="5" name="password" required type="password" class="form-control" minlength="6" id="RegisterPassword" placeholder="Mot de passe" autocomplete="new-password">
                        <?php }
                        if ($this->ERROR_PASSWORD === 1)
                            echo "<p>Erreur le mot de passe est trop court, il doit être supérieur à 5 caractères et contenir une majuscule et un chiffre.</p>";
                        if ($this->ERROR_PASSWORD === 2)
                            echo "<p>Erreur le mot de passe ne contient pas de majuscule, il doit être supérieur à 5 caractères et contenir une majuscule et un chiffre.</p>";
                        if ($this->ERROR_PASSWORD === 3)
                            echo "<p>Erreur le mot de passe ne contient pas de chiffre, il doit être supérieur à 5 caractères et contenir une majuscule et un chiffre.</p>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="ConfirmRegisterPassword">Confirmation du mot de passe</label>

                        <?php if ($this->ERROR_PASSWORD > 0) { ?>
                            <input minlength="5" name="ConfirmPassword" required type="password" class="form-control is-invalid" minlength="6" id="ConfirmRegisterPassword" placeholder="Confirmer votre mot de passe" autocomplete="new-password">
                        <?php }?>
                        <?php if ($this->ERROR_PASSWORD === 0) { ?>
                            <input minlength="5" name="ConfirmPassword" value="<?= $_POST['ConfirmPassword'] ?>" required type="password" class="form-control is-valid" minlength="6" id="ConfirmRegisterPassword" placeholder="Confirmer votre mot de passe" autocomplete="new-password">
                        <?php }?>
                        <?php if ($this->ERROR_PASSWORD === -1) { ?>
                            <input minlength="5" name="ConfirmPassword" required type="password" class="form-control" minlength="6" id="ConfirmRegisterPassword" placeholder="Confirmer votre mot de passe" autocomplete="new-password">
                        <?php }?>

                        <?php
                        if ($this->ERROR_PASSWORD === 5)
                            echo "<p>Erreur le mot de passe confirmer n'est pas le même.</p>";
                        ?>
                    </div>
                    <button class="btn btn-primary" type="submit">S'enregistrer</button>
                </form>
            </div>
        </div>
</section>