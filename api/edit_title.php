<?php
include_once "db.php";


/* 這是更新資料的程式*/ 
/* if(!empty($_FILES['img']['tmp_name'])){
     move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
     $_POST['TEXT'];
     $_POST['img']=$_FILES['img']['name'];
     $_POST['sh']=0;
     $Title->save($_POST);
} */

to("../admin.php?do=title");

?>

<!-- mysql的新增中間連結 -->
<!-- ../ 連線代表符號的意思 -->
<!-- to("../admin.php?do=title"); 這一段是額外加的東西 -->