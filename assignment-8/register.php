<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shahnewaz Sakil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="form-wrapper pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="form-input-wrapper">
                        <h1 class="mb-4">Register Here</h1>
                        <form action="./register.php" method="POST">
                            <div class="mb-3">
                                <label for="f_name" class="form-label">First Name</label>
                                <input name="f_name" type="text" class="form-control" id="f_name" placeholder="First Name">
                            </div> 

                            <div class="mb-3">
                                <label for="l_name" class="form-label">Last Name</label>
                                <input name="l_name" type="text" class="form-control" id="l_name" placeholder="First Name">
                            </div>  

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email address">
                                <p id="valid_mail"></p>
                            </div> 

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            </div> 

                            <div class="mb-3">
                                <label for="con_password" class="form-label">Confirm Password</label>
                                <input name="con_password" type="password" class="form-control" id="con_password" placeholder="Confirm Password">
                                <p id="match_pass"></p>
                            </div>  

                            <div class="mb-3">
                                <button name="submit_btn" type="submit" class="btn btn-primary"> Register</button>
                            </div>                                                                                                                               
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
