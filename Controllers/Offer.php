<?php

include_once("./Models/ApiUser.php");

class Offer
{
    private $UserNotHasCompanie = 0;
    private function ModifyAdvertisement()
    {
        if (array_key_exists("ModifJobName", $_POST) AND array_key_exists("ModifDescription", $_POST) AND
            array_key_exists("ModifDate", $_POST) AND array_key_exists("ModifWage", $_POST))
        {
            $ApiAdvertisement = new ApiAdvertisement();
            $updateRequest = array("name" => array(0=>$_POST["ModifJobName"]),
                "description" => array(0=>$_POST["ModifDescription"]),
                "date" => array(0=>$_POST["ModifDate"]),
                "wage" => array(0=>$_POST["ModifWage"]));
            $ApiAdvertisement->Update(json_encode(array("id"=>array(0=>$_POST["updateID"]))), json_encode($updateRequest));
            unset($ApiAdvertisement);
        }
    }

    private function DeleteAdvertisement()
    {
        $ApiAdvertisement = new ApiAdvertisement();
        $ApiAdvertisement->Delete(json_encode(array("id" => array(0=>$_POST["updateID"]))));
        unset($ApiAdvertisement);
    }

    private function VerifModifyFormReceived()
    {
        if (is_array($_POST) && !empty($_POST))
            if (array_key_exists("ModifySave", $_POST))
                return true;
        return false;
    }

    private function VerifDeleteFormReceived()
    {
        if (is_array($_POST) && !empty($_POST))
            if (array_key_exists("DeleteAdvertisement", $_POST))
                return true;
        return false;
    }

    private function VerifCreateFormReceived()
    {
        if (is_array($_POST) && !empty($_POST))
            if (array_key_exists("CreateJob", $_POST))
                return true;
        return false;
    }

    private function CreateAdvertisement()
    {
        if (array_key_exists("CreateJobName", $_POST) && array_key_exists("CreateJobDescription", $_POST)
            && array_key_exists("CreateJobDate", $_POST) && array_key_exists("CreateJobWage", $_POST)) {
            $ApiUser = new ApiUser();
            $row = json_decode($ApiUser->Read(json_encode(array("uuid"=>array(0=>$_SESSION["uuid"])))), true);
            if (!isset($row[0]["companie_id"]))
                $this->UserNotHasCompanie = 1;
            else {
                $ApiAdvertisement = new ApiAdvertisement();
                $ApiAdvertisement->Create(json_encode(array("name"=>$_POST["CreateJobName"],
                        "description"=>$_POST["CreateJobDescription"], "date"=>$_POST["CreateJobDate"],
                    "wage"=>$_POST["CreateJobWage"], "uuid"=>$_SESSION["uuid"], "companie_id"=>$row[0]["companie_id"])));
                unset($ApiAdvertisement);
            }
            unset($ApiUser);
        }
    }

    public function __construct()
    {

        if ($this->VerifModifyFormReceived())
            $this->ModifyAdvertisement();
        if ($this->VerifDeleteFormReceived())
            $this->DeleteAdvertisement();
        if ($this->VerifCreateFormReceived())
            $this->CreateAdvertisement();


    }

    public function view()
    {
        require_once("./Views/Voffer/offer.php");
    }
}