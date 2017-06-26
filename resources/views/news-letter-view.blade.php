<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NewsLetter Application | Automating Mails</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <hr>
            <div class="header text-center">
                <span>Apply to receive our Newsletter via Email</span>
            </div>
            <br>
            @if (session('alert'))
                <p class="alert alert-success">{{ session('alert') }}</p>
            @endif
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                        <p class="text-center alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ url('apply-two') }}" method="post" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="jane.test@example.com">
                </div>
                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
