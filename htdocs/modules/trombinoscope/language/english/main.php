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

require_once __DIR__ . '/admin.php';

// ---------------- Main ----------------
\define('_MA_TROMBINOSCOPE_INDEX', "Overview Trombinoscope");
\define('_MA_TROMBINOSCOPE_TITLE', "Trombinoscope");
\define('_MA_TROMBINOSCOPE_DESC', "Module de présentation d'un tromboniscope, et accessoirement de suivi des anniversaires");
\define('_MA_TROMBINOSCOPE_INDEX_DESC', "Welcome to the homepage of your new module Trombinoscope!<br>
As you can see, you have created a page with a list of links at the top to navigate between the pages of your module. This description is only visible on the homepage of this module, the other pages you will see the content you created when you built this module with the module ModuleBuilder, and after creating new content in admin of this module. In order to expand this module with other resources, just add the code you need to extend the functionality of the same. The files are grouped by type, from the header to the footer to see how divided the source code.<br><br>If you see this message, it is because you have not created content for this module. Once you have created any type of content, you will not see this message.<br><br>If you liked the module ModuleBuilder and thanks to the long process for giving the opportunity to the new module to be created in a moment, consider making a donation to keep the module ModuleBuilder and make a donation using this button <a href='https://xoops.org/modules/xdonations/index.php' title='Donation To Txmod Xoops'><img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='Button Donations' ></a><br>Thanks!<br><br>Use the link below to go to the admin and create content.");
\define('_MA_TROMBINOSCOPE_NO_PDF_LIBRARY', "Libraries TCPDF not there yet, upload them in root/Frameworks");
\define('_MA_TROMBINOSCOPE_NO', "No");
\define('_MA_TROMBINOSCOPE_DETAILS', "Show details");
\define('_MA_TROMBINOSCOPE_BROKEN', "Notify broken");
// ---------------- Contents ----------------
// Member
\define('_MA_TROMBINOSCOPE_MEMBER', "Member");
\define('_MA_TROMBINOSCOPE_MEMBER_ADD', "Add Member");
\define('_MA_TROMBINOSCOPE_MEMBER_EDIT', "Edit Member");
\define('_MA_TROMBINOSCOPE_MEMBER_DELETE', "Delete Member");
\define('_MA_TROMBINOSCOPE_MEMBER_CLONE', "Clone Member");
\define('_MA_TROMBINOSCOPE_MEMBERS', "Members");
\define('_MA_TROMBINOSCOPE_MEMBERS_LIST', "List of Members");
\define('_MA_TROMBINOSCOPE_MEMBERS_TITLE', "Members title");
\define('_MA_TROMBINOSCOPE_MEMBERS_DESC', "Members description");
// Caption of Member
\define('_MA_TROMBINOSCOPE_MEMBER_ID', "Id");
\define('_MA_TROMBINOSCOPE_MEMBER_CAT_ID', "Cat_id");
\define('_MA_TROMBINOSCOPE_MEMBER_UID', "Uid");
\define('_MA_TROMBINOSCOPE_MEMBER_FIRSTNAME', "Firstname");
\define('_MA_TROMBINOSCOPE_MEMBER_LASTNAME', "Lastname");
\define('_MA_TROMBINOSCOPE_MEMBER_FONCTION', "Fonction");
\define('_MA_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
\define('_MA_TROMBINOSCOPE_MEMBER_BIRTHDAY', "Birthday");
\define('_MA_TROMBINOSCOPE_MEMBER_EMAIL', "Email");
\define('_MA_TROMBINOSCOPE_MEMBER_FIXE', "Fixe");
\define('_MA_TROMBINOSCOPE_MEMBER_MOBILE', "Mobile");
\define('_MA_TROMBINOSCOPE_MEMBER_STATUS', "Status");
\define('_MA_TROMBINOSCOPE_MEMBER_COMMENTS', "Comments");
\define('_MA_TROMBINOSCOPE_MEMBER_ACTIF', "Actif");
\define('_MA_TROMBINOSCOPE_MEMBER_CREATION', "Creation");
\define('_MA_TROMBINOSCOPE_MEMBER_UPDATE', "Update");
// Category
\define('_MA_TROMBINOSCOPE_CATEGORY', "Category");
\define('_MA_TROMBINOSCOPE_CATEGORY_ADD', "Add Category");
\define('_MA_TROMBINOSCOPE_CATEGORY_EDIT', "Edit Category");
\define('_MA_TROMBINOSCOPE_CATEGORY_DELETE', "Delete Category");
\define('_MA_TROMBINOSCOPE_CATEGORY_CLONE', "Clone Category");
\define('_MA_TROMBINOSCOPE_CATEGORIES', "Categories");
\define('_MA_TROMBINOSCOPE_CATEGORIES_LIST', "List of Categories");
\define('_MA_TROMBINOSCOPE_CATEGORIES_TITLE', "Categories title");
\define('_MA_TROMBINOSCOPE_CATEGORIES_DESC', "Categories description");
// Caption of Category
\define('_MA_TROMBINOSCOPE_CATEGORY_ID', "Id");
\define('_MA_TROMBINOSCOPE_CATEGORY_PARENT_ID', "Parent_id");
\define('_MA_TROMBINOSCOPE_CATEGORY_NAME', "Name");
\define('_MA_TROMBINOSCOPE_CATEGORY_WEIGHT', "Weight");
\define('_MA_TROMBINOSCOPE_CATEGORY_THEME', "Theme");
// Submit
\define('_MA_TROMBINOSCOPE_SUBMIT', "Submit");
// Form
\define('_MA_TROMBINOSCOPE_FORM_OK', "Successfully saved");
\define('_MA_TROMBINOSCOPE_FORM_DELETE_OK', "Successfully deleted");
\define('_MA_TROMBINOSCOPE_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TROMBINOSCOPE_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TROMBINOSCOPE_INVALID_PARAM', 'Invalid parameter');
// Admin link
\define('_MA_TROMBINOSCOPE_ADMIN', "Admin");
// ---------------- End ----------------
\define('_MA_TROMBINOSCOPE_MEMBER_FONCTIONS', "Fonctions");
