<?php

include_once("./Models/ApiUser.php");
include_once("./tools/MailManager.php");


class Register
{
    private $ERROR_NAME = -1;
    private $ERROR_EMAIL = -1; // 1 = erreur syntaxe && 2 = erreur mail exist
    private $ERROR_PASSWORD = -1; // 1 = erreur syntaxe

    private $isOk = 0;
    private function VerifName($name)
    {
        if (!(ctype_alpha($name)) || strlen($name) < 5 || strlen($name) > 16)
            $this->ERROR_NAME = 1;
        else
            $this->ERROR_NAME = 0;
    }

    private function VerifPassword($password, $ConfirmPassword)
    {
        $this->ERROR_PASSWORD = 0;
        if (strlen($password) < 5)
            $this->ERROR_PASSWORD = 1;
        if (preg_match_all("/[A-Z]/", $password) < 1)
            $this->ERROR_PASSWORD = 2;
        if (preg_match_all("/[0-9]/", $password) < 1)
            $this->ERROR_PASSWORD = 3;
        if ($password !== $ConfirmPassword)
            $this->ERROR_PASSWORD = 5;
    }

    private function VerifEmail($email)
    {
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
            $this->ERROR_EMAIL = 1;
        $ApiUser = new ApiUser();
        $find = $ApiUser->Read(json_encode(array ("email" => array(0 => $_POST['email']))));
        $array = json_decode($find, true);
        if (count($array) >= 1 && array_key_exists("email", $array[0]))
            $this->ERROR_EMAIL = 2;
        else
            $this->ERROR_EMAIL = 0;
        unset($ApiUser);
    }

    private function formRegister()
    {
        if (array_key_exists("name", $_POST))
            $this->VerifName($_POST['name']);
        if (array_key_exists("password", $_POST))
            $this->VerifPassword($_POST['password'], $_POST['ConfirmPassword']);
        if (array_key_exists("email", $_POST))
            $this->VerifEmail($_POST['email']);

        if ($this->ERROR_NAME === 0 && $this->ERROR_PASSWORD === 0 && $this->ERROR_EMAIL === 0) {
            $NewUser = array(
                "name" => htmlspecialchars(strip_tags($_POST['name'])),
                "password" => htmlspecialchars(strip_tags($_POST['password'])),
                "email" => htmlspecialchars(strip_tags($_POST['email']))
            );
            $json = json_encode($NewUser);
            $ApiUser = new ApiUser();
            $ApiUser->Create($json);
            unset($ApiUser);
            $ip = $_SERVER['SERVER_ADDR'];
            $msg = "Monsieur, " . htmlspecialchars(strip_tags($_POST['name']));
            $msg .= "\nVeuillez confirmer votre mail : " . $_POST['email'];
            $msg .= " en cliquant sur ce lien : \nhttp://$ip/Connect?h=" . hash("sha512", $_POST['email']);

            $this->isOk = MailManager::sendMail($_POST['email'], "JobBoard Confirmation Mail [Don't Reply]", $msg);
        }
    }

    public function __construct()
    {
        if (is_array($_POST) && !empty($_POST))
            $this->formRegister();
    }

    public function view()
    {
        if (MainController::VerifConnected() === true)
            echo "vous êtes connecté\n";
        else {
            require_once("./Views/Vregister/register.php");
        }
    }
}