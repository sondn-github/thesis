<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Thêm tài khoản</h2>
    <form action="/action_page.php">
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name">
        </div>
        <div class="form-group">
            <label for="email">Địa chỉ Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pwd">
        </div>
        <div class="form-group">
            <label for="specialty">Chuyên ngành:</label>
            <input type="text" class="form-control" id="specialty" placeholder="Nhập chuyên ngành" name="specialty">
        </div>
        <div class="form-group">
            <label for="level">Trình độ học vấn:</label>
            <select class="form-control" id="level" name="level">
                <option>Giáo sư</option>
                <option>Phó giáo sư</option>
                <option>Tiến sĩ</option>
                <option>Thạc sĩ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="reliability">Độ tin cậy:</label>
            <input type="text" class="form-control" id="reliability" placeholder="Nhập độ tin cậy của chuyên gia (từ 1 đến 10)" name="reliability">
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select class="form-control" id="status" name="status">
                <option>Active</option>
                <option>Inacitve</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Đăng kí</button>
    </form>
</div>

</body>
</html>


