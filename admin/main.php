<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$sql = "SELECT * FROM nv5_en_web1_personal";
$result = $db->query($sql);

if (!$result) {
    die('Lỗi SQL: ' . $db->errorInfo()[2]);
}

// Kiểm tra xem có dữ liệu không
if ($result->rowCount() == 0) {
    die('Không có dữ liệu trong bảng.');
}
global $lang_module;

$array = [];
$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/modules/' . '/themes/'. $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign("ADD_URL", NV_BASE_SITEURL . "index.php?module=" . $module_name . "&op=content_add");
while ($row = $result->fetch()) {
    var_dump($row); // Kiểm tra dữ liệu có đúng không
    $xtpl->assign('DATA', $row);
    $xtpl->parse('main.row');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
echo "<pre>";
print_r($contents);
echo "</pre>";
