<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN')) {
    exit('Stop!!!');
}

if (!isset($lang_module) || !is_array($lang_module)) {
    $lang_module = []; // Đảm bảo $lang_module là một mảng trước khi thêm dữ liệu
}

$lang_module += [
    'content_add' => 'Thêm mới dữ liệu',
    'list_person' => 'Danh sách nhân sự',
    'cat' => 'Quản lý thể loại'
];


if (file_exists(NV_ROOTDIR . '/modules/web1/language/' . NV_LANG_DATA . '.php')) {
    require NV_ROOTDIR . '/modules/web1/language/' . NV_LANG_DATA . '.php';
}

$submenu['content_add'] = $lang_module['content_add'];
$submenu['list_person'] = $lang_module['list_person'];
$submenu['cat'] = $lang_module['cat'];

$allow_func = ['main', 'content_add', 'list_person'];

