<?php

abstract class Crud {
    protected $db;
    protected $table;
    
    public function __construct(PDO $db) {
       $this->db = $db;
   }
   
   abstract public function insert();
   abstract public function update($id);

   #FIND
 public function find($id){
       $conn    = "SELECT * FROM $this->table WHERE id=$id";
       try {
           $stmt = $this->db->prepare($conn);
           $stmt->execute();
           return $stmt->fetch();
       } catch (PDOException $e) {
           echo'Erro ao selecionar a tabela'.$e->getMessage();
           
       }
   }
    
     #DELETE
 public function delete($id){
       $conn    = "DELETE FROM $this->table WHERE id=$id";
       try {
           $stmt = $this->db->prepare($conn);
           return $stmt->execute();
       } catch (PDOException $e) {
           echo'Erro ao selecionar a tabela'.$e->getMessage();
           
       }
   }
   
 #FETCH-ALL
 public function fetchAll(){
       $conn    = "SELECT * FROM $this->table";
       try {
           $stmt = $this->db->prepare($conn);
           $stmt->execute();
           return $stmt->fetchAll();
       } catch (PDOException $e) {
           echo'Erro ao selecionar a tabela'.$e->getMessage();
           
       }
   }
}
