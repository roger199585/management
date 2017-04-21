<?php 
    include("config.php");

    $sql = "SELECT count(*) FROM product WHERE shop = 'friday'";
    $result = mysqli_query($db, $sql);
    $friday = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $sql = "SELECT count(*) FROM product WHERE shop = 'yahoo'";
    $result = mysqli_query($db, $sql);
    $yahoo = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $sql = "SELECT count(*) FROM product WHERE shop = 'momo'";
    $result = mysqli_query($db, $sql);
    $momo = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $sql = "SELECT count(*) FROM product WHERE shop = 'pcstore'";
    $result = mysqli_query($db, $sql);
    $pchome = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $Web_data = array (
        'friday' => $friday['count(*)'],
        'yahoo' => $yahoo['count(*)'],
        'momo' => $momo['count(*)'],
        'pchome' => $pchome['count(*)']
    )
?>

<script type="text/javascript">
    var Wdata = <?php echo json_encode($Web_data); ?>
</script>