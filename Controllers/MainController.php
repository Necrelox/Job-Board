<?php

require_once "About.php";
require_once "Connect.php";
require_once "Contact.php";
require_once "Home.php";
require_once "Offer.php";
require_once "Partner.php";
require_once "Register.php";
require_once "Settings.php";
require_once "ApiUserController.php";
require_once "ApiAdvertisementController.php";
require_once "ApiCompanieController.php";

class MainController
{
    public $render;
    private $page;

    public static function VerifConnected()
    {
        if ($_SESSION['connect'] === 1) {
            $ApiUser = new ApiUser();
            $find = $ApiUser->Read(json_encode(array("uuid" => array(0=>$_SESSION['uuid']))));
            $array = json_decode($find, true);
            unset($ApiUser);
            if (count($array) == 0)
                return false;
        } else
            return false;
        return true;
    }

    public static function VerifIsApi($page)
    {
        return explode('/', $page)[1] === "ApiUser" || explode('/', $page)[1] === "ApiAdvertisement" || explode('/', $page)[1] === "ApiCompanie";
    }

    private function ParseFlagsApi()
    {
        $FindFlags = explode('/', $this->page);
        $ArrayToFindForView = array();
        foreach ($FindFlags as $element)
            if (substr_count($element, '-') === 1) {
                if (!array_key_exists(explode('-', $element)[0], $ArrayToFindForView))
                    $ArrayToFindForView[explode('-', $element)[0]] = array();
                array_push($ArrayToFindForView[explode('-', $element)[0]], explode('-', $element)[1]);
            }
        return json_encode($ArrayToFindForView);
    }

    public static function disconnect_user()
    {
        $_SESSION["uuid"] = "";
        $_SESSION["connect"] = 0;
    }

    private function ControlApiRoad()
    {
        switch (explode('/', $this->page)[1]) {
            case "ApiUser":
                return new ApiUserController($this->ParseFlagsApi());
            case "ApiAdvertisement":
                return new ApiAdvertisementController($this->ParseFlagsApi());
            case "ApiCompanie":
                return new ApiCompanieController($this->ParseFlagsApi());
        }
    }

    private function ControlAllRoad()
    {
        switch ($this->page) {
            case "/About":
                return new About();
            case "/Connect":
                return new Connect();
            case "/Contact":
                return new Contact();
            case "/Offer":
                return new Offer();
            case "/Partner":
                return new Partner();
            case "/Register":
                return new Register();
            case "/Settings":
                return new Settings();
            default:
                return new Home();
        }
    }

    private function RoadControl()
    {
        if (self::VerifConnected() === false)
            if ($this->page === "/Offer" || $this->page === "/Settings")
                $this->page = "/Home";
        if (self::VerifIsApi($this->page) === true)
            return $this->ControlApiRoad();
        return $this->ControlAllRoad();
    }

    public function __construct()
    {
        $this->page = $_SERVER["REDIRECT_URL"];
        $this->render = $this->RoadControl();
    }

    public function __destruct()
    {
        unset($this->render);
    }
}