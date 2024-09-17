<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('inc.style')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container p-5 ">
    <div class="row p-5">
        <div class="">
            <form action="{{ url('adminsignin') }}" method="post" >
                <div class="modal-body">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" name="password"class="form-control" required>
                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary mx-2">SignIn</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>
