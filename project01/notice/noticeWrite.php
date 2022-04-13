<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 작성하기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boardWrite.php 
    -->

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

    <main id="main">
        <div class="board_section">
            <!-- section -->
            <section class="board">
                <div class="title">
                    <div class="title_box">
                        <h2>공지사항</h2>
                        <p>새로운 소식을 빠르게 만나보세요.</p>
                    </div>
                    <div class="title_menu">
                        <a href="../board/board.php"><span>자유게시판</span></a>
                        <a href="notice.php"><span>공지사항</span></a>
                        <a href="../service/service.php"><span>고객센터</span></a>
                    </div>
                </div>
            <div class="board__inner">
            <div class="board__modify">
                        <form action="noticeWriteSave.php" name="noticeWriteSave" method="post">
                            <fieldset>
                                <legend class="ir_so">게시글 작성 영역</legend>
                                <div>
                                    <label for="noticeTitle">제목</label>
                                    <input type="text" name="noticeTitle" id="noticeTitle" placeholder="제목을 넣어주세요" required>
                                </div>
                                <div>
                                    <label for="noticeContents">내용</label>
                                    <textarea name="noticeContents" id="noticeContents" placeholder="내용을 입력해주세요." required></textarea>
                                    <!-- <input type="text" name="boardContents" id="boardContents"> -->
                                </div>
                                <div class="right">
                                    <button type="submit" value="저장하기" class="search-btn">저장하기</button>
                                </div>
                            </fieldset>
                        </form>
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