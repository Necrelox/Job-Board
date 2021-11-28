<?php

class ApiAdvertisement extends DbConnect
{
    public function Create($json)
    {
        $array = json_decode($json, true);
        $name = $array['name'];
        $description = $array["description"];
        $date = $array["date"];
        $wage = $array["wage"];
        $uuid = $array["uuid"];
        $companie_id = $array["companie_id"];

        $sqlQuery = "INSERT INTO advertisements (name, description, date, wage, position, contract, user_uuid, companie_id) VALUES ('$name', '$description', '$date', '$wage', 'Nice', 'CDD', '$uuid', '$companie_id')";
        $stmt = $this->db->prepare($sqlQuery);
        $stmt->execute();
    }

    public function Read($json)
    {
        $arrayWithFilter = json_decode($json, true);
        $filterValid = array (
            0 => "name",
            1 => "date",
            2 => "description",
            3 => "wage",
            4 => "workedtime",
            5 => "position",
            6 => "contract",
            7 => "user_uuid",
            8 => "companie_id",
            9 => "companie_name",
            10 => "id"
        );
        $request = "SELECT * FROM advertisements";
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
            1 => "date",
            2 => "description",
            3 => "wage",
            4 => "workedtime",
            5 => "position",
            6 => "contract",
            7 => "user_uuid",
            8 => "companie_id",
            9 => "companie_name",
            10 => "id"
        );
        $request = "UPDATE advertisements SET";
        $request .= $this->CreateSetRequest($filterValid, $ArrayToUpdate);
        $request .= $this->CreateCondionnalSearch($ArrayToSearch, $filterValid);
        $stmt = $this->db->prepare($request);
        $stmt->execute();
    }

    public function Delete($json)
    {
        //DELETE FROM table_name WHERE condition;
        $filterValid = array (
            0 => "name",
            1 => "date",
            2 => "description",
            3 => "wage",
            4 => "workedtime",
            5 => "position",
            6 => "contract",
            7 => "user_uuid",
            8 => "companie_id",
            9 => "companie_name",
            10 => "id"
        );

        $ArrayToSearch = json_decode($json, true);
        $request = "DELETE FROM advertisements";
        $request .= $this->CreateCondionnalSearch($ArrayToSearch, $filterValid);
        $stmt = $this->db->prepare($request);
        $stmt->execute();
    }
}