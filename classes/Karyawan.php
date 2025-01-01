<?php
require_once PATH_CLASS."Model.php";

class Karyawan extends Model {
    public $id = "";
    public $nama = "";
    public $username = "";
    public $role = "";
    public $dept = "";
    private $loaded = false;

    function __construct($id="") {
        global $db;
        if($id=="") { // buat container karyawan kosong (untuk karyawan baru)
            //
        } else {
            $sql = "select * from karyawan where id='$id'";
            $rs = $db->GetRow($sql);
            if($rs) {
                $this->id = $rs['id'];
                $this->nama = $rs['nama'];
                $this->username = $rs['username'];
                $this->role = $rs['role'];
                $this->dept = $rs['dept'];
            }            
        }
    }

    function isLoaded() {
        return $this->id!="";
    }

    function save() {
        global $db;

        if($this->id == "") {
            $this->id = generateId();
        }
        $row = array();
        $row['id'] = $this->id;
        $row['nama'] = $this->nama;
        $row['username'] = $this->username;
        $row['role'] = $this->role;
        $row['dept'] = $this->dept;

        $sql = "INSERT INTO karyawan ".generateInsertValues($row).
                "ON DUPLICATE KEY UPDATE ".
                generateUpdateSet(array_diff($row, ['id']));
        return $db->Execute($sql);
    }
}
?>