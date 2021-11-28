<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Home">
                <img src="../../../ressources/logo/logo-nav2.png" alt="" width="150" height="65">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link active" href="/Home">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <?php
                        $page = $_SERVER["REDIRECT_URL"];
                        if (MainController::VerifConnected() === true)
                            echo '<a class="nav-link" href="/Offer">Offres d’emploi</a>';
                        ?>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Entreprise
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/About">Pourquoi Epitech Interim ?</a></li>
                            <li> </li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/Partner">Les entreprises partenaire</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Contact">Contact</a>
                    </li>
                </ul>

                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                </form>

                <div class="navbar-nav">
                    <?php
                    if (MainController::VerifConnected() === false)
                        echo '<a href="/Connect" class="ChangeTitle nav-item nav-link">Connexion</a>';
                    else { ?>
                        <div class="dropdown">
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../../ressources/logo/connect.gif" width="50" height="50">
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <form action="/Settings" method="POST">
                                        <input type="submit" class="dropdown-item" value="Paramètre" name="settings">
                                    </form>
                                    <form action="/Connect" method="POST">
                                        <input type="submit" class="dropdown-item" value="Déconnexion" name="disconnect">
                                    </form>
                                </div>
                            </li>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<script type="text/javascript" src="./Views/Components/Header/DisconnectButton.js"></script>