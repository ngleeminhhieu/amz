<?php
echo '<pre>', print_r($_POST), '</pre>';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Test control CKeditor</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        var PUBLIC = 'http://localhost:81/ckdemo/';
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script src="myscript.js"></script>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="">soạn thảo văn bản</label>
                <textarea type="text" name="noidung" id="noidung" class="form-control"></textarea>
                <script>
                    CKEDITOR.replace('noidung')
                </script>
            </div>
            <div class="form-group">
                <label for="">Hình đại diện</label>
                <img width="100" />
                <input type="hidden" name="hinh" id="hinh" class="form-control" />
                <button class="btn btn-primary" onclick="openfile('hinh')" type="button">Chọn hình</button>
            </div>
            <div class="form-group">
                <label for="">Tên sản phâm</label>
                <input type="text" onchange="stralias('ten','ten_url')" name="ten" id="ten" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Tên url</label>
                <input type="text" name="ten_url" id="ten_url" class="form-control" />
            </div>
            <div class="form-group">
                <button>Submit</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
