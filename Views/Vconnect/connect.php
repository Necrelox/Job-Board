<section class="box" id="home">
    <div class="container">
        <div class="row">
            <?php  
                    if (MainController::VerifConnected()) {
                        echo '<div class="text-center animate__animated animate__zoomInDown margin_top"> <h1>Vous êtes connectés !</h1> </div>';                        
                        echo '<div class="card shadow-lg p-3 mb-5 bg-white margin_top animate__animated animate__hinge margin_top">';
                    }
                    else {
                        echo '<div class="text-center animate__animated animate__zoomInDown margin_top"> <h1>Bienvenue sur notre page de connexion !</h1> </div>';
                        echo '<div class="card shadow-lg p-3 mb-5 bg-white margin_top animate__animated animate__zoomInUp margin_top">';
                    }
            ?>
                <form method="POST" action="/Connect">
                    <div class="form_div margin_top">
                        <label for="RegisterEmail">Adresse email</label>

                        <?php if ($this->ErrorInvalidUser === 1) { ?>
                        <input name="email" type="email" class="form-control is-invalid" id="RegisterEmail" aria-describedby="emailHelp"
                               placeholder="Entrer votre email">
                        <?php }?>
                        <?php if ($this->Good === 1) { ?>
                        <input name="email" type="email" class="form-control is-valid" id="RegisterEmail" aria-describedby="emailHelp"
                               placeholder="Entrer votre email">
                        <?php }?>
                        <?php if ($this->ErrorInvalidUser !== 1 && $this->Good !== 1) { ?>
                        <input name="email" type="email" class="form-control" id="RegisterEmail" aria-describedby="emailHelp"
                            placeholder="Entrer votre email">
                        <?php }?>

                        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec
                            quelqu'un d'autre.<br></small>

                        <?php if ($this->ErrorInvalidUser === 1) { ?>
                            <input name="password" type="password" class="form-control is-invalid" id="exampleInputPassword1"
                                   placeholder="Mot de passe">
                        <?php }?>
                        <?php if ($this->Good === 1) { ?>
                            <input name="password" type="password" class="form-control is-valid" id="exampleInputPassword1"
                                   placeholder="Mot de passe">
                        <?php }?>
                        <?php if ($this->ErrorInvalidUser !== 1 && $this->Good !== 1) { ?>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Mot de passe">
                        <?php }

                        if ($this->ErrorInvalidUser === 1)
                            echo "<p>Erreur le mail ou le mot de passe est incorrect</p>";
                        ?>


                        <label class="margin_top" for="exampleInputPassword1">Mot de passe</label>

                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
                <div class="d-flex align-items-center justify-content-center">
                    Vous n'avez pas de compte ? &nbsp <a href="/Register"> Créez un compte ! </a>
                </div>
            </div>
        </div>
</section>