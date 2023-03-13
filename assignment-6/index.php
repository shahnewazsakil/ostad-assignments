<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="tp-form mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="msg"></div>
                            <h3 class="mb-3">Add User</h3>
                            <div class="tp-input">
                                <form action="./users.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input name="username" type="text" class="form-control" id="name" placeholder="Username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Upload Image</label>
                                        <input name="photo" class="form-control" type="file" id="formFile">
                                    </div>     
                                    <div class="mb-3 mt-4">
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>                             
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
