<?php
    $result -> fetch_array(MYSQLI_ASSOC);
    $blogCount = $count2;

    // 총 페이지 갯수
    $blogcount = ceil($blogcount/$pageView);

    // 현재 페이지를 기준으로 보여주고싶은 페이지 갯수
    $pageCurrent = 3;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $blogcount) $endPage = $blogcount;

    // 이전 페이지
    if($page != 1 && $page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='blogSearch.php?page={$prevPage}&blogSearch={$searchKeyword}'>&lt;</a></li>";
    }

    // 처음으로 페이지
    if($page != 1 && $page != 1){
        echo "<li><a href='blogSearch.php?page=1&blogSearch={$searchKeyword}'>&lt;&lt;</a></li>";
    }

    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";

        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='blogSearch.php?page={$i}&blogSearch={$searchKeyword}'>{$i}</a></li>";
    }

    // 다음 페이지
    if($page != $blogcount && $blogcount != 0){
        $nextPage = $page + 1;
        echo "<li><a href='blogSearch.php?page={$nextPage}&blogSearch={$searchKeyword}'>&gt;</a></li>";
    }
    // 마지막 페이지
    if($page != $blogcount && $blogcount != 0){
        echo "<li><a href='blogSearch.php?page={$blogcount}&blogSearch={$searchKeyword}'>&gt;&gt;</a></li>";
    }
?>