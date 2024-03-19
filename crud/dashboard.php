<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="tabel.css" class="">


</head>

<body>
    <?php
    include "view_koneksi.php";
    ?>

    <form action="" method="get" style="justify-content: center; align-items: center; display: flex; gap: 5px;">
        <input style="padding: 10px 25px; border-radius: 5px; float: center; border: 1px solid #ccc;" type="text" name="search" placeholder="Search...">
        <button style="background-color : #508ABC ; padding :10px 5px; " type="submit">Search</button>
    </form>
    <br>

    <?php
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $tampil = mysqli_query($mysqli, "select * from komen where name like '%$search%' or email like '%$search%' or date like '%$search%' or people like '%$search%' or request like '%$search%'");
    } else {
        $tampil = mysqli_query($mysqli, "select * from komen");
    }
    $no = 1;
    ?>

    <table border="1" id="datatables">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($hasil = mysqli_fetch_array($tampil)) {
            ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $hasil['Nama']; ?></td>
                    <td><?php echo $hasil['Email']; ?></td>
                    <td><?php echo $hasil['Telepon']; ?></td>
                    <td><?php echo $hasil['Pesan']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $hasil['Id']; ?>"><button id="btnedit">Edit</button></a>
                        <a href="delete.php?id=<?php echo $hasil['Id']; ?>"><button id="btndelete">Hapus</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "searching": false
            });
        });
    </script>

</body>

</html>