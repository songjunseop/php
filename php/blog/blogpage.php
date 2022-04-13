<?php
    $sql = "SELECT count(blogID) FROM myBlog";
    $result = $connect -> query($sql);
    
    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(blogID)'];

    // echo "<pre>";
    // var_dump($boardCount);
    // echo "</pre>";

    // echo $boardCount;

    // 총 페이지 갯수
    $boardCount = ceil($boardCount/$pageView);

    // 현재 페이지를 기준으로 보여주고싶은 페이지 갯수
    $pageCurrent = 3;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

    // 이전 페이지
    if($page != 1 && $page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='blog.php?page={$prevPage}'>&lt;</a></li>";
    }

    // 처음으로 페이지
    if($page != 1 && $page != 1){
        echo "<li><a href='blog.php?page=1'>&lt;&lt;</a></li>";
    }

    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";

        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='blog.php?page={$i}'>{$i}</a></li>";
    }

    // 다음 페이지
    if($page != $boardCount && $boardCount != 0){
        $nextPage = $page + 1;
        echo "<li><a href='blog.php?page={$nextPage}'>&gt;</a></li>";
    }
    // 마지막 페이지
    if($page != $boardCount && $boardCount != 0){
        echo "<li><a href='blog.php?page={$boardCount}'>&gt;&gt;</a></li>";
    }
?>