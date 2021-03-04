<?php
include './common.php';

$conn = connectDB();
/* $sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', `id`, 'name', `good`, 'price', `price`, 'img', `photo`, 'feature', `feature`)) FROM goods"; */
$sql = "SELECT `id`, `good`, `price`, `photo`, `feature` FROM goods";
$result = $conn->query($sql);
$json = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json[] = [
            'id' => $row['id'],
            'name' => $row['good'],
            'price' => $row['price'],
            'img' => $row['photo'],
            'feature' => $row['feature']
        ];
    }	
}else{
    echo "No record found";
}
echo json_encode($json);
$conn->close();
?>