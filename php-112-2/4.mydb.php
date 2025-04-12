<?php
    // 使用 mysqli_connect() 建立與資料庫的連線
    // 參數依序為：主機位址、使用者帳號、密碼、資料庫名稱
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 使用 mysqli_query() 執行 SQL 查詢指令，從資料庫中選取 user 資料表的所有資料
    $result = mysqli_query($conn, "select * from user");

    // 使用 mysqli_fetch_array() 從查詢結果中取得第一筆資料（第一列）
    $row = mysqli_fetch_array($result);
    // 輸出第一筆資料的 id 和 pwd 欄位，並加上一個換行
    echo $row["id"] . " " . $row["pwd"] . "<br>";

    // 再次使用 mysqli_fetch_array() 取得第二筆資料
    $row = mysqli_fetch_array($result);
    // 輸出第二筆資料的 id 和 pwd 欄位
    echo $row["id"] . " " . $row["pwd"];
?>