<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그 검색</title>
        <!-- style -->
        <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
        <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center">
            <div class="container">
                <h3 class="section__title">블로그 검색</h3>
                <p class="section__desc">수업과 관련된 블로그입니다. 다양한 정보를 확인하세요.</p>
                <div class="blog__inner">
                    <div class="blog__search">
                        <a href="blog.php" class="blog__btn2">목록보기</a>
<?php
    function msg($alert){
        echo "<p class='result'>총 ".$alert." 건이 검색되었습니다.</p>";
    }
    $searchKeyword = $_GET['searchKeyword'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    //쿼리문 작성
    $sql = "SELECT b.blogID, b.blogTitle, b.blogCategory, b.blogContents, m.youName, b.blogRegTime, b.blogImgFile, b.blogView, b.blogDelete FROM myBlog b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.blogTitle LIKE '%{$searchKeyword}%' ORDER BY blogID DESC";
    $result = $connect -> query($sql);
    //갯수파악
    if($result){
        $count2 = $result -> num_rows;
        msg($count2);
    }
?>


                    
                    </div>
                    <div class="blog__cont">
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    // 게시판 불러올 갯수
    $pageView = 5;
    $pageLimit = ($pageView * $page) - $pageView;
    
    // $sql = "SELECT blogID, blogImgFile, blogCategory, blogTitle, blogContents, blogAuthor, blogRegTime FROM myBlog ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $sql = "SELECT b.blogID, b.blogTitle, b.blogCategory, b.blogContents, m.youName, b.blogRegTime, b.blogImgFile, b.blogView, b.blogDelete FROM myBlog b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.blogTitle LIKE '%{$searchKeyword}%' ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        $blog = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figuer class="blog__header">
            <a href="blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>")></a>
        </figuer>
        <div class="blog__body">
            <span class="blog__cate"><?=$blog['blogCategory']?></span>
            <div class="blog__title"><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></div>
            <div class="blog__desc"><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogContents']?></a></div>
            <div class="blog__info">
                <span class="author"><a href="#"><?=$blog['youName']?></a></span>
                <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span>
                <span class="modify"><a href="blogModify.php?blogID=<?=$blog['blogID']?>">수정</a></span>
                <span class="delete"><a href="blogRemove.php?blogID=<?=$blog['blogID']?>">삭제</a></span>
            </div>
        </div>
    </article>
<?php } ?>
                    </div>
                    <div class="blog__pages">
                        <ul>
                            <?php
    $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $count2;
    //총 페이지 갯수
    $boardCount = ceil($boardCount/$pageView);
    //현재 페이지를 기준으로 보여주고싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page +$pageCurrent;
    //처음 페이지 초기화(마이너스 값 안나오게)
    if($startPage < 1){
        $startPage = 1;
    }
    //마지막 페이지 초기화(30넘어서 안나오게)
    if($endPage >= $boardCount){
        $endPage = $boardCount;
    }
    //처음으로 페이지
    if($page != 1 && $page != 1){
        echo "<li><a href='blogSearch.php?page=1&searchKeyword={$searchKeyword}'>&lt;&lt;</a></li>";
    }
    //이전 페이지
    if($page != 1 && $page != 1){
        $prevPage = $page -1;
        echo "<li><a href='blogSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}'>이전</a></li>";
    }
    // echo $boardCount;
    //1 2 3 4 5 6 7 8 9 10 11 12 13 14......
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";

        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='blogSearch.php?page={$i}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
    }
    //다음 페이지
    if($page != $endPage && $boardCount != 0){
        $nextPage = $page +1;
        echo "<li><a href='blogSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}'>다음</a></li>";
    }
    //마지막 페이지
    if($page != $endPage && $boardCount != 0){
        echo "<li><a href='blogSearch.php?page=30&searchKeyword={$searchKeyword}'>&gt;&gt;</a></li>";
    }
?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

            <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>