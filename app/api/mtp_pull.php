<?php
require_once __DIR__ . "/db.php";

$session_id = trim($_GET["session_id"] ?? "");
if ($session_id === "") {
  http_response_code(400);
  echo json_encode(["error" => "session_id required"]);
  exit;
}

$conn = db();
$stmt = $conn->prepare("SELECT session_id, current_node, session_state, updated_at FROM routing_table WHERE session_id=?");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$res = $stmt->get_result()->fetch_assoc();

if (!$res) {
  http_response_code(404);
  echo json_encode(["error" => "session not found"]);
  exit;
}

echo json_encode(["ok" => true, "data" => $res], JSON_UNESCAPED_UNICODE);
