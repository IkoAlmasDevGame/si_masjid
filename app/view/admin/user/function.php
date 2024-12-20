<?php
if (isset($_GET['dialog'])):
    if ($_GET['dialog'] == "success") {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Successfully added</h4>
    <p>Pegawai has been added</p>
    <hr>
    <div class="text-end">
        <button type="button" class="btn btn-default"
            onclick="document.location.href = '../ui/header.php?aksi=tambah-pegawai'" data-bs-dismiss="alert"
            aria-label="Close">Close</button>
    </div>
</div>
<?php
    } else if ($_GET['dialog'] == "delete") {
    ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Successfully Delete</h4>
    <p>Pegawai has been delete</p>
    <hr>
    <div class="text-end">
        <button type="button" class="btn btn-default" onclick="document.location.href = '../ui/header.php?page=pegawai'"
            data-bs-dismiss="alert" aria-label="Close">Close</button>
    </div>
</div>
<?php
    }
endif;