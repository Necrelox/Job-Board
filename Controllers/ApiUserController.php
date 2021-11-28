<?php

include_once("./Models/ApiUser.php");

class ApiUserController
{
    private $jsonRender;
    public function __construct($json)
    {
        $ApiUser = new ApiUser();
        $this->jsonRender = $ApiUser->Read($json);
        unset($ApiUser);
    }
    public function view()
    {
        require_once("./Views/API/ApiUser.php");
    }
}