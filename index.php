<?php include_once "api/db.php"; ?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

     <title>卓越科技大學校園資訊系統</title>
     <link href="./css/css.css" rel="stylesheet" type="text/css">
     <script src="./js/jquery-1.9.1.min.js"></script>
     <script src="./js/js.js"></script>
</head>

<body>
     <div id="cover" style="display:none; ">
          <div id="coverr">
               <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                    onclick="cl(&#39;#cover&#39;)">X</a>
               <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
          </div>
     </div>
     <iframe style="display:none;" name="back" id="back"></iframe>
     <div id="main">
          <?php $title = $Title->find(['sh' => 1]); ?>
          <a title="<?= $title['text']; ?>" href="index.php">
               <div class="ti" style="background:url(&#39;upload/<?= $title['img']; ?>&#39;); background-size:cover;">
               </div>
               <!--標題-->
          </a>
          <div id="ms">
               <div id="lf" style="float:left;">
                    <div id="menuput" class="dbor">
                         <!--主選單放此-->
                         <span class="t botli">主選單區</span>
                         <?php
                         $mains = $Menu->all(['sh' => 1, 'main_id' => 0]);
                         foreach ($mains as $main): ?>
                              <a href="<?= $main['href'] ?>">
                                   <div class='mainmu cent'><?= $main['text'] ?></div>
                              </a>
                         <?php endforeach; ?>
                    </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                         <span class="t">進站總人數 :<?= $Total->find(1)['total'] ?></span>
                    </div>
               </div>
               <!-- include -->
               <!-- 三個頁面需要有判斷 才知道要載入哪一個畫面-->
               <!-- 如果都沒有的話 畫面會壞掉 所以設定首頁 -->
               <?php

               //$do=(!empty($_GET['do']))?$_GET['do']:"main";
               //$do=(!isset($_GET['do']))?$_GET['do']:"main";  只限這裡判斷 用??取代

               $do = $_GET['do'] ?? "main";
               $file = "front/$do.php";
               if (file_exists($file)) {
                    include $file;
               } else {
                    include "front/main.php";
               }
               ?>

               <div id="alt"
                    style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
               </div>
               <script>
                    $(".sswww").hover(
                         function() {
                              $("#alt").html("" + $(this).children(".all").html() + "").css({
                                   "top": $(this).offset().top - 50
                              })
                              $("#alt").show()
                         }
                    )
                    $(".sswww").mouseout(
                         function() {
                              $("#alt").hide()
                         }
                    )
               </script>
               <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                    <!--右邊-->
                    <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                         onclick="lo(&#39;?do=admin&#39;)">管理登入</button>
                    <div style="width:89%; height:480px;" class="dbor">
                         <span class="t botli">校園映象區</span>

                         <div class="cent"><img src="icon/up.jpg" onclink="pp(1)"></div>
                         <?php
                         $imgs = $Image->all(['sh' => 1]);
                         foreach ($imgs as $idx => $img):
                         ?>
                              <div class="im cent" id="ssaa<?= $idx; ?>">
                                   <img src="upload/<?= $img['img']; ?>" alt="" style="width:150px;height:103px;border:3px solid orange;margin:1px">
                              </div>
                         <?php endforeach; ?>
                         <div class="cent"><img src="icon/dn.jpg" onclink="pp(2)"></div>


                         <script>
                              var nowpage = 0,
                                   num = <?= $Image->count(['sh' => 1]); ?>;

                              function pp(x) {
                                   var s, t;
                                   if (x == 1 && nowpage - 1 >= 0) {
                                        nowpage--;
                                   }

                                   //nowpage        num
                                   // (0+1)*3=3     <=0*1  +3  =5
                                   // (1+1)*3=6     <=3*1  +3  =6
                                   // (2+1)*3=9     <=6*1  +3  =9
                                   if (x == 2 && (nowpage * 1 + 3) < num * 1)
                                        (nowpage++)

                                   $(".im").hide()
                                   for (s = 0; s <= 2; s++) {
                                        //s   nowpage  t
                                        //  0      0     id='ssaa0'
                                        //  1      0     id='ssaa1'
                                        //  2      0     id='ssaa2'

                                        //  0      1     id='ssaa1'
                                        //  1      1     id='ssaa2'
                                        //  2      1     id='ssaa3'
                                        //  
                                        //  0      2     id='ssaa2'
                                        //  1      2     id='ssaa3'
                                        //  2      2     id='ssaa4'

                                        t = s * 1 + nowpage * 1;
                                        $("#ssaa" + t).show()
                                   }
                              }
                              pp(1)
                         </script>
                    </div>
               </div>
          </div>
          <div style="clear:both;"></div>
          <div
               style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
               <span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom'] ?></span>
          </div>
     </div>

</body>

</html>