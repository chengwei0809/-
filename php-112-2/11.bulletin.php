<?php
    // 關閉錯誤顯示，避免錯誤訊息暴露給使用者
    error_reporting(0);

    // 啟動 session，這樣可以使用 session 來儲存資料
    session_start();

    // 檢查是否有登入，如果_SESSION["id"] 未設定或為空，就表示使用者尚未登入
    if (!$_SESSION["id"]) {
        // 若未登入，顯示提示訊息，並在 3 秒後自動跳轉回登入頁
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 若已登入，顯示歡迎訊息，並顯示登出及其他功能的連結
        echo "歡迎, " . $_SESSION["id"] . "[<a href=12.logout.php>登出</a>] 
              [<a href=18.user.php>管理使用者</a>] 
              [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";

        // 連接資料庫
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 執行 SQL 查詢，從 bulletin 資料表中選取所有資料
        $result = mysqli_query($conn, "select * from bulletin");

        // 開始顯示資料表格，顯示佈告編號、類別、標題、內容及發佈時間
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

        // 使用 while 迴圈搭配 mysqli_fetch_array() 逐筆處理查詢結果
        while ($row = mysqli_fetch_array($result)) {
            // 每筆資料都顯示修改和刪除的連結，並將佈告編號傳遞給修改和刪除頁面
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
                  <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"]; // 顯示佈告編號
            echo "</td><td>";
            echo $row["type"]; // 顯示佈告類別
            echo "</td><td>";
            echo $row["title"]; // 顯示佈告標題
            echo "</td><td>";
            echo $row["content"]; // 顯示佈告內容
            echo "</td><td>";
            echo $row["time"]; // 顯示發佈時間
            echo "</td></tr>";
        }

        // 關閉表格標籤
        echo "</table>";
    }
?>