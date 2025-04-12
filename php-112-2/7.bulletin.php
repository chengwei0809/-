<?php
    // 關閉錯誤顯示，避免將錯誤訊息暴露給使用者
    error_reporting(0);

    // 使用 mysqli_connect() 建立與資料庫的連線
    // 參數依序為：資料庫主機、使用者帳號、密碼、資料庫名稱
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 使用 mysqli_query() 執行 SQL 查詢，從 bulletin 資料表中選取所有資料
    $result = mysqli_query($conn, "select * from bulletin");

    // 開始產生一個 HTML 表格，顯示欄位標題
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

    // 使用 while 迴圈搭配 mysqli_fetch_array() 逐筆處理查詢結果
    while ($row = mysqli_fetch_array($result)) {
        // 輸出每一筆資料作為表格的列
        echo "<tr><td>";
        echo $row["bid"];      // 輸出佈告編號
        echo "</td><td>";
        echo $row["type"];     // 輸出佈告類別
        echo "</td><td>";
        echo $row["title"];    // 輸出佈告標題
        echo "</td><td>";
        echo $row["content"];  // 輸出佈告內容
        echo "</td><td>";
        echo $row["time"];     // 輸出發佈時間
        echo "</td></tr>";
    }

    // 關閉表格標籤
    echo "</table>";
?>