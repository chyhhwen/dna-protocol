<?php

class dna
{
    public $user;
    public $pass;
    public $dbname;
    public $db;
    public $field;

    public function config($u,$p,$dn,$db)
    {
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
        $this->db = $db;
    }
    public function family($a)
    {
        $id = "";
        for($i = 0;$i < 8;$i++)
        {
            $id = $id . $a[rand(0,strlen($a) - 1)];
        }
        return $id;
    }
    public function son($fdna,$mdna)
    {
        $sdna = "";
        if(strlen($fdna) < strlen($mdna))
        {
            $temp = $fdna;
            $fdna = $mdna;
            $mdna = $temp;
        }
        for($i = 0;$i < strlen($fdna);$i++)
        {
            if(rand(0,1) == 0 && $i < strlen($mdna))
            {
                $sdna = $sdna.$mdna[$i];
            }
            else
            {
                $sdna = $sdna.$fdna[$i];
            }
        }
        return $sdna;
    }
}
?>