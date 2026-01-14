<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mac = $_POST['mac_address'];
    $hash = hash('sha256', $mac);

    $sql = "INSERT INTO ant_table (node_mac, mac_hash, status)
            VALUES ('$mac', '$hash', 'Trusted')";
    if ($conn->query($sql) === TRUE) {
        echo "Node securely added to ANT.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
