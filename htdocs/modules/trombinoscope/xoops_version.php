<?php

//declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Trombinoscope module for xoops
 *
 * @copyright      2021 XOOPS Project (https://xoops.org)
 * @license        GPL 2.0 or later
 * @package        trombinoscope
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<https://kiolo.fr>
 */

// 
$moduleDirName      = \basename(__DIR__);
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
// ------------------- Informations ------------------- //
$modversion = [
    'name'                => \_MI_TROMBINOSCOPE_NAME,
    'version'             => 1.9,
    'module_status'       => 'Beta 1',
    'release_date'        => '20224/09/01',
    'description'         => \_MI_TROMBINOSCOPE_DESC,
    'author'              => 'JJDai (Jean-Jacques Delalandre)',
    'author_mail'         => 'jjdelalandre@orange.fr',
    'author_website_url'  => 'http://xoopsfr.kiolo.fr',
    'author_website_name' => 'XoopsFr',
    'credits'             => 'XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'https://www.gnu.org/licenses/gpl-3.0.en.html',
    'help'                => 'page=help',
    'release_info'        => 'release_info',
    'release_file'        => \XOOPS_URL . '/modules/trombinoscope/docs/release_info file',
    'manual'              => 'link to manual file',
    'manual_file'         => \XOOPS_URL . '/modules/trombinoscope/docs/install.txt',
    'min_php'             => '7.0',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.6', 'mysqli' => '5.6'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => \basename(__DIR__),
    'dirmoduleadmin'      => 'Frameworks/moduleclasses/moduleadmin',
    'sysicons16'          => '../../Frameworks/moduleclasses/icons/16',
    'sysicons32'          => '../../Frameworks/moduleclasses/icons/32',
    'modicons16'          => 'assets/icons/16',
    'modicons32'          => 'assets/icons/32',
    'demo_site_url'       => 'https://sages91.fr',
    'demo_site_name'      => 'Conseil des Sages',
    'support_url'         => 'https://www.frxoops.org/modules/newbb/',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'https://github.com/JJDai54',
    'module_website_name' => 'GitHub',
    'release'             => '2022-03-28',
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'hasMain'             => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    'onInstall'           => 'include/install.php',
    'onUninstall'         => 'include/uninstall.php',
    'onUpdate'            => 'include/update.php',
];
// ------------------- Templates ------------------- //
$modversion['templates'] = [
    // Admin templates
    ['file' => 'trombinoscope_admin_about.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_header.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_index.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_members.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_categories.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_qualities.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_clone.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'trombinoscope_admin_footer.tpl', 'description' => '', 'type' => 'admin'],
    // User templates
    ['file' => 'trombinoscope_header.tpl', 'description' => ''],
    ['file' => 'trombinoscope_index.tpl', 'description' => ''],
    ['file' => 'trombinoscope_members.tpl', 'description' => ''],
    ['file' => 'trombinoscope_members_list.tpl', 'description' => ''],
    ['file' => 'trombinoscope_members_item.tpl', 'description' => ''],
    ['file' => 'trombinoscope_members_fiche.tpl', 'description' => ''],
    ['file' => 'trombinoscope_categories.tpl', 'description' => ''],
    ['file' => 'trombinoscope_categories_list.tpl', 'description' => ''],
    ['file' => 'trombinoscope_categories_item.tpl', 'description' => ''],
    ['file' => 'trombinoscope_breadcrumbs.tpl', 'description' => ''],
    ['file' => 'trombinoscope_search.tpl', 'description' => ''],
    ['file' => 'trombinoscope_footer.tpl', 'description' => ''],
];
// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'] = [
    'trombinoscope_members',
    'trombinoscope_categories',
    'trombinoscope_qualities',
];
// ------------------- Search ------------------- //
$modversion['hasSearch'] = 1;
$modversion['search'] = [
    'file' => 'include/search.inc.php',
    'func' => 'trombinoscope_search',
];
// ------------------- Menu ------------------- //
$currdirname  = isset($GLOBALS['xoopsModule']) && \is_object($GLOBALS['xoopsModule']) ? $GLOBALS['xoopsModule']->getVar('dirname') : 'system';
if ($currdirname == $moduleDirName) {
//     $modversion['sub'][] = [
//         'name' => \_MI_TROMBINOSCOPE_SMNAME1,
//         'url'  => 'index.php',
//     ];
    // Sub members
    $modversion['sub'][] = [
        'name' => \_MI_TROMBINOSCOPE_SMNAME2,
        'url'  => 'members.php',
    ];
//     // Sub Submit
//     $modversion['sub'][] = [
//         'name' => \_MI_TROMBINOSCOPE_SMNAME3,
//         'url'  => 'members.php?op=new',
//     ];
//     // Sub categories
//     $modversion['sub'][] = [
//         'name' => \_MI_TROMBINOSCOPE_SMNAME4,
//         'url'  => 'categories.php',
//     ];
//     // Sub Submit
//     $modversion['sub'][] = [
//         'name' => \_MI_TROMBINOSCOPE_SMNAME5,
//         'url'  => 'categories.php?op=new',
//     ];
}
// ------------------- Blocks ------------------- //
// Members last
/* pas géré pour l'instant
$modversion['blocks'][] = [
    'file'        => 'members.php',
    'name'        => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_LAST,
    'description' => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_LAST_DESC,
    'show_func'   => 'b_trombinoscope_members_show',
    'edit_func'   => 'b_trombinoscope_members_edit',
    'template'    => 'trombinoscope_block_members.tpl',
    'options'     => 'last|5|25|0',
];
// Members new
$modversion['blocks'][] = [
    'file'        => 'members.php',
    'name'        => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_NEW,
    'description' => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_NEW_DESC,
    'show_func'   => 'b_trombinoscope_members_show',
    'edit_func'   => 'b_trombinoscope_members_edit',
    'template'    => 'trombinoscope_block_members.tpl',
    'options'     => 'new|5|25|0',
];
// Members hits
$modversion['blocks'][] = [
    'file'        => 'members.php',
    'name'        => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_HITS,
    'description' => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_HITS_DESC,
    'show_func'   => 'b_trombinoscope_members_show',
    'edit_func'   => 'b_trombinoscope_members_edit',
    'template'    => 'trombinoscope_block_members.tpl',
    'options'     => 'hits|5|25|0',
];
// Members top
$modversion['blocks'][] = [
    'file'        => 'members.php',
    'name'        => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_TOP,
    'description' => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_TOP_DESC,
    'show_func'   => 'b_trombinoscope_members_show',
    'edit_func'   => 'b_trombinoscope_members_edit',
    'template'    => 'trombinoscope_block_members.tpl',
    'options'     => 'top|5|25|0',
];
// Members random
$modversion['blocks'][] = [
    'file'        => 'members.php',
    'name'        => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_RANDOM,
    'description' => \_MI_TROMBINOSCOPE_MEMBERS_BLOCK_RANDOM_DESC,
    'show_func'   => 'b_trombinoscope_members_show',
    'edit_func'   => 'b_trombinoscope_members_edit',
    'template'    => 'trombinoscope_block_members.tpl',
    'options'     => 'random|5|25|0',
];
*/

// ------------------- Config ------------------- //
// Editor Admin
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'editor_admin',
    'title'       => '\_MI_TROMBINOSCOPE_EDITOR_ADMIN',
    'description' => '\_MI_TROMBINOSCOPE_EDITOR_ADMIN_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtml',
    'options'     => array_flip($editorHandler->getList()),
];
// Editor User
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'editor_user',
    'title'       => '\_MI_TROMBINOSCOPE_EDITOR_USER',
    'description' => '\_MI_TROMBINOSCOPE_EDITOR_USER_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtml',
    'options'     => array_flip($editorHandler->getList()),
];
// Editor : max characters admin area
$modversion['config'][] = [
    'name'        => 'editor_maxchar',
    'title'       => '\_MI_TROMBINOSCOPE_EDITOR_MAXCHAR',
    'description' => '\_MI_TROMBINOSCOPE_EDITOR_MAXCHAR_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 50,
];
// Keywords
$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => '\_MI_TROMBINOSCOPE_KEYWORDS',
    'description' => '\_MI_TROMBINOSCOPE_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'trombinoscope, members, categories',
];
// create increment steps for file size
require_once __DIR__ . '/include/xoops_version.inc.php';
$iniPostMaxSize       = trombinoscopeReturnBytes(\ini_get('post_max_size'));
$iniUploadMaxFileSize = trombinoscopeReturnBytes(\ini_get('upload_max_filesize'));
$maxSize              = min($iniPostMaxSize, $iniUploadMaxFileSize);
if ($maxSize > 10000 * 1048576) {
    $increment = 500;
}
if ($maxSize <= 10000 * 1048576) {
    $increment = 200;
}
if ($maxSize <= 5000 * 1048576) {
    $increment = 100;
}
if ($maxSize <= 2500 * 1048576) {
    $increment = 50;
}
if ($maxSize <= 1000 * 1048576) {
    $increment = 10;
}
if ($maxSize <= 500 * 1048576) {
    $increment = 5;
}
if ($maxSize <= 100 * 1048576) {
    $increment = 2;
}
if ($maxSize <= 50 * 1048576) {
    $increment = 1;
}
if ($maxSize <= 25 * 1048576) {
    $increment = 0.5;
}
$optionMaxsize = [];
$i = $increment;
while ($i * 1048576 <= $maxSize) {
    $optionMaxsize[$i . ' ' . _MI_TROMBINOSCOPE_SIZE_MB] = $i * 1048576;
    $i += $increment;
}
// Uploads : maxsize of image
$modversion['config'][] = [
    'name'        => 'maxsize_image',
    'title'       => '\_MI_TROMBINOSCOPE_MAXSIZE_IMAGE',
    'description' => '\_MI_TROMBINOSCOPE_MAXSIZE_IMAGE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 3145728,
    'options'     => $optionMaxsize,
];
// Uploads : mimetypes of image
$modversion['config'][] = [
    'name'        => 'mimetypes_image',
    'title'       => '\_MI_TROMBINOSCOPE_MIMETYPES_IMAGE',
    'description' => '\_MI_TROMBINOSCOPE_MIMETYPES_IMAGE_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => ['bmp' => 'image/bmp','gif' => 'image/gif','pjpeg' => 'image/pjpeg', 'jpeg' => 'image/jpeg','jpg' => 'image/jpg','jpe' => 'image/jpe', 'png' => 'image/png'],
];
$modversion['config'][] = [
    'name'        => 'maxwidth_image',
    'title'       => '\_MI_TROMBINOSCOPE_MAXWIDTH_IMAGE',
    'description' => '\_MI_TROMBINOSCOPE_MAXWIDTH_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 800,
];
$modversion['config'][] = [
    'name'        => 'maxheight_image',
    'title'       => '\_MI_TROMBINOSCOPE_MAXHEIGHT_IMAGE',
    'description' => '\_MI_TROMBINOSCOPE_MAXHEIGHT_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 800,
];
// Admin pager
$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => '\_MI_TROMBINOSCOPE_ADMIN_PAGER',
    'description' => '\_MI_TROMBINOSCOPE_ADMIN_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// User pager
$modversion['config'][] = [
    'name'        => 'userpager',
    'title'       => '\_MI_TROMBINOSCOPE_USER_PAGER',
    'description' => '\_MI_TROMBINOSCOPE_USER_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// Number column
$modversion['config'][] = [
    'name'        => 'numb_col',
    'title'       => '\_MI_TROMBINOSCOPE_NUMB_COL',
    'description' => '\_MI_TROMBINOSCOPE_NUMB_COL_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 3,
    'options'     => [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8'],
];

// Table type
$modversion['config'][] = [
    'name'        => 'table_type',
    'title'       => '\_MI_TROMBINOSCOPE_TABLE_TYPE',
    'description' => '',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'bordered',
    'options'     => ['bordered' => 'bordered', 'striped' => 'striped', 'hover' => 'hover', 'condensed' => 'condensed'],
];
// Panel by
$modversion['config'][] = [
    'name'        => 'panel_type',
    'title'       => '\_MI_TROMBINOSCOPE_PANEL_TYPE',
    'description' => '\_MI_TROMBINOSCOPE_PANEL_TYPE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'default',
    'options'     => ['default' => 'default', 'primary' => 'primary', 'success' => 'success', 'info' => 'info', 'warning' => 'warning', 'danger' => 'danger'],
];
/*
// Paypal ID
$modversion['config'][] = [
    'name'        => 'donations',
    'title'       => '\_MI_TROMBINOSCOPE_IDPAYPAL',
    'description' => '\_MI_TROMBINOSCOPE_IDPAYPAL_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'textbox',
    'default'     => 'XYZ123',
];
// Show Breadcrumbs
$modversion['config'][] = [
    'name'        => 'show_breadcrumbs',
    'title'       => '\_MI_TROMBINOSCOPE_SHOW_BREADCRUMBS',
    'description' => '\_MI_TROMBINOSCOPE_SHOW_BREADCRUMBS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Advertise
$modversion['config'][] = [
    'name'        => 'advertise',
    'title'       => '\_MI_TROMBINOSCOPE_ADVERTISE',
    'description' => '\_MI_TROMBINOSCOPE_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => '',
];
// Bookmarks
$modversion['config'][] = [
    'name'        => 'bookmarks',
    'title'       => '\_MI_TROMBINOSCOPE_BOOKMARKS',
    'description' => '\_MI_TROMBINOSCOPE_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
// Make Sample button visible?
$modversion['config'][] = [
    'name'        => 'displaySampleButton',
    'title'       => '_CO_TROMBINOSCOPE_SHOW_SAMPLE_BUTTON',
    'description' => '_CO_TROMBINOSCOPE_SHOW_SAMPLE_BUTTON_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Maintained by
$modversion['config'][] = [
    'name'        => 'maintainedby',
    'title'       => '\_MI_TROMBINOSCOPE_MAINTAINEDBY',
    'description' => '\_MI_TROMBINOSCOPE_MAINTAINEDBY_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'https://www.frxoops.org/modules/newbb/',
];
*/
