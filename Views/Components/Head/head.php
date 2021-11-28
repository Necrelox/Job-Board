<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="icon" href="./ressources/logo/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../css/index.css">
    <link rel="stylesheet" href="./Views/Components/Footer/footer.css" type="text/css"/>
    <link rel="stylesheet" href="./Views/Components/Card/card.css" type="text/css"/>

    <?php
    $page = $_SERVER["REDIRECT_URL"];
    if (MainController::VerifConnected() === false)
        if ($page === "/Offer" || $page === "/Settings")
            $page = "/Home";

    $AllRoad = array(
        '/ApiUser' => '',
        '/ApiCompanie' => '',
        '/ApiAdvertisement' => '',
        '/Settings' => '',
        "/About" => '<link rel="stylesheet" href="./Views/Vabout/about.css" type="text/css"/>',
        "/Connect" => '<link rel="stylesheet" href="./Views/Vconnect/connect.css" type="text/css"/>',
        "/Contact" => '<link rel="stylesheet" href="./Views/Vcontact/contact.css" type="text/css"/>',
        "/Home" => '<link rel="stylesheet" href="./Views/Vhome/home.css" type="text/css"/>',
        "/" => '<link rel="stylesheet" href="./Views/Vhome/home.css" type="text/css"/>',
        "/Offer" => '<link rel="stylesheet" href="./Views/Voffer/offer.css" type="text/css"/>',
        "/Partner" => '<link rel="stylesheet" href="./Views/Vpartner/partner.css" type="text/css"/>',
        "/Register" => '<link rel="stylesheet" href="./Views/Vregister/register.css" type="text/css"/>',
    );
    if (array_key_exists($page, $AllRoad) === false)
        $page = "/Home";
    echo $AllRoad[$page];
    ?>

    <title>
        <?php
        echo explode("/", $page)[1];
        ?>
    </title>
</head>