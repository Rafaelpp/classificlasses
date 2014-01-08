<?php
require_once 'Crud.class.php';
class Cliente extends Crud {
   private $nome;
   private $email;
   private $created;
   private $modified;
   protected $table = 'clientes';
  
   public function getNome() {
       return $this->nome;
   }

   public function getEmail() {
       return $this->email;
   }

   public function getCreated() {
       return $this->created;
   }

   public function getModified() {
       return $this->modified;
   }

   public function setNome($nome) {
       $this->nome = $nome;
   }

   public function setEmail($email) {
       $this->email = $email;
   }

   public function setCreated($created) {
       $this->created = $created;
   }

   public function setModified($modified) {
       $this->modified = $modified;
   }
   
   #CREATE(INSERT)
   public function insert(){
       $conn    = "INSERT INTO $this->table(nome,email,created,modified) VALUES(?,?,?,?)";
       $value   = array($this->nome,$this->email,$this->created,$this->modified);
       try {
           $stmt = $this->db->prepare($conn);
           $stmt->execute($value);
           return $this->db->lastInsertId();
           
       } catch (PDOException $e) {
           echo'Erro ao inserir na tabela clientes'.$e->getMessage();
           
       }
   } 
 #UPDATE
 public function update($id){
       $conn    = "UPDATE $this->table SET nome = ?,email = ?,modified = ? WHERE id=$id";
       $value   = array($this->nome,$this->email,$this->modified);
       try {
           $stmt = $this->db->prepare($conn);
           return $stmt->execute($value);
       } catch (PDOException $e) {
           echo'Erro ao selecionar a tabela'.$e->getMessage();
           
       }
   }
   



}
