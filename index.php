<?php
include("includes/includedFiles.php");
?>

  <h1 class="pageHeadingBig">You Might Also Like</h1>

  <div class="gridViewContainer">

      <?php
          $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
          while($row = mysqli_fetch_array($albumQuery)) {

            // '" "'（シングル・クォーテーション）（ダブル・クォーテーション）にすることで、前と後に分解する
            //（ドット） .  .内で呼び出すrowの定義
            echo "<div class='gridViewItem'>
                      <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
                          <img src='" . $row['artworkPath']. "'>
                          <div class='gridViewInfo'>"
                              . $row['title'] .
                          "</div>
                      </span>
                  </div>";
          }
       ?>

  </div>
