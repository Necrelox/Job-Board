<?php

include_once("./Models/ApiCompanie.php");

class ApiCompanieController
{
    private $jsonRender;
    public function __construct($json)
    {
        $ApiCompanie = new ApiCompanie();
        $this->jsonRender = $ApiCompanie->Read($json);
        unset($ApiCompanie);
    }

    public function view()
    {
        require_once("./Views/API/ApiCompanie.php");
    }
}