<?php

class server{

    // conexiunea la baza de date si numele tabelului
    private $conn;
    private $table_name = "servers";

    // proprietatile obiectului ( ca si a clasei in java)
    public $id;
    public $title;
    public $type;
    public $price;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    /**
     * It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
     */
    function read(){
        $query = "SELECT id, title, type, price FROM ".$this->table_name."  ";

        $stmt = $this->conn->prepare($query); // pregatim query

        $stmt->execute(); // execute query

        return $stmt;
    }

    /**
     * Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
     */
    function create(){
        $query = "INSERT INTO ".$this->table_name." SET title=:title, type=:type, price=:price";

        // pregatim query

        $stmt = $this->conn->prepare($query);

        // sanitize

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->price = htmlspecialchars(strip_tags($this->price));

        // bind values

        $stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":type",$this->type);
        $stmt->bindParam(":price",$this->price);

        // executam query

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    function update(){
        $query = "UPDATE ".$this->table_name." SET title=:title, type=:type, price=:price WHERE id=:id";

        // pregatim query

        $stmt = $this->conn->prepare($query);

        // sanitize

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind values

        $stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":type",$this->type);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":id",$this->id);

        // executam query

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    function delete(){
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    function readOne(){
        $query = "SELECT id, title, type, price FROM ".$this->table_name." WHERE id = ?  ";
        
        // prepare query
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1,$this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->type = $row['type'];
        $this->price = $row['price'];


    }

}