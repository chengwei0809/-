<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   
   // 使用 while 迴圈搭配 mysqli_fetch_array() 逐筆檢查每一列的帳號與密碼
   while ($row = mysqli_fetch_array($result)) {
     // 如果使用者輸入的 id 和 pwd 與資料庫中的一筆資料相符
     if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
       // 登入成功，將 $login 設為 TRUE
       $login = TRUE;
     }
   }

   // 根據 $login 的值來決定後續的動作
   if ($login == TRUE) {
     // 啟動 session，將使用者的 id 存入 session，以便後續使用
     session_start();
     $_SESSION["id"] = $_POST["id"];

     // 顯示登入成功訊息
     echo "登入成功";
     
     // 設定 3 秒後自動跳轉到 11.bulletin.php 頁面
     echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }
   else {
     // 登入失敗，顯示錯誤訊息
     echo "帳號/密碼 錯誤";
     
     // 設定 3秒後自動跳轉回登入頁 2.login.html
     echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
   }
?>