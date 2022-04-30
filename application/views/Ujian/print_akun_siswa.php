<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="https://smkth-jakbar.com/assets/images/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>ADMINISTRATOR CBT</title>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <img src="https://smkth-jakbar.com/assets/images/logo.png" style="width: 160px;height: 160px;margin-top: 20px;">
            <div class="col-md mt-4">
                <table class="table border">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold text-center text-uppercase">computer based test </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-center text-uppercase">akun siswa</td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold text-center text-uppercase"><?= $header['kelas'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><br>
        <hr style="border-top: 2px dashed black;">

        <table class="table table-bordered text-uppercase">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama siswa</th>
                    <th scope="col">kelas</th>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $no = 1;
                    foreach ($siswa as $row) {
                    ?>
                        <td><?php echo $no++; ?></td>
                        <td class="text-uppercase"><?= $row['nama_siswa'] ?></td>
                        <td><?= $row['kelas'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>


                </tr>
            <?php } ?>
            </tbody>
        </table>


    </div>


    <!-- <script>
        window.print();
    </script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>