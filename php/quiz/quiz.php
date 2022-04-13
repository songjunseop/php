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
    <title>퀴즈</title>
    <?php
        include "../include/style.php";
    ?>
    <!-- //style --> 
    <style>
        .footer {
            background: #f5f5f5;
        }
        .layer_bg {display: none; position: fixed; left: 0; top: 0; z-index: 900;
        width: 100%; height: 100%; background: rgba(0,0,0,0.8);}
        .layer {display: none; position: absolute; left: 35%; top: 35%; z-index: 1000;
        width: 500px; height: 500px; border: 3px solid #000; background: #fff;}
        .layer .quiz__comment {font-size: 20px; color: #000; display: inline-block; margin: 30px;}
        .layer .close {position: absolute; bottom: 20px; right: 20px;}
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
    <!-- layer -->
    <div class="layer_bg"></div>
    <div class="layer">
        <span class="quiz__comment"></span>
        <a href="#" class="close">닫기</a>
    </div>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="quiz-type" class="section center gray">
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
    </main>

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let quizAnswer = "";

        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            $(".layer > .quiz__comment").text(view.quizComment);
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
                $(".quiz__btn .comment").fadeIn();

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
                url: "quizInfo.php",
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

        // 해설보기 버튼
        $(".quiz__btn .comment").click(function(){
            $(".layer").slideDown(300);
            $(".layer_bg").show();
        })
        $(".layer .close").click(function(){
            $(".layer").slideUp(300);
            $(".layer_bg").hide();
        })

        //과목 선택
        $("#quizSubject").change(function(){
            $(".quiz__selects input").attr("disabled", false);
            $(".quiz__selects input").prop("checked", false);
            // $(".quiz__selects input[type='radio']").prop("checked", false);
            $(".quiz__selects input").removeClass("correct");
            $(".quiz__selects input").removeClass("incorrect");
            $(".quiz__btn .comment").fadeOut();
            quizData()
        })  

        // function quizChecks(){
        //     let quizCheck = $("#quizSubject").is(":checked");
        //     function quizData(){
        //         let quizSubject = $("#quizSubject").val();
    
        //         $.ajax({
        //             url: "quizInfo.php",
        //             method: "POST",
        //             data: {"quizSubject": quizSubject},     //보내는 data
        //             dataType: "json",
        //             success: function(data){                //받는 data
        //                 console.log(data);
        //                 quizView(data.quiz);                //받아온 데이터를 quizView함수로 넘김  -> quizView는 myQuiz테이블의 정보를 가지고 있음
        //             },
        //             error: function(reqeust, status, error){
        //                 console.log('reqeust' + reqeust);
        //                 console.log('status' + status);
        //                 console.log('error' + error);
        //             }
        //         })
        //     }
        //     quizData();
        // }

        //정답 확인
        $(".quiz__btn .confirm").click(function(){
            // 정답을 클릭했는지 안했는지 판단
            quizCheck();
            // $(".quiz__btn .next").fadeIn();  //fadeOut   //fadeToggle
            // $(".quiz__btn .next").slideDown();   //slideUp   //slideToggle
            // $(".quiz__btn .comment").fadeIN();
        });

        // 다음 문제 버튼
        $(".quiz__btn .next").click(function(){
            quizData();
            $(".quiz__selects input").attr("disabled", false);
            $(".quiz__selects input").prop("checked", false);
            // $(".quiz__selects input[type='radio']").prop("checked", false);
            $(".quiz__selects input").removeClass("correct");
            $(".quiz__selects input").removeClass("incorrect");
            $(".quiz__btn .next").fadeOut();
            $(".quiz__btn .comment").fadeOut();
        })

        
    </script>
</body>
</html>