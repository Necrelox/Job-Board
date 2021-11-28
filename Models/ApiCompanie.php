<?php

class ApiCompanie extends DbConnect
{
    public function Create($json)
    {
        $array = json_decode($json, true);
        $name = $array['name'];
        $description = $array["description"];

        $sqlQuery = "INSERT INTO companies (name, description) VALUES ('$name', '$description')";
        $stmt = $this->db->prepare($sqlQuery);
        $stmt->execute();
    }

    public function Read($json)
    {
        $arrayWithFilter = json_decode($json, true);
        $filterValid = array (
            0 => "name",
            1 => "description",
            2 => "id"
        );
        $request = "SELECT * FROM companies";
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
            1 => "description",
            2 => "id"
        );
        $request = "UPDATE users SET";
        $this->CreateSetRequest($request, $filterValid, $ArrayToUpdate);
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