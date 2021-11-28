<?php

class Settings
{
    private $rowUser;
    private $ErrorNameCompanie = 0;

    private function VerifAndChangePhone($ApiUser)
    {
        if (array_key_exists("SettingsPhone", $_POST))
            $ApiUser->Update(json_encode(array("uuid" => array(0=>$_SESSION["uuid"]))), json_encode(array("phone" => array(0=>$_POST["SettingsPhone"]))));
    }

    private function VerifAndChangePassword($rowUser, $ApiUser)
    {
        if (array_key_exists("SettingsMdp", $_POST))
            if ($rowUser[0]["password"] === hash("sha512", $_POST["SettingsMdp"]))
                if ($_POST["SettingsMdp1"] === $_POST["SettingsMdp2"])
                    if (strlen($_POST["SettingsMdp1"]) >= 5 && preg_match_all("/[A-Z]/", $_POST["SettingsMdp1"]) >= 1 && preg_match_all("/[0-9]/", $_POST["SettingsMdp1"]) >= 1)
                        $ApiUser->Update(json_encode(array("uuid" => array(0=>$_SESSION["uuid"]))), json_encode(array("password" => array(0=>hash("sha512", $_POST["SettingsMdp1"])))));
    }

    private function VerifAndChangeEmail($ApiUser)
    {
        if (array_key_exists("SettingsEmail", $_POST)) {
            $ApiUser->Update(json_encode(array("uuid" => array(0=>$_SESSION["uuid"]))), json_encode(array("email" => array(0=> $_POST["SettingsEmail"]), "status" => array(0=>0), "hash" => array(0=>hash("sha512", $_POST['SettingsEmail'])))));
            $_SESSION['uuid'] = "";
            $_SESSION["connected"] = 0;
        }
    }

    private function VerifNameCompanie($name, $ApiCompanie)
    {
        $check = json_decode($ApiCompanie->Read(json_encode(array("name"=>array(0=>$name)))), true);
        if (count($check) > 0) {
            $this->ErrorNameCompanie = 2;
            return false;
        }
        return !(ctype_alpha($name)) || strlen($name) < 4 ? false : true;
    }

    private function VerifCreateCompanie($ApiCompanie)
    {
        if (array_key_exists("CreateCompanie", $_POST)) {
            if (array_key_exists("CreateNameCompanie", $_POST) && array_key_exists("CreateDescCompanie", $_POST)) {
                if ($this->VerifNameCompanie($_POST["CreateNameCompanie"], $ApiCompanie) === true)
                    $ApiCompanie->Create(json_encode(array("name"=>$_POST["CreateNameCompanie"], "description"=>$_POST["CreateDescCompanie"])));
                else
                    $this->ErrorNameCompanie = $this->ErrorNameCompanie == 0 ? 1 : $this->ErrorNameCompanie;
            }
        }
    }

    private function VerifAddCompanie($ApiUser, $ApiCompanie)
    {
        if (array_key_exists("AddCompanie", $_POST)) {
            $GetCompanie = json_decode($ApiCompanie->Read(json_encode(array("name"=>array("0"=>$_POST["AddNameCompanie"])))), true);
            if (count($GetCompanie) === 1) {
                $ApiUser->Update(json_encode(array("uuid"=>array(0=>$_SESSION["uuid"]))), json_encode(array("companie_id"=>array(0=>$GetCompanie[0]["id"]))));
            }
        }

        if (array_key_exists("LeaveCompanie", $_POST)) {
            $ApiUser->Update(json_encode(array("uuid"=>array(0=>$_SESSION["uuid"]))), json_encode(array("companie_id"=>array(0=>NULL))));
        }
    }

    private function VerifForm()
    {
        if (is_array($_POST) && !empty($_POST)) {
            $ApiUser = new ApiUser();
            $ApiCompanie = new ApiCompanie();
            $this->rowUser = json_decode($ApiUser->Read(json_encode(array("uuid" => array(0 => $_SESSION["uuid"])))), true);
            $this->VerifAndChangeEmail($ApiUser);
            $this->VerifAndChangePassword($this->rowUser, $ApiUser);
            $this->VerifAndChangePhone($ApiUser);

            $this->VerifCreateCompanie($ApiCompanie);
            $this->VerifAddCompanie($ApiUser, $ApiCompanie);
            unset($ApiCompanie);
            unset($ApiUser);
        }
    }

    public function __construct()
    {
        if (MainController::VerifConnected() === true)
            $this->VerifForm();
    }

    public function view()
    {
        require_once("./Views/Vsettings/settings.php");
    }
}