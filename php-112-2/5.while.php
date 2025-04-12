<?php
   // 使用 mysqli_connect() 建立與資料庫的連線
   // 參數依序為：資料庫主機、使用者帳號、密碼、資料庫名稱
   $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

   // 使用 mysqli_query() 執行 SQL 查詢，從 user 資料表中選取所有資料
   $result = mysqli_query($conn, "select * from user");

   // 使用 while 迴圈搭配 mysqli_fetch_array()
   // 一筆一筆地抓出查詢結果中的每一列資料，直到沒有資料為止
   while ($row = mysqli_fetch_array($result)) {
     // 輸出每筆資料的 id 和 pwd 欄位，並在每筆後加上換行 <br>
     echo $row["id"] . " " . $row["pwd"] . "<br>";
   } 
?>