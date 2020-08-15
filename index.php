<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-CRUD</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<?php require_once'process.php';?>

<?php  if (isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type'] ?>">

<?php 
echo $_SESSION['message'];
unset($_SESSION ['message']);
?>
</div>
<?php endif?>



<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "crud", 3308);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

}
$result =$mysqli->query("SELECT * FROM data")or die ($mysqli->error);
// pre_r($result->fetch_assoc());
?>

<div class="row container-fluid ">
<table class="table table-bordered table-striped text-center table-dark">
<thead>
    <tr>
        <th>name</th>
        <th>Location</th>
        <th colospan="0.25">Action</th>
    </tr>

</thead>
<?php
while ($row =$result->fetch_assoc()):?>
<tr>
    <td><?php  echo $row ['name'];?></td>
    <td><?php  echo $row ['location'];?></td>
    <td>

<a href="index.php?edit=<?php echo $row['id']; ?>"
class="btn btn-info">Edit</a>

<a href="index.php?delete=<?php echo $row['id']; ?>"
class="btn btn-danger">Delete</a>

    </td>
</tr>
<?php endwhile?>
</table>
</div>


<div class ="row justify-content-center">
    <form action="index.php"method="POST">
    <div class="form-group">
    <label>Name</label>
    <input type="text"name="name" class="form-control" value="<?php echo $name?>" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
    <label>Location</label>
    <input type="text"name="location" class="form-control"   value="<?php echo $location?>"placeholder= "Enter Your Location">
    </div>

    <?php
      if($update==true):
    ?>
    <button type ="btn btn-info"type="submit" name="update">update</button>
    <?php else :
    
    ?>
    <div class="form-group">
    <button class ="btn btn-primary"type="submit" name="save">Save</button>
    </div>
    <?php endif?>
    
    </form>
    </div>
</body>
</html>