<?php
class Library
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "qode";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function showlaporan()
    {
        $query = $this->db->prepare("SELECT * FROM data_pengqurban");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    
    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM users where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function get_by_id_laporan($id){
        $query = $this->db->prepare("SELECT * FROM data_pengqurban where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }
 
    public function update2($id,$keterangan){
        $query = $this->db->prepare('UPDATE data_pengqurban set keterangan=? where id=?');
        
        $query->bindParam(1, $keterangan);
        $query->bindParam(2, $id);
 
        $query->execute();
        return $query->rowCount();
    }

    public function update($id,$nama,$no_hp){
        $query = $this->db->prepare('UPDATE users set nama=?,no_hp=? where id=?');
        
        $query->bindParam(1, $nama);
        $query->bindParam(2, $no_hp);
        $query->bindParam(3, $id);
 
        $query->execute();
        return $query->rowCount();
    }

    public function updateprofil($id,$nama,$no_hp, $password){
        $query = $this->db->prepare('UPDATE users set nama=?,no_hp=?,password=? where id=?');
        
        $query->bindParam(1, $nama);
        $query->bindParam(2, $no_hp);
        $query->bindParam(3, $password);
        $query->bindParam(4, $id);
 
        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM users where id=?");
 
        $query->bindParam(1, $id);
 
        $query->execute();
        return $query->rowCount();
    }

    public function deletelaporan($id)
    {
        $query = $this->db->prepare("DELETE FROM data_pengqurban where id=?");
 
        $query->bindParam(1, $id);
 
        $query->execute();
        return $query->rowCount();
    }

 
}
?>