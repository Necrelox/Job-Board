<?php

include_once("./Models/ApiAdvertisement.php");

class ApiAdvertisementController
{
    private $jsonRender;
    public function __construct($json)
    {
        $ApiAdvertisement = new ApiAdvertisement();
        $this->jsonRender = $ApiAdvertisement->Read($json);
        unset($ApiAdvertisement);
    }
    public function view()
    {
        require_once("./Views/API/ApiAdvertisement.php");
    }
}