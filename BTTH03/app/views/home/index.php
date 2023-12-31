<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div style="display: flex; justify-content: space-between;" class="my-3">
            <h3>Songs Detail</h3>
            <a href="<?=DOMAIN.'app/views/events/add.php'?>" class="btn btn-success "><i class="bi bi-plus "></i>New</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Singer</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($songs as $song) {
                    ?>
                    <tr>
                        <th scope="row"><?= $song->getidSong() ?></th>
                        <td><?= $song->getnameSong() ?></td>
                        <td><?= $song->getsinger() ?></td>
                        <td>
                        <a href="<?=DOMAIN.'app/views/events/view.php?id='.$song->getidSong()?>"><i class="bi bi-eye"></i></a>
                        <a href="<?=DOMAIN.'app/views/views/edit.php?id='.$song->getidSong()?>"><i class="bi bi-pencil"></i></a>
                        <a href="<?=DOMAIN.'app/views/views/delete.php?id='.$song->getidSong()?>"><i class="bi bi-trash"></i></a>
                        </td>

                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>