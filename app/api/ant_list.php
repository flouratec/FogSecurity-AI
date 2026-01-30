<?php
require_once __DIR__ . "/db.php";

$conn = db();
$result = $conn->query("SELECT node_mac, mac_hash, status, created_at FROM ant_table ORDER BY created_at DESC");

$rows = [];
while ($r = $result->fetch_assoc()) {
    $rows[] = $r;
}

echo json_encode(["ok" => true, "nodes" => $rows], JSON_UNESCAPED_UNICODE);
