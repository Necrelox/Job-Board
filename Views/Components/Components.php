<?php

class Components
{
    private $arrow;
    private $want;
    private $page;

    public function card($numberCard, $offset, $want, $AllRow)
    {
        $this->page = $_SERVER["REDIRECT_URL"];
        $this->want = $want;
        while ($numberCard > 0) {
            $this->arrow = $AllRow[$offset];
            $numberCard -=1;
            $offset -= 1;
            require("./Views/Components/Card/card.php");
        }
    }

    public static function AddComponent($who)
    {
        switch($who) {
            case "head":
                require_once("./Views/Components/Head/head.php");
                break;
            case "header":
                require_once("./Views/Components/Header/header.php");
                break;
            case "footer":
                require_once("./Views/Components/Footer/footer.php");
                break;

        }
    }

}
