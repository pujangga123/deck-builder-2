<?php
    // generate CID
    function makeCid() {
        $arr = array("A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9");
        $narr = count($arr)-1;
        $res = "";
        for($n=0; $n<8; $n++) {
            $res .= $arr[rand(0,$narr)];
        }
        return $res;
    }

    //quick simple way to get data from table using 'key'
    //works only for single key table
    function sqlRow($list, $table, $key, $id) {
        global $db;
        $sql = "select $list from $table where $key='$id' limit 1";
        return $db->GetRow($sql);
    }

    function generateId() {
        return date("ymdHis").str_pad(rand(0,9999),4,"0",STR_PAD_LEFT);
    }

    function generateUpdateSet($row) {
        $sets = "";
        foreach($row as $key=>$val) {
            if($val!='null') {
                $val = "'$val'";
            }
            $sets .= "$key=$val,";
        }
        return substr($sets,0,-1);        
    }

    function generateInsertValues($row) {
        $cols = "";
        $values = "";

        foreach($row as $key=>$val) {
            if($val!='null') {
                $val = "'$val'";
            }
            $cols .= $key.",";
            $values .= "$val,";
        }
        $cols = substr($cols,0,-1);
        $values = substr($values,0,-1);
        return "($cols) VALUES ($values)";
    }

    function getParam($param, $default) {
        if(isset($_GET[$param])) {
            return $_GET[$param];
        } else {
            return $default;
        }

    }
