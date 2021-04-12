<?php

include "db.php";
ob_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

    <title>Update Users!</title>
  </head>
  <body>

  	<?php 
  		if (isset($_GET['up'])) {
  			$up_id = $_GET['up'];

  			$query = "SELECT * FROM users WHERE id = '$up_id'";
                $select_all_users = mysqli_query($connection, $query);
                $i = 0;
                while ( $row = mysqli_fetch_assoc($select_all_users) )
                {
                  $id      = $row['id'];
                  $name    = $row['name'];
                  $email   = $row['email'];
                  $pass    = $row['pass'];
                  $phone   = $row['phone'];
                  $i++;
                  }
  		}



  	?>
    
    <section class="container p-5 bg-light">
      <div class="row">
        <div class="col-md-8">
          <h3 class="mb-4 text-info">Update users</h3>
          <form method="POST">
            <div class="form-group">
              <label for="inputAddress">Full Name</label>
              <input type="text" required class="form-control" name="up_name" id="inputAddress" placeholder="Name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group ">
              <label for="inputEmail4">Email</label>
              <input type="email" required class="form-control" name="up_em" id="inputEmail4" placeholder="Email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label for="inputPassword4">Password</label>
              <input type="password" required class="form-control" name="up_pass" id="inputPassword4" placeholder="Password" value="<?php echo $pass; ?>">
            </div>
            <div class="form-group">
              <label for="inputAddress">Phone Number</label>
              <input type="number" required class="form-control" name="up_phn" id="inputAddress" placeholder="Phone" value="<?php echo $phone; ?>">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
          </form>
        </div>
      </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

<?php

if (isset($_POST['update'])) {
	$up_name 	= $_POST['up_name'];
	$up_em    	= $_POST['up_em'];
	$up_pass 	= $_POST['up_pass'];
	$up_phn 	= $_POST['up_phn'];

	$query = "UPDATE users SET name ='$up_name', email ='$up_em', pass ='$up_pass', phone ='$up_phn'WHERE id='$id'";

	$update_usr = mysqli_query($connection, $query);

	if ( !$update_usr ){
			die("Query Failed " . mysqli_error($connection));
		}
	else{
		header("Location: index.php");
	}
}

  

ob_end_flush();
?>





    
  </body>
</html>