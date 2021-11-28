<?php

include_once("./Models/ApiUser.php");
include_once("./tools/MailManager.php");

class Connect
{
    private $ErrorInvalidUser = 0;
    private $Good = 0;
    private $confirmMail = 0;

    private function VerifMailConfirmed()
    {
        if (array_key_exists("h", $_GET)) {
            $ApiUser = new ApiUser();
            $Find = $ApiUser->Read(json_encode(array("hash" => array(0=>$_GET["h"]))));
            $FindArray = json_decode($Find, true);

            if (count($FindArray) === 1 && $_GET["h"] == $FindArray[0]["hash"]) {
                $this->confirmMail = 1;
                $ApiUser->Update(json_encode(array("hash" => array(0=>$_GET["h"]))), json_encode(array("status" => array(0=>1))));
            }
            unset($ApiUser);
        }
        else $this->confirmMail = 0;
    }

    private function ConnectUser()
    {
        if (count($_POST) === 2 && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)) {
            $SearchStatus = array(
                "email" => array(0=>$_POST["email"]),
                "password" => array(0=>hash("sha512", $_POST["password"])),
                "status" => array(0=>1)
            );
            $Search = array(
                "email" => array(0=>$_POST["email"]),
                "password" => array(0=>hash("sha512", $_POST["password"]))
            );

            $ApiUser = new ApiUser();
            $find = $ApiUser->Read(json_encode($Search));
            $findArray = json_decode($find, true);
            $findWithStatus = $ApiUser->Read(json_encode($SearchStatus));
            $findArrayWithStatus = json_decode($findWithStatus, true);

            if (count($findArray) === 1) {
                if (count($findArrayWithStatus) === 1) {
                    $_SESSION["uuid"] = $findArrayWithStatus[0]["uuid"];
                    $_SESSION["connect"] = 1;
                    $this->Good = 1;
                } else {
                    $_SESSION["connect"] = 0;
                    $this->confirmMail = -1;
                    $ip = $_SERVER['SERVER_ADDR'];
                    $msg = "Monsieur, " . htmlspecialchars(strip_tags($findArray[0]['name']));
                    $msg .= "\nVeuillez confirmer votre mail : " . $findArray[0]['email'];
                    $msg .= " en cliquant sur ce lien : \nhttp://$ip/Connect?h=" . hash("sha512", $_POST['email']);
                    MailManager::sendMail($_POST['email'], "JobBoard Confirmation Mail [Don't Reply]", $msg);
                }
            }
            else {
                $this->ErrorInvalidUser = 1;
            }
        }
        unset($ApiUser);
    }

    public function __construct()
    {
        if (!empty($_GET))
            $this->VerifMailConfirmed();
        if (is_array($_POST) && !empty($_POST))
            $this->ConnectUser();
    }

    public function view()
    {
        if ($this->confirmMail === 1) {
            echo "Votre mail a été confirmé\n";
            $this->confirmMail = 0;
        }
        if ($this->confirmMail === -1)
            echo "Votre mail n'a pas été confirmé veuillez vérifier votre boîte mail.";
        else
            require_once("./Views/Vconnect/connect.php");
    }
}