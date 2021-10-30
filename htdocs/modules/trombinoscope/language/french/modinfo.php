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
 * @author         JJDai - Email:<jjdelalandre@orange.fr> - Website:<http://jubile.fr>
 */

require_once __DIR__ . '/common.php';

// ---------------- Admin Main ----------------
\define('_MI_TROMBINOSCOPE_NAME', "Trombinoscope");
\define('_MI_TROMBINOSCOPE_DESC', "Module de présentation d'un tromboniscope, et accessoirement de suivi des anniversaires");
// ---------------- Admin Menu ----------------
\define('_MI_TROMBINOSCOPE_ADMENU1', "Dashboard");
\define('_MI_TROMBINOSCOPE_ADMENU2', "Categories");
\define('_MI_TROMBINOSCOPE_ADMENU3', "Members");
\define('_MI_TROMBINOSCOPE_ADMENU5', "Clone");
\define('_MI_TROMBINOSCOPE_ADMENU6', "Feedback");
\define('_MI_TROMBINOSCOPE_ABOUT', "About");
// ---------------- Admin Nav ----------------
\define('_MI_TROMBINOSCOPE_ADMIN_PAGER', "Admin pager");
\define('_MI_TROMBINOSCOPE_ADMIN_PAGER_DESC', "Admin per page list");
// User
\define('_MI_TROMBINOSCOPE_USER_PAGER', "User pager");
\define('_MI_TROMBINOSCOPE_USER_PAGER_DESC', "User per page list");
// Submenu
\define('_MI_TROMBINOSCOPE_SMNAME1', "Index page");
\define('_MI_TROMBINOSCOPE_SMNAME2', "Members");
\define('_MI_TROMBINOSCOPE_SMNAME3', "Submit Members");
\define('_MI_TROMBINOSCOPE_SMNAME4', "Categories");
\define('_MI_TROMBINOSCOPE_SMNAME5', "Submit Categories");
\define('_MI_TROMBINOSCOPE_SMNAME8', "Search");
// Blocks
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK', "Members block");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_DESC', "Members block description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_MEMBER', "Members block  MEMBER");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_MEMBER_DESC', "Members block  MEMBER description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_LAST', "Members block last");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_LAST_DESC', "Members block last description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_NEW', "Members block new");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_NEW_DESC', "Members block new description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_HITS', "Members block hits");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_HITS_DESC', "Members block hits description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_TOP', "Members block top");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_TOP_DESC', "Members block top description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_RANDOM', "Members block random");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_RANDOM_DESC', "Members block random description");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK', "Categories block");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK_DESC', "Categories block description");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK_CATEGORY', "Categories block CATEGORY");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK_CATEGORY_DESC', "Categories block CATEGORY description");
// Config
\define('_MI_TROMBINOSCOPE_EDITOR_ADMIN', "Editor admin");
\define('_MI_TROMBINOSCOPE_EDITOR_ADMIN_DESC', "Select the editor which should be used in admin area for text area fields");
\define('_MI_TROMBINOSCOPE_EDITOR_USER', "Editor user");
\define('_MI_TROMBINOSCOPE_EDITOR_USER_DESC', "Select the editor which should be used in user area for text area fields");
\define('_MI_TROMBINOSCOPE_EDITOR_MAXCHAR', "Text max characters");
\define('_MI_TROMBINOSCOPE_EDITOR_MAXCHAR_DESC', "Max characters for showing text of a textarea or editor field in admin area");
\define('_MI_TROMBINOSCOPE_KEYWORDS', "Keywords");
\define('_MI_TROMBINOSCOPE_KEYWORDS_DESC', "Insert here the keywords (separate by comma)");
\define('_MI_TROMBINOSCOPE_SIZE_MB', "MB");
\define('_MI_TROMBINOSCOPE_MAXSIZE_IMAGE', "Max size image");
\define('_MI_TROMBINOSCOPE_MAXSIZE_IMAGE_DESC', "Define the max size for uploading images");
\define('_MI_TROMBINOSCOPE_MIMETYPES_IMAGE', "Mime types image");
\define('_MI_TROMBINOSCOPE_MIMETYPES_IMAGE_DESC', "Define the allowed mime types for uploading images");
\define('_MI_TROMBINOSCOPE_MAXWIDTH_IMAGE', "Max width image");
\define('_MI_TROMBINOSCOPE_MAXWIDTH_IMAGE_DESC', "Set the max width to which uploaded images should be scaled (in pixel)<br>0 means, that images keeps the original size. <br>If an image is smaller than maximum value then the image will be not enlarge, it will be save in original width.");
\define('_MI_TROMBINOSCOPE_MAXHEIGHT_IMAGE', "Max height image");
\define('_MI_TROMBINOSCOPE_MAXHEIGHT_IMAGE_DESC', "Set the max height to which uploaded images should be scaled (in pixel)<br>0 means, that images keeps the original size. <br>If an image is smaller than maximum value then the image will be not enlarge, it will be save in original height");
\define('_MI_TROMBINOSCOPE_NUMB_COL', "Number Columns");
\define('_MI_TROMBINOSCOPE_NUMB_COL_DESC', "Number Columns to View");
\define('_MI_TROMBINOSCOPE_DIVIDEBY', "Divide By");
\define('_MI_TROMBINOSCOPE_DIVIDEBY_DESC', "Divide by columns number");
\define('_MI_TROMBINOSCOPE_TABLE_TYPE', "Table Type");
\define('_MI_TROMBINOSCOPE_TABLE_TYPE_DESC', "Table Type is the bootstrap html table");
\define('_MI_TROMBINOSCOPE_PANEL_TYPE', "Panel Type");
\define('_MI_TROMBINOSCOPE_PANEL_TYPE_DESC', "Panel Type is the bootstrap html div");
\define('_MI_TROMBINOSCOPE_IDPAYPAL', "Paypal ID");
\define('_MI_TROMBINOSCOPE_IDPAYPAL_DESC', "Insert here your PayPal ID for donations");
\define('_MI_TROMBINOSCOPE_SHOW_BREADCRUMBS', "Show breadcrumb navigation");
\define('_MI_TROMBINOSCOPE_SHOW_BREADCRUMBS_DESC', "Show breadcrumb navigation which displays the current page in context within the site structure");
\define('_MI_TROMBINOSCOPE_ADVERTISE', "Advertisement Code");
\define('_MI_TROMBINOSCOPE_ADVERTISE_DESC', "Insert here the advertisement code");
\define('_MI_TROMBINOSCOPE_MAINTAINEDBY', "Maintained By");
\define('_MI_TROMBINOSCOPE_MAINTAINEDBY_DESC', "Allow url of support site or community");
\define('_MI_TROMBINOSCOPE_BOOKMARKS', "Social Bookmarks");
\define('_MI_TROMBINOSCOPE_BOOKMARKS_DESC', "Show Social Bookmarks in the single page");
// ---------------- End ----------------
