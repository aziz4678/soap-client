<?php
error_reporting(1);

class Database{
    private $host ="localhost";
    private $dbname ="uts";
    private $user ="root";
    private $password ="";
    private $port ="3306";
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user,$this->password);
            
        }
        catch(PDOException $e){
            echo "koneksi gagal";
        }
    }

    public function tampil_data($id_jurusan)
    {
        $query = $this->conn->prepare("select id_jurusan,nama_jurusan,akreditasi,fakultas from jurusan where id_jurusan=?");
        $query->execute(array($id_jurusan));

        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;

        $query->closeCursor();
        unset($id_jurusan, $data);
    }

    public function tampil_semua_data()
    {
        $query = $this->conn->prepare("select id_jurusan,nama_jurusan,akreditasi,fakultas from jurusan order by id_jurusan");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;

        $query->closeCursor();
        unset($data);
    }

    public function tambah_data($data)
    {
        $query = $this->conn->prepare("insert ignore into jurusan (id_jurusan,nama_jurusan,akreditasi,fakultas) values (?,?,?,?)");
        $query->execute(array($data['id_jurusan'],$data['nama_jurusan'],$data['akreditasi'],$data['fakultas'],));

        $query->closeCursor();
        unset($data);
    }

    public function ubah_data($data)
    {
        $query = $this->conn->prepare("update jurusan set nama_jurusan=?,akreditasi=?,fakultas=? where id_jurusan=?");
        $query->execute(array($data['nama_jurusan'],$data['akreditasi'],$data['fakultas'],$data['id_jurusan']));

        $query->closeCursor();
        unset($data);
    }

    public function hapus_data($id_jurusan)
    {
        $query = $this->conn->prepare("delete from jurusan where id_jurusan=?");
        $query->execute(array($id_jurusan));

        $query->closeCursor();
        unset($id_jurusan);
    }
}
?>