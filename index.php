<?php
require_once "./Controllers/MainController.php";
session_start();
if (!isset($_SESSION['connect']))
  $_SESSION['connect'] = 0;
if (!isset($_SESSION['uuid']))
    $_SESSION['uuid'] = "";
if (isset($_POST['disconnect'])) {
    MainController::disconnect_user();
    header("LOCATION: http://sand.box/Home");
}
?>

<html lang="fr">

<?php
    require_once("./Views/Components/Components.php");
    $MainController = new MainController();
    Components::AddComponent("head");
?>

<body>
    <?php Components::AddComponent("header");?>

    <section id="page">
        <?php
        $MainController->render->view();
        unset($MainController);
        ?>
    </section>
    <?php Components::AddComponent("footer");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"> </script>
</body>
</html>