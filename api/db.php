<?php

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db13";  /* db13 是自己設定的sql名稱 要對照清楚*/
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
                $sql .= " WHERE ".join(" AND ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg){
        $sql="SELECT count(*) FROM $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
                $sql .= " WHERE ".join(" AND ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($arg){
        $sql="SELECT * FROM $this->table ";
        
        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            $sql .= " WHERE ".join(" AND ",$tmp);
        }else{
            $sql .= " WHERE `id`='$arg'";
        }
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg){
        if(isset($arg['id'])){
            //update

            $tmp=$this->a2s($arg);
            $sql="UPDATE $this->table SET ".join(" , ",$tmp);
            $sql .=" WHERE `id`='{$arg['id']}'";

        }else{
            //insert
            $keys=array_keys($arg);
            $sql="INSERT INTO $this->table (`".join("`,`",$keys)."`) VALUES('".join("','",$arg)."');";
        }
       echo $sql;
        return $this->pdo->exec($sql);
    }

    function del($arg){
        $sql="DELETE FROM $this->table ";
        
        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            $sql .= " WHERE ".join(" AND ",$tmp);
        }else{
            $sql .= " WHERE `id`='$arg'";
        }
        
        return $this->pdo->exec($sql);

    }

protected function a2s($array){
    $tmp=[];
    foreach($array as $key => $val){
        $tmp[]="`$key`='$val'";
               
    }

    return $tmp;
}

function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:$url");
}

 /* 建立mql表單後寫入db*/
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');
$Total=new DB('total');
$Bottom=new DB('bottom');

?>


<!-- 100多行先打需要的建立起來 以利後續使用 -->
<!-- "mysql:host=localhost;charset=utf8;dbname=db21"  這一段都是固定要加上-->
<!-- 最後確認是否有全部的functiom 全部的東西 、 、增 、改 、刪 、查 、通用的(即使不是這個資料表的也可以使用)-->
<!-- if...else  如果他是那就做  要自己判斷 -->