<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글</title>
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="card-type" class="section center">
            <div class="container">
                <h3 class="section__title">무서운 맹수들</h3>
                <p class="section__desc">
                    인간의 기준에서 사납고 위험한 동물을 의미합니다. <br>
                    Gmarket Sans Light 22px 150% #67778A
                </p>
                <div class="card__inner">
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/img1.jpg" alt="이미지1">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">호랑이</h3>
                            <p class="card__desc">아시아에 서식하는 식육목 고양이과의 포유류. 현존하는 모든 고양이과 동물들 중 가장 큰 동물입니다. 또한 IUCN 멸종 위기 등급 EN인 멸종 위기 종이기도 합니다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/img2.jpg" alt="이미지2">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">표범</h3>
                            <p class="card__desc">아시아와 아프리카에 서식하고 있는 대표적인 고양이과 맹수입니다. 고양이과 맹수들이 대개 그렇듯 야행성으로 낮에는 쉬고 밤에 활동합니다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/img3.jpg" alt="이미지3">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">사자</h3>
                            <p class="card__desc">사자는 아프리카와 인도에 서식하는 식육목 고양잇과 포유류입니다. 강인한 사냥 능력으로 오랫동안 '백수의 왕'으로 불리우며 왕의 상징으로 여겨지는 등 인기를 누려온 동물입니다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </section>
    
            <section id="comment-type" class="section center purple">
                <h3 class="section__title">강의 신청하기</h3>
                <p class="section__desc">강의 신청하기는 누구나 댓글을 달 수 있습니다. 회원가입 하지 않아도 신청 가능합니다. 100글자 이내로 써주세요.</p>
                <div class="comment__inner">
                    <div class="comment__form">
                        <form action="commentSave.php" method="post" name="comment">
                            <fieldset>
                                <legend class="ir_so">댓글쓰기</legend>
                                <div class="comment__wrap">
                                    <div>
                                        <label for="youName" class="ir_so">이름</label>
                                        <input type="text" name="youName" id="youName" class="input__style" placeholder="이름" autocomplete="off" required>
                                    </div>
                                    <div>
                                        <label for="youText" class="ir_so">댓글 쓰기</label>
                                        <input type="text" name="youText" id="youText" class="input__style width" placeholder="시간, 날짜, 강의 제목을 적어주세요." autocomplete="off" required>
                                    </div>
                                    <button class="comment__btn" type="submit" value="댓글 작성하기">작성하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="comment__list">
                        <!-- <div class="list">
                            <p class="comment__desc">저 신청할께요. 5월달 강의 신청합니다.</p>
                            <div class="comment__icon">
                                <span class="face"><img src="../assets/img/face.png" alt="얼굴"></span>
                                <span class="name">쓴 사람 이름</span>
                                <span class="date">2022-03-17</span>
                            </div>
                        </div> -->
                        <?php
                            include "../connect/connect.php";

                            $sql = "SELECT * FROM myComment";
                            $result = $connect -> query($sql);

                            // $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);

                            // echo "<pre>";
                            // var_dump($commentInfo);
                            // echo "</pre>";
                            
                            if($result){
                                $count = $result -> num_rows;

                                if($count > 0){
                                    for($i=1; $i<=$count; $i++){
                                        $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                        echo "<div class='list'>";
                                        echo "<p class='comment__desc'>".$commentInfo['youText']."</p>";
                                        echo "<div class='comment__icon'>";
                                        echo "<span class='face'><img src='../assets/img/face.png' alt='얼굴'></span>";
                                        echo "<span class='name'>".$commentInfo['youName']."</span>";
                                        echo "<span class='date'>".date('Y-m-d', $commentInfo['regTime'])."</span>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>