<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
    <style>
    body, html {
        height: 100%;
        font-family: Arial, Helvetica, sans-serif; /* 폰트변경 */
    }
    * {
        box-sizing: border-box;
    }
    .bg-img {
        /* The image used */
        background-image: url("img/Dmaket.png");
        min-height: 380px;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    /* Add styles to the form container */
    .container {
        position: absolute;
        right: 0;
        margin: 20px;
        max-width: 300px;
        padding: 16px;
        background-color: white;
    }
    /* Full-width input fields */
    input[type=text], input[type=number] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }
    input[type=text]:focus, input[type=number]:focus {
        background-color: #ddd;
        outline: none;
    }
    input[type=radio] {
        margin: 5px 0;
    }
    /* Set a style for the submit button */
    .btn {
        background-color: #007bff;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    .btn:hover {
        opacity: 1;
    }
    .title {
        position: absolute;
        top: 10px;
        left: 40px;
        color: white;
    }
     </style>
</head>
<body>
    <?php
    $selllist = $_GET['selllist'];
    $price = $_GET['price'];

    ?>
    <h2>장바구니 담기</h2>
    <p>장바구니에 선택한 물품를 추가합니다.</p>
    <hr>
    <div class="bg-img">
    <div class="container">
        <form action="addcartproc.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">물품</label>
                </div>
                <div class="col-75">
                    <input type="text" name="selllist" value="<?=$selllist?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">가격</label>
                </div>
                <div class="col-75">
                    <input type="radio" name="size" value="price" checked> 가격(<?=$price?>)
                    <input type="text" name="price" value="<?=$price?>" hidden>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">수량</label>
                </div>
                <div class="col-75">
                    <input type="number" name="qty" value="1" min="1" max="20">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="담기" class="btn">
            </div>
        </form>
    </div>
    </div>
</body>
</html>



















