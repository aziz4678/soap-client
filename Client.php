<?php
error_reporting(1);
class Client
{   private $options,$api;

    public function __construct($uri,$location)
    {   $this->options = array('location' => $location, 'uri' => $uri);

        $this->api = new SoapClient(NULL, $this->options);

        unset($uri,$location);

    }

    public function filter($data)
    {   $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);

    }

    public function tampil_semua_data()
    {   $data = $this->api->tampil_semua_data();
        return $data;
        unset($data);

    }

    public function tampil_data($id_jurusan)
    {   $id_jurusan = $this->filter($id_jurusan);
        $data = $this->api->tampil_data($id_jurusan);
        return $data;
        unset($id_jurusan,$data);

    }

    public function tambah_data($data)
    {   $this->api->tambah_data($data);
        unset($data);
    }

    public function ubah_data($data)
    {   $this->api->ubah_data($data);
        unset($data);
    }

    public function hapus_data($id_jurusan)
    {   $this->api->hapus_data($id_jurusan);
        unset($id_jurusan);
    }

    public function __destruct()
    {
        unset($this->options,$this->api);
    }

}

$uri = 'http://192.168.56.136';
$location = $uri. '/soap-toko/soap-server/server.php';
$abc = new Client($uri,$location);
?>