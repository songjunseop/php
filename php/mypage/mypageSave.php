<?php
        include "../connect/connect.php";
        include "../connect/session.php";
        include "../connect/sessionCheck.php";
        $youEmail = $_POST['youEmail'];
        $youName = $_POST['youName'];
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youPass = $_POST['youPass'];
        $youNickname = $_POST['youNickname'];
        $youIntro = $_POST['youIntro'];
        $youGender = $_POST['youGender'];
        $youSite = $_POST['youSite'];
        $memberID = $_SESSION['memberID'];
        $youPhoto = $_FILES['youPhoto'];
        $myPageSize = $_FILES['youPhoto']['size'];
        $myPageType = $_FILES['youPhoto']['type'];
        $myPageName = $_FILES['youPhoto']['name'];
        $myPageTmp = $_FILES['youPhoto']['tmp_name'];
        //쿼리문 작성
        $sql = "SELECT * FROM myMember WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);
        if($result){
            echo "1번";
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // 이미지 업로드
            $fileTypeExtension = explode("/", $myPageType);
            $fileType = $fileTypeExtension[0];  //image
            $fileExtension = $fileTypeExtension[1];  //jpeg
            // 아이디 비밀번호 확인
            if($memberInfo['memberID'] == $memberID){
            echo "2번";
                $myPageDir = "../assets/img/mypage/";
                $myPageName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                if($fileType == "image"){
                    $sql = "UPDATE myMember SET youEmail = '{$youEmail}', youSite = '{$youSite}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}', youPass = '{$youPass}', youNickname = '{$youNickname}', youPhoto = '{$myPageName}' WHERE memberID = '{$memberID}'";
                    $connect -> query($sql);
                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($myPageTmp, $myPageDir.$myPageName);
                    echo "3번";
                    echo "$sql";
                } else {
                    $sql = "UPDATE myMember SET youEmail = '{$youEmail}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}', youPass = '{$youPass}', youNickname = '{$youNickname}' WHERE memberID = '{$memberID}'";
                    $connect -> query($sql);
                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($myPageTmp, $myPageDir.$myPageName);
                    echo "4번";
                    echo "$sql";
                    }
            } else {
                echo "오류";
            }
        }
        ?>
    <script>
        // location.href = "../login/login.php";
    </script>