<?php
if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

global $db, $db_config;

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Xóa dữ liệu khỏi bảng
    $sql = "DELETE FROM " . $db_config['prefix'] . "_en_web1_personal WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✅ Xóa dữ liệu thành công!</p>";
    } else {
        echo "<p style='color: red;'>❌ Lỗi khi xóa dữ liệu.</p>";
    }
}

header("Location: index.php?language=en&nv=web1&op=content_list");
exit();
?>
