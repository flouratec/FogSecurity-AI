<?php
require_once __DIR__ . "/db.php";

$conn = db();
$result = $conn->query("SELECT session_id, current_node, updated_at FROM routing_table ORDER BY updated_at DESC");

$rows = [];
while ($r = $result->fetch_assoc()) {
    $rows[] = $r;
}

echo json_encode(["ok" => true, "sessions" => $rows], JSON_UNESCAPED_UNICODE);
