<?php

if (!defined('NV_IS_MOD_WEB1')) die('Stop!!!');
die('File main.php đang chạy đúng');

global $global_config, $module_info, $module_name, $module_file;

$page_title = 'Danh sách bài viết';

// Kết nối database, lấy danh sách bài viết từ bảng `nv_web1`
$sql = 'SELECT id, title, description FROM ' . NV_PREFIXLANG . '_web1 ORDER BY id DESC';
$result = $db->query($sql);

$list = [];
while ($row = $result->fetch()) {
    $list[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'link_detail' => NV_BASE_SITEURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&op=detail&id=' . $row['id']
    ];
}

// Gọi XTemplate và load giao diện `main_list.tpl`
$xtpl = new XTemplate('main_list.tpl', NV_ROOTDIR . '/modules/' . '/themes/' . $global_config['module_theme'] . '/modules/web1');

foreach ($list as $row) {
    $xtpl->assign('TITLE', $row['title']);
    $xtpl->assign('DESCRIPTION', $row['description']);
    $xtpl->assign('LINK_DETAIL', $row['link_detail']);
    $xtpl->parse('main.loop');
}

// Kết thúc và hiển thị giao diện
$xtpl->parse('main');
$contents = $xtpl->text('main');

$categories = getCategories(); // Lấy danh mục từ database

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/web1');

foreach ($categories as $category) {
    $xtpl->assign('CATEGORY', [
        'ID' => $category['id'],
        'TITLE' => $category['title'],
        'ALIAS' => $category['alias'],
        'DESCRIPTION' => $category['description'],
    ]);
    $xtpl->parse('main.category'); // Sử dụng block category
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
