<?php
    // 啟動 session，這樣可以使用 session 來管理登入資料
    session_start();

    // 使用 unset() 清除 session 中儲存的 "id" 資料，這樣就達到登出的效果
    unset($_SESSION["id"]);

    // 顯示登出成功的訊息
    echo "登出成功....";

    // 使用 meta 標籤實現自動跳轉，3 秒後自動跳轉到登入頁面 (2.login.html)
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>