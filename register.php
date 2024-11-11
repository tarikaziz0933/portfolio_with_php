<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2>Register Here</h2>
                        </div>
                        <div class="card-body">
                            <form action="register_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Your Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Your Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Your Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Enter Your Picture</label>
                                    <input type="file" class="form-control" name="profile-picture"
                                        oninput="pic.src = window.URL.createObjectURL(this.files[0])">
                                    <img id="pic" style="max-width: 200px; max-height: 200px;" alt="">
                                </div>

                                <?php if(isset($_SESSION['invalid_extension'])){?>
                                <strong class="text-danger"><?= $_SESSION['invalid_extension']?></strong>
                                <?php } unset($_SESSION['invalid_extension'])?>

                                <?php if(isset($_SESSION['invalid_size'])){?>
                                <strong class="text-danger"><?= $_SESSION['invalid_size']?></strong>
                                <?php } unset($_SESSION['invalid_size'])?>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

<?php if(isset($_SESSION['success'])) { ?>
<script>
Swal.fire({
    position: "top-end",
    icon: "success",
    title: '<?=$_SESSION['success']?>',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } unset($_SESSION['success']) ?>

<?php if(isset($_SESSION['exist'])) { ?>
<script>
Swal.fire({
    position: "top-end",
    icon: "success",
    title: '<?=$_SESSION['exist']?>',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } unset($_SESSION['exist']) ?>