<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reason = $_POST['reason'];
    $professional = $_POST['professional'];
    $result = $_POST['result'];


    if ($reason == "TD" & $professional == "MO" & $result == "1B") {
        $success = "";

    } else {

        $error = "";
    }

}
?>

<?php if (isset($success)): ?>
    <?php echo '<script type="text/javascript">
    Swal.fire("Paid Claim!", "Claim Successfully Adjudicated", "success");
</script>';
    ?>

<?php elseif (isset($error)): ?>
    <?php echo '<script type="text/javascript">
    Swal.fire("Invalid DUR sequence","ERROR","error");
</script>' ?>
<?php endif; ?>