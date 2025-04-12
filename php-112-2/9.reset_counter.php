<?php
    // 啟動會話，這樣可以使用 session 來儲存資料
    session_start();

    // 使用 unset() 函數來移除 session 中的 "counter" 變數，這樣就重置了計數器
    unset($_SESSION["counter"]);

    // 顯示計數器已經重置的訊息
    echo "counter重置成功....";

    // 使用 meta 標籤實現自動跳轉，2秒後跳回到 8.counter.php 頁面
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";
?>