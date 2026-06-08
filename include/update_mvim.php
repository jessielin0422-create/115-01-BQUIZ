<h3 class="cent">更換圖片</h3>
<hr>
<form action="api/update_title.php" method="post" enctype="multipart/form-data">
    <table class="all" style="width:70%; margin:auto;">
        <tr>
            <td class="tt">網站標題圖片：</td>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <div class="cent">
     <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
     <input type="submit" value="更新">
    <input type="reset" value="重置">
</div>
    </form>

<!-- <form action="api/add_title.php" method="post" enctype="multipart/form-data"> 
    新增介面的功能:連結的檔案的位置 
    依照不同功能的轉變要變更資料的內容位置-->