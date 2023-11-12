<?php
    date_default_timezone_set("Etc/GMT-8");
    require_once("./lib/database.php");
    require_once("./lib/dna.php");
    /*第一代產生*/
    /*家族ID*/
    $product = "ABC";
    $dna = new dna();
    $pid = $dna -> family(md5($product));
    /*商品*/
    $sql = new sql( );
    $sql -> config("root","","dna","product");
    $time = date("Y/m/d H:i:s", time());
    $sql -> put_data(['',$pid,$time]);
    $sql -> add("(?,?,?)");
    /*生成父dna*/
    $fdna =  base64_encode(md5($product.time()));
    $sql = new sql( );
    $sql -> config("root","","dna","list");
    $time = date("Y/m/d H:i:s", time());
    $sql -> put_data(['',$pid,$fdna,$fdna,$time]);
    $sql -> add("(?,?,?,?,?)");
    /*第N代*/
    /*生成母key*/
    $key = "123";
    $mdna = base64_encode(md5($key.time()));
    /*尋找父dna*/
    $sql = new sql( );
    $sql -> config("root","","dna","list");
    $sql -> put_data(['id','family','dispatch','target','time']);
    $data = $sql->fdna_sel($pid);
    $fdna = "";
    foreach($data as $key => $val)
    {
        $fdna = $data[$key]['target'];
    }
    /*生成子dna*/
    $dna = new dna();
    echo $fdna ."</p>";
    echo $mdna ."</p>";
    $sdna = $dna -> son($fdna,$mdna);
    echo $sdna;
    /*傳輸*/
    $sql = new sql( );
    $sql -> config("root","","dna","list");
    $time = date("Y/m/d H:i:s", time());
    $sql -> put_data(['',$pid,$fdna,$sdna,$time]);
    $sql -> add("(?,?,?,?,?)");
?>