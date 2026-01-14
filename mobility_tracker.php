<?php
include('config.php');

function pushSessionState($session_id, $state_json) {
    global $conn;
    $stmt = $conn->prepare("REPLACE INTO routing_table (session_id, session_state) VALUES (?, ?)");
    $stmt->bind_param("ss", $session_id, $state_json);
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_id = $_POST['session_id'];
    $state_json = $_POST['state_json'];
    pushSessionState($session_id, $state_json);
    echo "Session state updated successfully.";
}
?>
