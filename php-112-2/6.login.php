
<?php
   // 使用 mysqli_connect() 建立與資料庫的連線
   // 參數依序為：資料庫主機、使用者帳號、密碼、資料庫名稱
   $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

   // 使用 mysqli_query() 執行 SQL 查詢，從 user 資料表中選取所有資料
   $result = mysqli_query($conn, "select * from user");

   // 設定一個布林變數 $login，初始為 FALSE，用來紀錄是否登入成功
   $login = FALSE;

   // 使用 while 迴圈搭配 mysqli_fetch_array()，檢查每一列的帳號與密碼
   while ($row = mysqli_fetch_array($result)) {
     // 如果使用者輸入的 id 和 pwd 與資料表中的一筆資料相符
     if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
       // 將 $login 設為 TRUE，表示登入成功
       $login = TRUE;
     }
   } 
   // 根據 $login 的值來決定輸出的結果
   if ($login == TRUE)
     // 登入成功
     echo "登入成功";
   else
     // 登入失敗
     echo "帳號/密碼 錯誤";
?>