<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $error = [];

    function input_valid($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = input_valid($_POST['username']);
    $email = input_valid($_POST['email']);
    $password = md5((input_valid($_POST['password'])));

   

    if(empty($username) OR empty($email) OR empty($password)){
        echo "All Field Must be filled";
        return false;
    }

    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {  
        echo "Only alphabets and white space are allowed";
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        array_push($error, "Invalid email format");
        return false;
    }  

    if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
        
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_ext = $_FILES['photo']['type'];
        $photo_size = $_FILES['photo']['size'];
    
        $allow_ext = array('png', 'jpg');
    
        $photo_ext_name = explode('.' , $photo_name);
    
        $photo_ext_final = end($photo_ext_name);
    
        if(in_array($photo_ext_final, $allow_ext) === false){
            echo "File extension is not allowed";
            return false;
        }
    
        if($photo_size > 2097152){
            echo "File size must be lower than 2mb";
            return false;
        }
    
        $date = date('Y-m-d_H-i-s');
    
        $photo_final_name = $date . "-" . basename($photo_name);
    
        if(move_uploaded_file($photo_tmp_name, "./uploads/{$photo_final_name}")){
            
        }else{
            echo "Failed";
        }
        
    }


    $data = [
        [$username, $email, $password, $photo_final_name]
    ];

    if(file_exists('users.csv')){
        $filePath = 'users.csv';
        $fp = fopen($filePath, 'a');
        foreach ($data as $value) {
            fputcsv($fp, $value, ',');
        }
        fclose($fp);

    }else{
        $filePath = fopen("users.csv", "w") or die("Unable to open file!");
        $filePath = 'users.csv';
        $fp = fopen($filePath, 'a');
        foreach ($data as $value) {
            fputcsv($fp, $value, ',');
        }
        fclose($fp);
    }

    
}

if(file_exists('./users.csv')){
    $filename = './users.csv';
    $data = [];
    
    // open the file
    $fp = fopen($filename, 'r');
    
    if ($fp === false) {
        die('Cannot open the file ' . $filename);
    }
    
    while (($row = fgetcsv($fp)) !== false) {
        $data[] = $row;
    }

}else{
    return false;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        td, th{
            vertical-align: middle;
        }
    </style>
</head>
<body style="background-color: #f5f5f5;">

    <div class="tp-table" style="padding-top: 120px; padding-bottom: 120px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4">
                        <h3>Users Table</h3>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Photo</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($data as $value) : ?>
                              <tr>
                                <th><?php echo $i; ?></th>
                                <td><?php echo $value[0]; ?></td>
                                <td><?php echo $value[1]; ?></td>
                                <td>
                                    <img width="60" style="border-radius: 8px;" src="uploads/<?php echo $value[3]; ?>" alt="img">
                                </td>
                              </tr>
                              <?php $i++; endforeach; ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>