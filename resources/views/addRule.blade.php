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
    <h2>Thêm luật</h2>
    <form class="form-horizontal" role="form">
        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading">Tiền đề</div>
                <div class="panel-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <select class="form-control" id="criteria" name="criteria">
                                <option>Tiêu chí 1</option>
                                <option>Tiêu chí 2</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="criteria" name="criteria">
                                <option>>=</option>
                                <option>
                                    <=</option> </select> </div> <div class="col-md-3">
                            <input type="text" class="form-control" id="score" placeholder="Nhập điểm từ 0 đến 1" name="score">
                        </div>
                    </div>
                    <p>AND</p>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Kết luận</div>
                <div class="panel-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <select class="form-control" id="criteria" name="criteria">
                                <option>Sự kiện 1</option>
                                <option>Sự kiện 2</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="score" placeholder="Nhập điểm từ 0 đến 1" name="score">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Trạng thái</div>
                <div class="panel-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <select class="form-control" id="criteria" name="criteria">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="submit" class="btn btn-danger">Huỷ bỏ</button>
    </form>
</div>
</body>

</html>
