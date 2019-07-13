<?php
class BancoDados{
    public function instancia(){
        try {
            $conn = new PDO('mysql:host=localhost;dbname=portal', "jessica", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }
    }
}