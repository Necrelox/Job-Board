<?php

abstract class DbConnect
{
    protected $db;

    abstract public function Create($json);
    abstract public function Read($json);
    abstract public function Update($jsonToSearch, $jsonToUpdate);
    abstract public function Delete($json);

    protected function CreateSetRequest($filterValid, $ArrayToUpdate)
    {
        $request = "";
        $key = 0;
        for ($i = 0; $i < count($filterValid); $i++) {
            if (array_key_exists($filterValid[$i], $ArrayToUpdate) === true) {
                if ($key === 0)
                    $key = 1;
                else if ($key === 1)
                    $request .= ",";
                if ($ArrayToUpdate[$filterValid[$i]][0] === null)
                    $request .= " " . $filterValid[$i] . " = null";
                else
                    $request .= " " . $filterValid[$i] . " = '" . str_replace("'", "’",$ArrayToUpdate[$filterValid[$i]][0]) . "'";
            }
        }
        return $request;
    }

    protected function CreateCondionnalSearch($arrayWithFilter, $filterValid)
    {
        $request = "";
        if (count($arrayWithFilter) >= 1) {
            $key = 0;
            for ($i = 0; $i < count($filterValid); $i++) {
                $AddAnd = 0;
                if (array_key_exists($filterValid[$i], $arrayWithFilter)) {
                    if ($key === 0) {
                        $request .= " WHERE ";
                        $key++;
                    } else if ($key !== 0)
                        $AddAnd = 1;
                    if ($AddAnd === 1)
                        $request .= 'AND ';
                    $request .= $filterValid[$i] . ' in(';
                    for ($j = 0; $j < count($arrayWithFilter[$filterValid[$i]]); $j++) {
                        $request .= '"' . $arrayWithFilter[$filterValid[$i]][$j] . '"';
                        if ($j + 1 !== count($arrayWithFilter[$filterValid[$i]]))
                            $request .= ",";
                    }
                    $request .= ") ";
                }
            }
        }
        return $request;
    }

    public function __construct()
    {
        $server = "host=localhost";
        $user = "root";
        $password = "";
        $DBname = "JobBoardDB";

        try {
            $this->db = new PDO("mysql:$server;dbname=$DBname;charset=utf8", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            $this->db = null;
        }
    }
    public function __destruct()
    {
        if ($this->db)
            $this->db = null;
    }

}
