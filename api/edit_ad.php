<?php
include_once "db.php";

foreach($_POST['id'] as $idx => $id){
     if(isset($_POST['del']) && in_array($id,$_POST['del'])){
          $$Ad->del($id);
     }else{

      $row=$$Ad->find($id);
        $row['text']=$_POST['text'][$idx];
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;


          $$Ad->save($row);
     }

}

to("../admin.php?do=ad");

?>

/* 已經要刪除的資料會再編輯嗎 正常不會? 
反之 如果已知道要刪除的資料 那就先刪除就不需要再編輯 */


/* 這是更新資料的程式*/ 
/* if(!empty($_FILES['img']['tmp_name'])){
     move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
     $_POST['TEXT'];
     $_POST['img']=$_FILES['img']['name'];
     $_POST['sh']=0;
     $Title->save($_POST);
} */


<!-- mysql的新增中間連結 -->
<!-- ../ 連線代表符號的意思 -->
<!-- to("../admin.php?do=title"); 這一段是額外加的東西 -->