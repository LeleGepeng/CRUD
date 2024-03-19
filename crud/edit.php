<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/update-form.css">
</head>
<body>
<?php

include "view_koneksi.php";

$Id = $_GET['Id'];

$query = "SELECT * FROM komen WHERE Id = $Id";
$result = mysqli_query($mysqli, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    $Nama = $row['Nama'];
    $Email = $row['Email'];
    $Telepon = $row['Telepon'];
    $Pesan = $row['Pesan'];
} else {
    echo "No record found.";
    exit();
}

if(isset($_POST['submit'])){
    $Nama = $_POST['Nama'];
    $Email = $_POST['Email'];
    $Telepon = $_POST['Telepon'];
    $Pesan = $_POST['Pesan'];

    $query = "UPDATE komen SET Nama = '$Nama', Email = '$Email', Telepon = '$Telepon', Pesan = '$Pesan' WHERE Id = $Id";

    if(mysqli_query($mysqli, $query)){
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}

?> 
    <div class="container">
    <form class="update-form" method="post">
    <h2>FORM UPDATE</h2>
        <div class="row g-3">
             <div class="col-md-6">
                <div class="form-floating">
                     <input type="text" class="form-control" name="Nama" value="<?php echo $Nama; ?>" required>
                    <label for="name">Nama Anda </label>
                </div>
                    </div>
        <div class="col-md-6">
            <div class="form-floating">
                    <input type="email" class="form-control" name="Email" value="<?php echo $Email; ?>" required>
                    <label for="email">Email Anda</label>
                        </div>
                            </div>
         <div class="col-md-6">
         <div class="form-floating">
                     <input type="text" class="form-control" name="Telepon" value="<?php echo $Telepon; ?>" required>
                    <label for="name">No Telepon Anda </label>
                </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-floating">
                     <input type="text" class="form-control" name="Pesan" value="<?php echo $Pesan; ?>" required>
                    <label for="name">Pesan</label>
                </div>
                            </div>
            <div class="col-12">
                <div class="form-floating">
                <textarea class="form-control" name="request" style="height: 100px;" required><?php echo $request; ?></textarea>

                 </div>
                 </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary w-100 py-3" name="submit" value="Update">
            <a href="dashboard.php">
            <button style="margin-top: 10px;" class="btn btn-primary w-100 py-3" type="button">Cek Update</button> </a>
                                    
                                </div>
                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
   
</form>

</body>
</html>




                       
