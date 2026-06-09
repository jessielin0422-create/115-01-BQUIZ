<h3 class="cent">新增主選單</h3>
<hr>
<form action="api/add.php?table=admin" method="post" enctype="multipart/form-data">
    <table class="all" style="width:70%; margin:auto;">
        <tr>
            <td class="tt">主選單名稱：</td>
            <td><input type="text" name="acc"></td>
        </tr>
        <tr>
            <td class="tt">選單連結網址：</td>
            <td><input type="text" name="pw"></td>
        </tr>
       
    </table>
    <div class="cent"><input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
    </form>