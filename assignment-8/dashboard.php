<?php 

include_once './config.php';
include_once './session.php';

$id = $_GET['id'];

class User{
  private $db;
    
  public function __construct()
  {
      $this->db = new Database();
  }

  public function get_user($id){
    $sql = "SELECT * FROM tbl_users WHERE id = '{$id}'";

    $result = mysqli_query($this->db->conn, $sql) or die("SQL Error");

    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $name = $row['first_name'];
      return $name;
    }
  }
}

$obj = new User();
$test = $obj->get_user($id);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shahnewaz Sakil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>


    <div class="admin-dashboard">
      <?php if(!empty($test)) : ?>
      <h1>Welcome <?php echo $test ?></h1>
      <?php endif; ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
