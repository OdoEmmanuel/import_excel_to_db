<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Excel File in Laravel</title>
    <script rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <br />

    <div class="container">
        <h3 align="center">Import Excel File in Laravel</h3>
        <br />

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                Upload Validation Error<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success '))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
            </div>
        @endif
    <form action="{{ url('import_excel/import') }}" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right">
                        <label for="">
                            File for Upload
                        </label>
                    </td>
                    <td width="30">
                        <input type="file" name="select_file" />
                    </td>
                    <td width="30%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer Data</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-border table-striped">
                            <tr>
                                <th>Customer Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Postal Code</th>
                                <th>Country</th>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

</body>
</html>
