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
    <title>PHP 사이트</title>
    <?php
        include "../include/style.php";
    ?>
    <style>
        /* slider */
        .slider__wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
        }
        .slider__img {               /* 화면 보이는 구간 */
            width: 100%;
            height: 794px;
            position: relative;
            overflow: hidden;
        }
        .slider img {
            min-height: 350px;
        }
        .banner__desc {
            z-index: 10;
            position: absolute;
            left: 20%;
            top: 15%;
            width: 100%;
        }
        .banner__header {
            font-size: 1vw;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1%;
        }
        .banner__title {
            font-size: 7vw;
            font-weight: 300;
            color: #fff;
            margin-left: -7px;
            margin-bottom: 1.5%;
        }
        .banner__cont {
            width: 40%;
            font-size: 1.2vw;
            font-weight: 300;
            color: #fff;
            line-height: 1.6;
            margin-bottom: 1.5%;
        }
        .banner__btn1 {
            font-size: 1vw;
            display: inline-block;
            padding: 1% 2.5%;
            background: #fff;
            margin-right: 5px;
        }
        .banner__btn2 {
            font-size: 1vw;
            display: inline-block;
            padding: 1% 2.5%;
            background: #000;
            color: #fff;
        }

        .slider__inner {            /* 이미지 움직이는 영역 */
            display: flex;
            position: relative;
            width: 800%;          /*이미지 총 길이*/
            left: -100%;
        }
        .slider__inner.transition {
            transition: all 600ms;
        }
        .slider {
            width: 100%;
            position: relative;
        }
        .slider__btn a {
            position: absolute;
            top: 50%;
            z-index: 100;
            width: 50px;
            height: 50px;
            transition: all 0.2s;
            display: block;
        }
        .slider__btn a.prev {
            left: 20px;
        }
        .slider__btn a.next {
            right: 0;
        }
        @media(max-width: 1300px){
            .slider__btn a.prev {
            left: 0;
            top: 30%;
            }
            .slider__btn a.next {
                right: 0;
                top: 30%;
            }
        }
        @media(max-width: 800px){
            .slider__btn a.prev {
                left: 0;
                top: 20%;
            }
            .slider__btn a.next {
                right: 0;
                top: 20%;
            }
        }
        
        /* .slider__btn a:hover {
            background: rgb(241, 96, 86);
        } */
        .slider__dot {
            position: relative;
            top: -65px;
            z-index: 100;
            text-align: center;
        }
        .slider__dot .dot {
            width: 20px;
            height: 20px;
            background: rgba(0,0,0,0.4);
            display: inline-block;
            border-radius: 50%;
            transition: all 0.3s;
            margin: 3px;
        }
        .slider__dot .dot.active {
            background: rgba(0,0,0,0.8);
        }
        .slider__dot .play {
            width: 20px;
            height: 20px;
            display: inline-block;
            vertical-align: 9px;
            margin: 3px;
            text-indent: -99999px;
            border-radius: 50%;
            position: relative;
            display: none;
        }
        .slider__dot .play.show {
            display: inline-block;
        }
        .slider__dot .play::after {
            content: '';
            border-style: solid;
            border-width: 10px 0 10px 18px;
            border-color: transparent transparent transparent #000;
            position: absolute;
            left: 1px;
            top: 0px;
        }
        .slider__dot .stop {
            width: 20px;
            height: 20px;
            /* background: #000; */
            display: inline-block;
            vertical-align: 9px;
            margin: 3px;
            text-indent: -99999px;
            border-radius: 50%;
            position: relative;
            display: none;
        }
        .slider__dot .stop.show {
            display: inline-block;
        }
        .slider__dot .stop::after {
            content: '';
            border-style: solid;
            border-width: 10px 3px 10px 3px;
            border-color: #000;
            position: absolute;
            left: 2px;
            top: 0;
        }
        .slider__dot .stop::before {
            content: '';
            border-style: solid;
            border-width: 10px 3px 10px 3px;
            border-color: #000;
            position: absolute;
            left: 12px;
            top: 0;
        }
    </style>
    <!-- //style -->
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
        <section id="slideType08">
            <div class="slider__wrap">
                <div class="slider__img">
                    <div class="slider__inner">
                        <div class="slider">
                            <img src="../assets/img/sliderimg01.jpg" alt="이미지1">
                            <div class="banner__desc">
                                <p class="banner__header">DEVELOPER</p>
                                <h4 class="banner__title">NEW PROJECT</h4>
                                <p class="banner__cont">너무 무리하지 말아요.<br>
                                    이미 당신은 잘하고 있고<br>
                                    앞으로도 잘 할 수 있어요.<br>
                                    넘어져도 괜찮아요.<br>
                                    다시 일어나면 되니까!
                                </p>
                                <a href="javascript:;" class="banner__btn1">자세히 보기</a>
                                <a href="javascript:;" class="banner__btn2">사이트 보기</a>
                            </div>
                        </div>
                        <div class="slider"><img src="../assets/img/sliderimg02.jpg" alt="이미지2">
                            <div class="banner__desc">
                                <p class="banner__header">DEVELOPER</p>
                                <h4 class="banner__title">NEW PROJECT</h4>
                                <p class="banner__cont">너무 무리하지 말아요.<br>
                                    이미 당신은 잘하고 있고<br>
                                    앞으로도 잘 할 수 있어요.<br>
                                    넘어져도 괜찮아요.<br>
                                    다시 일어나면 되니까!
                                </p>
                                <a href="javascript:;" class="banner__btn1">자세히 보기</a>
                                <a href="javascript:;" class="banner__btn2">사이트 보기</a>
                            </div>
                        </div>
                        <div class="slider"><img src="../assets/img/sliderimg03.jpg" alt="이미지3">
                            <div class="banner__desc">
                                <p class="banner__header">DEVELOPER</p>
                                <h4 class="banner__title">NEW PROJECT</h4>
                                <p class="banner__cont">너무 무리하지 말아요.<br>
                                    이미 당신은 잘하고 있고<br>
                                    앞으로도 잘 할 수 있어요.<br>
                                    넘어져도 괜찮아요.<br>
                                    다시 일어나면 되니까!
                                </p>
                                <a href="javascript:;" class="banner__btn1">자세히 보기</a>
                                <a href="javascript:;" class="banner__btn2">사이트 보기</a>
                            </div>
                        </div>
                        <div class="slider"><img src="../assets/img/sliderimg04.jpg" alt="이미지4">
                            <div class="banner__desc">
                                <p class="banner__header">DEVELOPER</p>
                                <h4 class="banner__title">NEW PROJECT</h4>
                                <p class="banner__cont">너무 무리하지 말아요.<br>
                                    이미 당신은 잘하고 있고<br>
                                    앞으로도 잘 할 수 있어요.<br>
                                    넘어져도 괜찮아요.<br>
                                    다시 일어나면 되니까!
                                </p>
                                <a href="javascript:;" class="banner__btn1">자세히 보기</a>
                                <a href="javascript:;" class="banner__btn2">사이트 보기</a>
                            </div>
                        </div>
                        <div class="slider">
                            <img src="../assets/img/sliderimg05.jpg" alt="이미지5">
                            <div class="banner__desc">
                                <p class="banner__header">DEVELOPER</p>
                                <h4 class="banner__title">NEW PROJECT</h4>
                                <p class="banner__cont">너무 무리하지 말아요.<br>
                                    이미 당신은 잘하고 있고<br>
                                    앞으로도 잘 할 수 있어요.<br>
                                    넘어져도 괜찮아요.<br>
                                    다시 일어나면 되니까!
                                </p>
                                <a href="javascript:;" class="banner__btn1">자세히 보기</a>
                                <a href="javascript:;" class="banner__btn2">사이트 보기</a>
                            </div>
                        </div>
                        <div class="slider">
                            <img src="../assets/img/sliderimg06.jpg" alt="이미지6">
                            <div class="banner__desc">
                                <p class="banner__header">DEVELOPER</p>
                                <h4 class="banner__title">NEW PROJECT</h4>
                                <p class="banner__cont">너무 무리하지 말아요.<br>
                                    이미 당신은 잘하고 있고<br>
                                    앞으로도 잘 할 수 있어요.<br>
                                    넘어져도 괜찮아요.<br>
                                    다시 일어나면 되니까!
                                </p>
                                <a href="javascript:;" class="banner__btn1">자세히 보기</a>
                                <a href="javascript:;" class="banner__btn2">사이트 보기</a>
                            </div>
                        </div>
                    </div>
                    <div class="slider__btn">
                        <a href="javascript:;" class="prev">
                            <svg width="30" height="54" viewBox="0 0 30 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.9035 0L30 1.0845L2.2575 27L30 52.9155L28.9035 54L0 27L28.9035 0Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="javascript:;" class="next">                      
                            <svg width="30" height="54" viewBox="0 0 30 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0965 0L0 1.0845L27.7425 27L0 52.9155L1.0965 54L30 27L1.0965 0Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="slider__dot">
                    <a href='javascript:;' class='play'>play</a>
                    </div>
                </div>
            </div>
        </section>


        <section id="blog-type" class="section center type" style="padding-top:0;">
            <div class="container">
                <h3 class="section__title">수업 블로그</h3>
                <p class="section__desc">수업과 관련된 블로그입니다. 다양한 정보를 확인하세요.</p>
                <div class="blog__inner">
                    <div class="blog__cont">

<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 3;
    $pageLimit = ($pageView * $page) - $pageView;

    $sql = "SELECT blogID, blogImgFile, blogCategory, blogTitle, blogContents, blogAuthor, blogRegTime FROM myBlog ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        $blog = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figuer class="blog__header">
            <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>")></a>
        </figuer>
        <div class="blog__body">
            <span class="blog__cate"><?=$blog['blogCategory']?></span>
            <div class="blog__title"><?=$blog['blogTitle']?></div>
            <div class="blog__desc"><?=$blog['blogContents']?></div>
            <div class="blog__info">
                <span class="author"><a href="#"><?=$blog['blogAuthor']?></a></span>
                <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span>
            </div>
        </div>
    </article>
<?php } ?>
                    </div>
                    <div class="blog__btn ">
                        <a href="../blog/blog.php">더 보기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- //blog-type -->

        <section id="quiz-type" class="section center gray" style="margin:0;">
            <div class="container">
                <h3 class="section__title">수업 퀴즈</h3>
                <p class="section__desc">수업과 관련된 퀴즈입니다. 문제를 풀어 보세요.</p>
                <div class="quiz__inner">
                    <div class="quiz__header">
                        <div class="quiz__subject">
                            <label for="quizSubject">과목선택</label>
                            <select name="quizSubject" id="quizSubject" onclick="quizChecks()">
                                <option value="javascript">javascript</option>
                                <option value="jquery">jquery</option>
                                <option value="html">html</option>
                                <option value="css">css</option>
                            </select>
                        </div>
                    </div>
                    <div class="quiz__body">
                        <div class="title">
                            <span class="quiz__num"></span> .
                            <span class="quiz__ask"></span> 
                            <div class="quiz__desc">
                                
                            </div>
                        </div>
                        <div class="contents">
                            <div class="quiz__selects">
                                <label for="select1">
                                    <input class="select" type="radio" id="select1" name="select" value="1">
                                    <span class="choice"></span>
                                </label>
                                <label for="select2">
                                    <input class="select" type="radio" id="select2" name="select" value="2">
                                    <span class="choice"></span>
                                </label>
                                <label for="select3">
                                    <input class="select" type="radio" id="select3" name="select" value="3">
                                    <span class="choice"></span>
                                </label>
                                <label for="select4">
                                    <input class="select" type="radio" id="select4" name="select" value="4">
                                    <span class="choice"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="quiz__footer">
                        <div class="quiz__btn">
                            <button class="comment green none">해설 보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //quizType -->

        <section id="notice-type" class="section center gray">
            <div class="container">
                <h3 class="section__title">새로운 소식</h3>
                <p class="section__desc">수업과 관련된 새로운 소식입니다. 다양한 정보를 확인하세요.</p>
                <div class="notice__inner">
                    <article class="notice">
                        <h4>공지사항</h4>
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;

    $sql = "SELECT * FROM myBoard ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;
        $notice = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $notice){ ?>
    <ul>
        <li><a href="../board/boardView.php?boardID=<?=$notice['boardID']?>"><?=$notice['boardTitle']?></a><span class="time"><?=date('Y-m-d', $notice['regTime'])?></span></li>
    </ul>
<?php } ?>
                        <!-- <ul>
                            <li><a href="#">안녕하세요. 공지사항입니다.</a><span class="time">2022-03-30</span></li>
                            <li><a href="#">안녕하세요. 공지사항입니다.</a><span class="time">2022-03-30</span></li>
                            <li><a href="#">안녕하세요. 공지사항입니다.</a><span class="time">2022-03-30</span></li>
                            <li><a href="#">안녕하세요. 공지사항입니다.</a><span class="time">2022-03-30</span></li>
                        </ul> -->

                        <a href="../board/board.php" class="more">더보기</a>
                    </article>
                    <article class="notice">
                        <h4>댓글</h4>
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;

    $sql = "SELECT * FROM myComment ORDER BY commentID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;
        $comment = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $comment){ ?>
    <ul>
        <li><a href="../comment/comment.php#comment-type"><?=$comment['youText']?></a><span class="time"><?=date('Y-m-d', $comment['regTime'])?></span></li>
    </ul>
<?php } ?>
                        <!-- <ul>
                            <li><a href="#">안녕하세요. 댓글입니다.</a><span class="time">2022-03-30</span></li>
                            <li><a href="#">안녕하세요. 댓글입니다.</a><span class="time">2022-03-30</span></li>
                            <li><a href="#">안녕하세요. 댓글입니다.</a><span class="time">2022-03-30</span></li>
                            <li><a href="#">안녕하세요. 댓글입니다.</a><span class="time">2022-03-30</span></li>
                        </ul> -->
                        <a href="../comment/comment.php#comment-type" class="more">더보기</a>
                    </article>
                </div>
            </div>
        </section>
        <!-- //notice-type -->

    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        const sliderWrap = document.querySelector(".slider__wrap");
        const sliderImg = document.querySelector(".slider__img");        //이미지 보이는 영역
        const sliderInner = document.querySelector(".slider__inner");    //이미지 움직이는 영역
        const slider = document.querySelectorAll(".slider");             //5개의 이미지 저장
        const sliderBtn = document.querySelector(".slider__btn");
        const sliderBtnPrev = document.querySelector(".prev");
        const sliderBtnNext = document.querySelector(".next");
        const sliderDot = document.querySelector(".slider__dot");
        
        let currentIndex = 0;                               
        let sliderWidth = sliderImg.offsetWidth;            //이미지 가로값
        let sliderLength = slider.length;                   //이미지 갯수
        let sliderFirst = slider[0];                        //첫번째 이미지
        let sliderLast = slider[sliderLength - 1];          //마지막 이미지
        let cloneFirst = sliderFirst.cloneNode(true);       //첫번째 이미지 복사
        let cloneLast = sliderLast.cloneNode(true);         //마지막이미지 복사
        let posInitial = "";
        let dotIndex = "";
        let sliderTimer = "";
        let interval = 3000;

        //이미지 복사 appendTo / prependTo  :  append / prepend
        sliderInner.appendChild(cloneFirst);
        sliderInner.insertBefore(cloneLast, sliderFirst);
        
        // 이미지 움직이기
        function gotoSlider(index){
            sliderWidth = sliderImg.offsetWidth;
            sliderInner.classList.add("transition");

            sliderInner.style.left = -sliderWidth * (index + 1) + "px";

            console.log(sliderInner)
            currentIndex = index;

            let dotActive = document.querySelectorAll(".slider__dot .dot");
            // 두번째 이미지   : left = -1600px
            // 세번째 이미지   : left = -2400px
            // 네번째 이미지   : left = -3200px
            // 다섯번째 이미지 : left = -4000px
            //num = [1, 2, 3, 4, 5]
            dotActive.forEach(el => {
                el.classList.remove("active");                     //.active클래스를 지워줌
            })
            if(currentIndex == sliderLength){
                dotActive[0].classList.add("active");
            } else if(currentIndex == -1){
                dotActive[sliderLength-1].classList.add("active");
            } else {
                dotActive[index].classList.add("active");
            }
        };

        // 닷 메뉴
        function dotInit(){
            for(let i=0; i<sliderLength; i++){
                dotIndex += "<a href='javascript:;' class='dot'></a>";
            }
            dotIndex += "<a href='javascript:;' class='play'>play</a>";
            dotIndex += "<a href='javascript:;' class='stop show'>stop</a>";
            sliderDot.innerHTML = dotIndex;
            sliderDot.firstElementChild.classList.add("active");
        }
        dotInit();

        // 오토 플레이
        function autoPlay(){
            sliderTimer = setInterval(() => {
                // const intervalNum = currentIndex + 1;
                gotoSlider(currentIndex + 1);
            }, interval);
            
        }
        autoPlay();

        // 스탑
        function stopPlay(){
            clearInterval(sliderTimer);
        }

        // 이전 버튼
        sliderBtnPrev.addEventListener("click", () => {
            let prevIndex = currentIndex - 1;
            gotoSlider(prevIndex);
        });
        sliderBtnPrev.addEventListener("mouseenter", () => {
            stopPlay();
        })

        // 다음 버튼
        sliderBtnNext.addEventListener("click", () => {
            let nextIndex = currentIndex + 1;
            gotoSlider(nextIndex);
        });
        sliderBtnNext.addEventListener("mouseenter", () => {
            stopPlay();
        })
        

        // 초기화
        sliderInner.addEventListener("transitionend", () => {
            sliderInner.classList.remove("transition");

            // 처음 이미지에 왔을 때 
            if(currentIndex == -1){
                sliderInner.style.left = -(sliderLength * sliderWidth) + "px";
                currentIndex = 0;
            }
            // 마지막 이미지에 왔을 때
            if(currentIndex == sliderLength){
                sliderInner.style.left = -(1 * sliderWidth) + "px";
                currentIndex = 0;
            }
        });

        sliderInner.addEventListener("mouseenter", () => {
            stopPlay();
        })
        sliderInner.addEventListener("mouseleave", () => {
            if(document.querySelector(".play").classList.contains("show")){
                stopPlay();
            } else {
                autoPlay();
            }
        })

        document.querySelector(".play").addEventListener("click", () => {
            document.querySelector(".play").classList.remove("show");
            document.querySelector(".stop").classList.add("show");
            autoPlay();
        })
        document.querySelector(".stop").addEventListener("click", () => {
            document.querySelector(".stop").classList.remove("show");
            document.querySelector(".play").classList.add("show");
            stopPlay();
        })
        
        // 닷버튼에 마우스가 올라갔을때 이미지 정지
        document.querySelectorAll(".slider__dot .dot").forEach(dot => {      //닷 버튼을 눌렀을 때
            dot.addEventListener("mouseenter", () => {
                stopPlay();
            });
        });

        //닷 버튼을 클릭했을 때 해당 이미지로 이동
        document.querySelectorAll(".slider__dot .dot").forEach((dot, index) => {      //닷 버튼을 눌렀을 때
            dot.addEventListener("click", () => {
                gotoSlider(index)                               //이미지의 인덱스 값으로 넘어감
            });
        });

        // 퀴즈
        let quizAnswer = "";
        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            quizAnswer = view.quizAnswer;
        }
        // 정답 체크
        function quizCheck(){
            let selectCheck = $(".quiz__selects input:checked").val();
            // 정답을 체크 안했으면 체크 유도
            if(selectCheck == null || selectCheck == ''){
                alert("정답을 체크해주세요")
            } else {
                $(".quiz__btn .next").fadeIn();
                // 정답을 체크 했으면 점수 확인
                if(selectCheck == quizAnswer){
                    // 정답
                    $(".quiz__selects #select"+quizAnswer).addClass("correct");
                    $(".quiz__selects input").attr("disabled", true);
                } else {
                    // 오답
                    $(".quiz__selects #select"+selectCheck).addClass("incorrect");
                    $(".quiz__selects #select"+quizAnswer).addClass("correct");
                    $(".quiz__selects input").attr("disabled", true);
                }
            }
        }





        // 문제 데이터 가져오기
        function quizData(){
            let quizSubject = $("#quizSubject").val();
            $.ajax({
                url: "../quiz/quizInfo.php",
                method: "POST",
                data: {"quizSubject": quizSubject},     //보내는 data
                dataType: "json",
                success: function(data){                //받는 data
                    console.log(data);
                    quizView(data.quiz);                //받아온 데이터를 quizView함수로 넘김  -> quizView는 myQuiz테이블의 정보를 가지고 있음
                },
                error: function(reqeust, status, error){
                    console.log('reqeust' + reqeust);
                    console.log('status' + status);
                    console.log('error' + error);
                }
            })
        }
        quizData();
        //과목 선택
        $("#quizSubject").change(function(){
            quizData()
        })
        //정답 확인
        $(".quiz__btn .confirm").click(function(){
            // 정답을 클릭했는지 안했는지 판단
            quizCheck();
        });
        // 다음 문제 버튼
        $(".quiz__btn .next").click(function(){
            quizData();
            $(".quiz__selects input").attr("disabled", false);
            $(".quiz__selects input").prop("checked", false);
            $(".quiz__selects input").removeClass("correct");
            $(".quiz__selects input").removeClass("incorrect");
            $(".quiz__btn .next").fadeOut();
        })
    </script>
</body>
</html>