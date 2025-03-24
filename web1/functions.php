<?php

/**
 * @Project NUKEVIET
 * @Author  Bạn (your email)
 * @Createdate 2024
 */

if (!defined('NV_SYSTEM')) die('Stop!!!');

global $module_name, $module_file, $module_info, $lang_module, $global_config;

// Định nghĩa hằng số cho module này
if (!defined('NV_IS_MOD_WEB1')) {
    define('NV_IS_MOD_WEB1', true);
}

/**
 * Lấy danh sách bài viết từ database
 */
function getArticles($limit = 10)
{
    global $db, $module_data;

    $sql = "SELECT id, title, alias, description FROM " . NV_PREFIXLANG . "_" . $module_data . "_personal ORDER BY id DESC LIMIT " . $limit;
    $result = $db->query($sql);
    
    $data = [];
    while ($row = $result->fetch()) {
        $row['link_detail'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=web1&op=" . $row['alias'];
        $data[] = $row;
    }
    
    return $data;
}

function getCategories()
{
    global $db, $module_data;
    
    $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_categories ORDER BY weight ASC";
    $result = $db->query($sql);
    
    $categories = [];
    while ($row = $result->fetch()) {
        $categories[] = $row;
    }

    return $categories;
}
