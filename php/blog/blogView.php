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
    <title>블로그</title>
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
<?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->

    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="center">

<?php
    $blogID = $_GET['blogID'];

    $sql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";
    $connect -> query($sql);
    $result = $connect -> query($sql);
?>
    <?php if($result){ ?>
        <?php $blogInfo = $result -> fetch_array(MYSQLI_ASSOC) ?>

        <div class="blog__label" style="background-image:url(../assets/img/blog/<?=$blogInfo["blogImgFile"]?>)">
            <h3 class="section__title"><?=$blogInfo["blogTitle"]?></h3>
            <div>
                <span class="author"><a href="#"><?=$blogInfo["blogAuthor"]?></a></span>
                <span class="date"><?=date("Y-m-d", $blogInfo["blogRegTime"])?></span><br>
                <span class="modify"><a href="blogdModify.php?blogID=<?=$blog["blogID"]?>">수정</a></span>
                <span class="delete"><a href="blogRemove.php?blogID=<?=$blog["blogID"]?>">삭제</a></span>
            </div>
        </div>
        <div class="container">
            <div class="blog__layout">
                <div class="blog__left">
                    <div>
                        <h4 class="section__title"><?=$blogInfo["blogTitle"]?></h4>
                        <?=$blogInfo["blogContents"]?>
                    </div>
                </div>
                <div class="blog__right">
                    <iframe src="https://ads-partners.coupang.com/widgets.html?id=572089&template=carousel&trackingCode=AF5453363&subId=&width=300&height=300" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                </div>
            </div>
        </div>
    <?php } ?>

            <!-- <div class="blog__label" style="background-image:url(../assets/img/blog/blogimg1.jpg)">
                <h3 class="section__title">블로그 제목</h3>
                <div>
                    <span class="author"><a href="#">작가</a></span>
                    <span class="date">날짜</span><br>
                    <span class="modify"><a href="#">수정</a></span>
                    <span class="delete"><a href="#">삭제</a></span>
                </div>
            </div>
            <div class="container">
                <div class="blog__layout">
                    <div class="blog__left">블로그 내용</div>
                    <div class="blog__right">광고</div>
                </div>
            </div> -->
        </section>
    </main>

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>