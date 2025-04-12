<?php
    // 啟動會話，這樣可以使用 session 來儲存資料
    session_start();

    // 檢查 session 中是否已經存在名為 "counter" 的變數
    if (!isset($_SESSION["counter"]))
        // 如果 "counter" 不存在，初始化為 1
        $_SESSION["counter"] = 1;
    else
        // 如果 "counter" 存在，就將其值加 1
        $_SESSION["counter"]++;

    // 輸出 "counter" 的值，顯示目前的計數
    echo "counter=" . $_SESSION["counter"];

    // 提供一個連結，點擊後可以重置計數器
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>