<?php

require "DbConnect.php";

class ApiUser extends DbConnect
{

    public function Create($json)
    {
        $array = json_decode($json, true);
        $name = $array['name'];
        $email = $array["email"];
        $hashEmail = hash("sha512", $array["email"]);
        $hashMdp = hash("sha512", $array["password"]);
        $sqlQuery = "INSERT INTO users (name, password, email, hash, status, uuid) VALUES ('$name', '$hashMdp', '$email', '$hashEmail', '0', UUID())";
        $stmt = $this->db->prepare($sqlQuery);
        $stmt->execute();
    }

    public function Read($json)
    {
        $arrayWithFilter = json_decode($json, true);
        $filterValid = array (
            0 => "name",
            1 => "email",
            2 => "hash",
            3 => "password",
            4 => "status",
            5 => "grade",
            6 => "phone",
            7 => "company_id",
            8 => "uuid"
        );
        $request = "SELECT * FROM users";
        $request .= $this->CreateCondionnalSearch($arrayWithFilter, $filterValid);
        $res = $this->db->prepare($request);
        $res->execute();
        $rowFind = $res->fetchAll(PDO::FETCH_NAMED);
        return json_encode($rowFind);
    }

    public function Update($jsonToSearch, $jsonToUpdate)
    {
        $ArrayToSearch = json_decode($jsonToSearch, true);
        $ArrayToUpdate = json_decode($jsonToUpdate, true);

        $filterValid = array (
            0 => "name",
            1 => "email",
            2 => "hash",
            3 => "password",
            4 => "status",
            5 => "grade",
            6 => "phone",
            7 => "companie_id",
            8 => "uuid"
        );
        $request = "UPDATE users SET";
        $request .= $this->CreateSetRequest($filterValid, $ArrayToUpdate);
        $request .= $this->CreateCondionnalSearch($ArrayToSearch, $filterValid);
        $stmt = $this->db->prepare($request);
        $stmt->execute();
    }

    public function Delete($json)
    {

        // TODO: Implement Delete() method.
        $array = json_decode($json);
    }
}