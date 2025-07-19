<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))

                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Reset Password</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reset-password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="oldPassword"><strong>Old Password</strong></label>
                            <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Enter old password" required>
                        </div>

                        <div class="form-group">
                            <label for="newPassword"><strong>New Password</strong></label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Enter new password" required>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword"><strong>Confirm New Password</strong></label>
                            <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" placeholder="Confirm new password" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Update Password</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
<script src="{{asset('admin_assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").alert('close');
        }, 5000);
    });
</script>
