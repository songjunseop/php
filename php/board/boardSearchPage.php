<?php
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    $sql = "SELECT b.boardTitle, b.boardContents, m.memberID FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) ";

    switch($searchOption){
        case 'title':
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%'";
            break;
        case 'content': 
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%'";
            break;
        case 'name':
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%'";
            break;
    }
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;

    }
    // $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    
    // echo "<pre>";
    // var_dump($boardCount);
    // echo "</pre>";

    // echo $count;

    // 총 페이지 갯수
    $count = ceil($count/$pageView);


    // 현재 페이지를 기준으로 보여주고싶은 페이지 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $count) $endPage = $count;

    // boardSearch.php?searchKeyword=".{$searchKeyword}."&searchOption=".{$searchKeyword}

    // 이전 페이지
    if($page != 1 && $page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }

    // 처음으로 페이지
    if($page != 1 && $page != 1){
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
    }

    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";

        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }

    // 다음 페이지
    if($page != $count && $count != 0){
        $nextPage = $page + 1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
    }
    // 마지막 페이지
    if($page != $count && $count != 0){
        echo "<li><a href='boardSearch.php?page={$count}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }
?>