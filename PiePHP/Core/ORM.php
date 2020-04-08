<?php 

// namespace ORM;

class ORM 
{

    private $pdo;

    public function __construct() {
        // echo "on est la <br>";
        $connect = new Database();
        $this->pdo = $connect->Connect();
    }

    public function create($table, $fields) { // return id

        $field = '';
        $values = '';
        foreach ($fields as $key => $value) {
            $field .= $key . ", ";
            $values .= "'".$value."'" . ", ";
        }
        $req = $this->pdo->prepare("INSERT INTO $table(". substr($field, 0, -2) .") VALUES (". substr($values, 0, -2) .")");
        $req->execute(array());
        return $this->pdo->lastInsertId();
    }

    public function read($table, $id) { // return un array associatif

        $arr = [];

        $sql = "SELECT * from $table WHERE id = $id";
        $req = $this->pdo->prepare($sql);
        $req->execute(array());
        while ($result = $req->fetch()) {
            array_push($arr, $result);
        }

        return $arr;
    }

    public function update($table, $id, $fields) { // return un booleen
        
        $sql = ""; 
        foreach ($fields as $key => $value) {
            $sql .= "$key" . " = " . "'$value'" . " , ";
        }

        $sql = substr($sql, 0 , -2);
        echo "UPDATE $table SET $sql WHERE id = $id ";
        $req = $this->pdo->prepare("UPDATE $table SET $sql WHERE id = $id");
        $bool = $req->execute(array());
        return $bool;

    }

    public function delete($table, $id) { // return un booleen
         
        $req = $this->pdo->prepare("DELETE from $table WHERE id = $id");
        $bool = $req->execute(array());
        return $bool;
    }
 

    // return un tableau d'enregistrement
    public function find($table, $params = array('WHERE'=>'1', 'ORDER BY'=>'id ASC', 'LIMIT'=> '')) {
        
        $arr = [];
        $requete = "";

        if ($params['LIMIT'] == "") {
            unset($params['LIMIT']);
        }

        foreach($params as $key => $value) {
            $requete .= $key . " " . $value . " ";
        }

        // echo "SELECT * FROM $table $requete";
        $req = $this->pdo->prepare("SELECT * FROM $table $requete");
        $req->execute(array());
        while ($result = $req->fetch()) {
            array_push($arr, $result);
        }

        return $arr;
    }
}