<?php
session_start();

?>


<?php require "../dashboard_parts/header.php" ?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">

        <div class="row mt-3">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Update User</h2>
                    </div>
                    <div class="card-body">
                        <form action="update_user_edit.php" method="POST" enctype="multipart/form-data">
                            <div class="mt-3">
                                <label for="" class="form-label">Enter Your Name</label>
                                <input type="hidden" value="<?=$after_assoc_select_profile_info['id']?>"
                                    class="form-control" name="id">
                                <input type="text" value="<?=$after_assoc_select_profile_info['name']?>"
                                    class="form-control" name="name">
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Enter Your Email</label>
                                <input type="email" value="<?=$after_assoc_select_profile_info['email']?>"
                                    class="form-control" name="email">
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Enter Your Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Enter Your Picture</label>
                                <input type="file" class="form-control" name="profile_picture"
                                    oninput="pic.src = window.URL.createObjectURL(this.files[0])">
                                <img id="pic" style="max-width: 200px; max-height: 200px;"
                                    src="../uploads/users/<?=$after_assoc_select_profile_info['profile_picture']?>"
                                    alt="">
                            </div>

                            <?php if(isset($_SESSION['invalid_extension'])){?>
                            <strong class="text-danger"><?= $_SESSION['invalid_extension']?></strong>
                            <?php } unset($_SESSION['invalid_extension'])?>

                            <?php if(isset($_SESSION['invalid_size'])){?>
                            <strong class="text-danger"><?= $_SESSION['invalid_size']?></strong>
                            <?php } unset($_SESSION['invalid_size'])?>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

<?php require "../dashboard_parts/footer.php" ?>


<?php if(isset($_SESSION['update'])) { ?>
<script>
Swal.fire({
    position: "top-end",
    icon: "update",
    title: '<?= $_SESSION['update']?>',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } unset($_SESSION['update']) ?>