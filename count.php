<?php
header('Content-type: application/json');
setlocale(LC_ALL, 'turkish');

include "dbConnection.php";

$data = (object)array(
    "request_type" => "",
    "city" => "",
    "result" => ""
);

$ALL_COUNT = "0";
$CITY_COUNT = "1";

$dbc = new DataBaseConnection();
$servername = $dbc->getServername();
$username = $dbc->getUsername();
$password = $dbc->getPassword();
$dbname = $dbc->getDbname();
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    echo "DATABASE CONNECTION ERROR";
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data["request_type"] == $ALL_COUNT) {
        $sql = $dbc->getCountAll();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data["result"] = $row["COUNT(*)"];
            }
        }

    } else if ($data["request_type"] == $CITY_COUNT) {
        $sql = $dbc->getCountCity($data["city"]);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data["result"] = $row["COUNT(*)"];
            }
        }
    }

    echo json_encode($data);
}

$conn->close();
?>