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
require_once __DIR__ . '/main.php';

// ---------------- Admin Index ----------------
\define('_AM_TROMBINOSCOPE_STATISTICS', "Statistics");
// There are
\define('_AM_TROMBINOSCOPE_THEREARE_MEMBERS', "There are <span class='bold'>%s</span> members in the database");
\define('_AM_TROMBINOSCOPE_THEREARE_CATEGORIES', "There are <span class='bold'>%s</span> categories in the database");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_TROMBINOSCOPE_THEREARENT_MEMBERS', "There aren't members");
\define('_AM_TROMBINOSCOPE_THEREARENT_CATEGORIES', "There aren't categories");
// Save/Delete
\define('_AM_TROMBINOSCOPE_FORM_OK', "Successfully saved");
\define('_AM_TROMBINOSCOPE_FORM_DELETE_OK', "Successfully deleted");
\define('_AM_TROMBINOSCOPE_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_TROMBINOSCOPE_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
// Buttons
\define('_AM_TROMBINOSCOPE_ADD_MEMBER', "Add New Member");
\define('_AM_TROMBINOSCOPE_ADD_CATEGORY', "Add New Category");
// Lists
\define('_AM_TROMBINOSCOPE_LIST_MEMBERS', "List of Members");
\define('_AM_TROMBINOSCOPE_LIST_CATEGORIES', "List of Categories");
// ---------------- Admin Classes ----------------
// Member add/edit
\define('_AM_TROMBINOSCOPE_MEMBER_ADD', "Add Member");
\define('_AM_TROMBINOSCOPE_MEMBER_EDIT', "Edit Member");
// Elements of Member
\define('_AM_TROMBINOSCOPE_MEMBER_ID', "Id");
\define('_AM_TROMBINOSCOPE_MEMBER_CAT_ID', "Cat id");
\define('_AM_TROMBINOSCOPE_MEMBER_UID', "Members");
\define('_AM_TROMBINOSCOPE_MEMBER_FIRSTNAME', "Firstname");
\define('_AM_TROMBINOSCOPE_MEMBER_LASTNAME', "Lastname");
\define('_AM_TROMBINOSCOPE_MEMBER_FONCTION', "Fonction");
\define('_AM_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
\define('_AM_TROMBINOSCOPE_MEMBER_PHOTO_UPLOADS', "Photo in %s :");
\define('_AM_TROMBINOSCOPE_MEMBER_BIRTHDAY', "Birthday");
\define('_AM_TROMBINOSCOPE_MEMBER_EMAIL', "Email");
\define('_AM_TROMBINOSCOPE_MEMBER_FIXE', "Fixe");
\define('_AM_TROMBINOSCOPE_MEMBER_MOBILE', "Mobile");
\define('_AM_TROMBINOSCOPE_MEMBER_STATUS', "Status");
\define('_AM_TROMBINOSCOPE_MEMBER_COMMENTS', "Comments");
\define('_AM_TROMBINOSCOPE_MEMBER_ACTIF', "Actif");
\define('_AM_TROMBINOSCOPE_MEMBER_CREATION', "Creation");
\define('_AM_TROMBINOSCOPE_MEMBER_UPDATE', "Update");
// Category add/edit
\define('_AM_TROMBINOSCOPE_CATEGORY_ADD', "Add Category");
\define('_AM_TROMBINOSCOPE_CATEGORY_EDIT', "Edit Category");
// Elements of Category
\define('_AM_TROMBINOSCOPE_CATEGORY_ID', "Id");
\define('_AM_TROMBINOSCOPE_CATEGORY_PARENT_ID', "Parent id");
\define('_AM_TROMBINOSCOPE_CATEGORY_NAME', "Name");
\define('_AM_TROMBINOSCOPE_CATEGORY_WEIGHT', "Weight");
\define('_AM_TROMBINOSCOPE_CATEGORY_THEME', "Theme");
// General
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD', "Upload file");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_NEW', "Upload new file: ");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_SIZE', "Max file size: ");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_SIZE_MB', "MB");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_IMG_WIDTH', "Max image width: ");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_IMG_HEIGHT', "Max image height: ");
\define('_AM_TROMBINOSCOPE_FORM_IMAGE_PATH', "Files in %s :");
\define('_AM_TROMBINOSCOPE_FORM_ACTION', "Action");
\define('_AM_TROMBINOSCOPE_FORM_EDIT', "Modification");
\define('_AM_TROMBINOSCOPE_FORM_DELETE', "Clear");
// Sample List Values
\define('_AM_TROMBINOSCOPE_LIST_1', "Sample List Value 1");
\define('_AM_TROMBINOSCOPE_LIST_2', "Sample List Value 2");
\define('_AM_TROMBINOSCOPE_LIST_3', "Sample List Value 3");
// Clone feature
\define('_AM_TROMBINOSCOPE_CLONE', "Clone");
\define('_AM_TROMBINOSCOPE_CLONE_DSC', "Cloning a module has never been this easy! Just type in the name you want for it and hit submit button!");
\define('_AM_TROMBINOSCOPE_CLONE_TITLE', "Clone %s");
\define('_AM_TROMBINOSCOPE_CLONE_NAME', "Choose a name for the new module");
\define('_AM_TROMBINOSCOPE_CLONE_NAME_DSC', "Do not use special characters! <br>Do not choose an existing module dirname or database table name!");
\define('_AM_TROMBINOSCOPE_CLONE_INVALIDNAME', "ERROR: Invalid module name, please try another one!");
\define('_AM_TROMBINOSCOPE_CLONE_EXISTS', "ERROR: Module name already taken, please try another one!");
\define('_AM_TROMBINOSCOPE_CLONE_CONGRAT', "Congratulations! %s was sucessfully created!<br>You may want to make changes in language files.");
\define('_AM_TROMBINOSCOPE_CLONE_IMAGEFAIL', "Attention, we failed creating the new module logo. Please consider modifying assets/images/logo_module.png manually!");
\define('_AM_TROMBINOSCOPE_CLONE_FAIL', "Sorry, we failed in creating the new clone. Maybe you need to temporally set write permissions (CHMOD 777) to modules folder and try again.");
// ---------------- Admin Others ----------------
\define('_AM_TROMBINOSCOPE_ABOUT_MAKE_DONATION', "Submit");
\define('_AM_TROMBINOSCOPE_SUPPORT_FORUM', "Support Forum");
\define('_AM_TROMBINOSCOPE_DONATION_AMOUNT', "Donation Amount");
\define('_AM_TROMBINOSCOPE_MAINTAINEDBY', " is maintained by ");
// ---------------- End ----------------
