<?php

if (!defined('NV_IS_FILE_ADMIN')) { // Sửa đúng tên module
    exit('Stop!!!');
}

$xtpl = new XTemplate('content_add.tpl', NV_ROOTDIR . '/modules/' . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';

    if (!empty($fullname) && !empty($email)) {
        $stmt = $db->prepare("INSERT INTO " . NV_PREFIXLANG . "_web1_personal (fullname, email, phone, address) VALUES (:fullname, :email, :phone, :address)");
        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            header("Location: " . NV_BASE_SITEURL . "index.php?module=" . $module_name);
            exit();
        }
    }
}

$xtpl->parse("main");
$contents = $xtpl->text("main");

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents); 
include NV_ROOTDIR . '/includes/footer.php';

?>
