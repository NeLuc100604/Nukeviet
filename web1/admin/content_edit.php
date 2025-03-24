<?php
if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

global $db, $db_config, $lang_module;

$id = $nv_Request->get_int('id', 'get', 0);

if ($id > 0) {
    $sql = "SELECT fullname, email, phone, address FROM " . $db_config['prefix'] . "_en_web1_personal WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $person = $stmt->fetch();

    if (!$person) {
        trigger_error("Không tìm thấy dữ liệu để chỉnh sửa!", 256);
        nv_redirect_location(NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=content_list");
    }
}

if ($nv_Request->isset_request('submit', 'post')) {
    $fullname = $nv_Request->get_title('fullname', 'post', '');
    $email = $nv_Request->get_title('email', 'post', '');
    $phone = $nv_Request->get_title('phone', 'post', '');
    $address = $nv_Request->get_title('address', 'post', '');

    $sql = "UPDATE " . $db_config['prefix'] . "_en_web1_personal 
            SET fullname = :fullname, email = :email, phone = :phone, address = :address WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        nv_redirect_location(NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=content_list");
    } else {
        trigger_error("Lỗi khi cập nhật dữ liệu!", 256);
    }
}

$xtpl = new XTemplate('edit.tpl', NV_ROOTDIR . '/modules/' . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('DATA', $person);
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';