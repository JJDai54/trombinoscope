<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Wfdownloads module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @package         wfdownload
 * @since           3.23
 * @author          Xoops Development Team
 */
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('CO_TROMBINOSCOPE_GDLIBSTATUS', 'GD library support: ');
\define('CO_TROMBINOSCOPE_GDLIBVERSION', 'GD Library version: ');
\define('CO_TROMBINOSCOPE_GDOFF', "<span style='font-weight: bold;'>Disabled</span> (No thumbnails available)");
\define('CO_TROMBINOSCOPE_GDON', "<span style='font-weight: bold;'>Enabled</span> (Thumbsnails available)");
\define('CO_TROMBINOSCOPE_IMAGEINFO', 'Server status');
\define('CO_TROMBINOSCOPE_MAXPOSTSIZE', 'Max post size permitted (post_max_size directive in php.ini): ');
\define('CO_TROMBINOSCOPE_MAXUPLOADSIZE', 'Max upload size permitted (upload_max_filesize directive in php.ini): ');
\define('CO_TROMBINOSCOPE_MEMORYLIMIT', 'Memory limit (memory_limit directive in php.ini): ');
\define('CO_TROMBINOSCOPE_METAVERSION', "<span style='font-weight: bold;'>Downloads meta version:</span> ");
\define('CO_TROMBINOSCOPE_OFF', "<span style='font-weight: bold;'>OFF</span>");
\define('CO_TROMBINOSCOPE_ON', "<span style='font-weight: bold;'>ON</span>");
\define('CO_TROMBINOSCOPE_SERVERPATH', 'Server path to XOOPS root: ');
\define('CO_TROMBINOSCOPE_SERVERUPLOADSTATUS', 'Server uploads status: ');
\define('CO_TROMBINOSCOPE_SPHPINI', "<span style='font-weight: bold;'>Information taken from PHP ini file:</span>");
\define('CO_TROMBINOSCOPE_UPLOADPATHDSC', 'Note. Upload path *MUST* contain the full server path of your upload folder.');

\define('CO_TROMBINOSCOPE_PRINT', "<span style='font-weight: bold;'>Print</span>");
\define('CO_TROMBINOSCOPE_PDF', "<span style='font-weight: bold;'>Create PDF</span>");

\define('CO_TROMBINOSCOPE_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
\define('CO_TROMBINOSCOPE_UPGRADEFAILED1', "Update failed - couldn't add new fields");
\define('CO_TROMBINOSCOPE_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
\define('CO_TROMBINOSCOPE_ERROR_COLUMN', 'Could not create column in database : %s');
\define('CO_TROMBINOSCOPE_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
\define('CO_TROMBINOSCOPE_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
\define('CO_TROMBINOSCOPE_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');

\define('CO_TROMBINOSCOPE_FOLDERS_DELETED_OK', 'Upload Folders have been deleted');

// Error Msgs
\define('CO_TROMBINOSCOPE_ERROR_BAD_DEL_PATH', 'Could not delete %s directory');
\define('CO_TROMBINOSCOPE_ERROR_BAD_REMOVE', 'Could not delete %s');
\define('CO_TROMBINOSCOPE_ERROR_NO_PLUGIN', 'Could not load plugin');

//Help
\define('CO_TROMBINOSCOPE_DIRNAME', \basename(\dirname(__DIR__, 2)));
\define('CO_TROMBINOSCOPE_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
\define('CO_TROMBINOSCOPE_BACK_2_ADMIN', 'Back to Administration of ');
\define('CO_TROMBINOSCOPE_OVERVIEW', 'Overview');

//\define('CO_TROMBINOSCOPE_HELP_DIR', __DIR__);

//help multi-page
\define('CO_TROMBINOSCOPE_DISCLAIMER', 'Disclaimer');
\define('CO_TROMBINOSCOPE_LICENSE', 'License');
\define('CO_TROMBINOSCOPE_SUPPORT', 'Support');

//Sample Data
\define('CO_TROMBINOSCOPE_' . 'ADD_SAMPLEDATA', 'Import Sample Data (will delete ALL current data)');
\define('CO_TROMBINOSCOPE_' . 'SAMPLEDATA_SUCCESS', 'Sample Data imported successfully');
\define('CO_TROMBINOSCOPE_' . 'SAVE_SAMPLEDATA', 'Export Tables to YAML');
\define('CO_TROMBINOSCOPE_' . 'SAVE_SAMPLEDATA_SUCCESS', 'Export Tables to YAML successfully');
\define('CO_TROMBINOSCOPE_' . 'SAVE_SAMPLEDATA_ERROR', 'ERROR: Export of Tables to YAML failed');
\define('CO_TROMBINOSCOPE_' . 'SHOW_SAMPLE_BUTTON', 'Show Sample Button?');
\define('CO_TROMBINOSCOPE_' . 'SHOW_SAMPLE_BUTTON_DESC', 'If yes, the "Add Sample Data" button will be visible to the Admin. It is Yes as a default for first installation.');
\define('CO_TROMBINOSCOPE_' . 'EXPORT_SCHEMA', 'Export DB Schema to YAML');
\define('CO_TROMBINOSCOPE_' . 'EXPORT_SCHEMA_SUCCESS', 'Export DB Schema to YAML was a success');
\define('CO_TROMBINOSCOPE_' . 'EXPORT_SCHEMA_ERROR', 'ERROR: Export of DB Schema to YAML failed');
\define('CO_TROMBINOSCOPE_' . 'ADD_SAMPLEDATA_OK', 'Are you sure to Import Sample Data? (It will delete ALL current data)');
\define('CO_TROMBINOSCOPE_' . 'HIDE_SAMPLEDATA_BUTTONS', 'Hide the Import buttons');
\define('CO_TROMBINOSCOPE_' . 'SHOW_SAMPLEDATA_BUTTONS', 'Show the Import buttons');
\define('CO_TROMBINOSCOPE_' . 'CONFIRM', 'Confirm');

//letter choice
\define('CO_TROMBINOSCOPE_' . 'BROWSETOTOPIC', "<span style='font-weight: bold;'>Browse items alphabetically</span>");
\define('CO_TROMBINOSCOPE_' . 'OTHER', 'Other');
\define('CO_TROMBINOSCOPE_' . 'ALL', 'All');

// block defines
\define('CO_TROMBINOSCOPE_' . 'ACCESSRIGHTS', 'Access Rights');
\define('CO_TROMBINOSCOPE_' . 'ACTION', 'Action');
\define('CO_TROMBINOSCOPE_' . 'ACTIVERIGHTS', 'Active Rights');
\define('CO_TROMBINOSCOPE_' . 'BADMIN', 'Block Administration');
\define('CO_TROMBINOSCOPE_' . 'BLKDESC', 'Description');
\define('CO_TROMBINOSCOPE_' . 'CBCENTER', 'Center Middle');
\define('CO_TROMBINOSCOPE_' . 'CBLEFT', 'Center Left');
\define('CO_TROMBINOSCOPE_' . 'CBRIGHT', 'Center Right');
\define('CO_TROMBINOSCOPE_' . 'SBLEFT', 'Left');
\define('CO_TROMBINOSCOPE_' . 'SBRIGHT', 'Right');
\define('CO_TROMBINOSCOPE_' . 'SIDE', 'Alignment');
\define('CO_TROMBINOSCOPE_' . 'TITLE', 'Title');
\define('CO_TROMBINOSCOPE_' . 'VISIBLE', 'Visible');
\define('CO_TROMBINOSCOPE_' . 'VISIBLEIN', 'Visible In');
\define('CO_TROMBINOSCOPE_' . 'WEIGHT', 'Weight');

\define('CO_TROMBINOSCOPE_' . 'PERMISSIONS', 'Permissions');
\define('CO_TROMBINOSCOPE_' . 'BLOCKS', 'Blocks Admin');
\define('CO_TROMBINOSCOPE_' . 'BLOCKS_DESC', 'Blocks/Group Admin');

\define('CO_TROMBINOSCOPE_' . 'BLOCKS_MANAGMENT', 'Manage');
\define('CO_TROMBINOSCOPE_' . 'BLOCKS_ADDBLOCK', 'Add a new block');
\define('CO_TROMBINOSCOPE_' . 'BLOCKS_EDITBLOCK', 'Edit a block');
\define('CO_TROMBINOSCOPE_' . 'BLOCKS_CLONEBLOCK', 'Clone a block');

//myblocksadmin
\define('CO_TROMBINOSCOPE_' . 'AGDS', 'Admin Groups');
\define('CO_TROMBINOSCOPE_' . 'BCACHETIME', 'Cache Time');
\define('CO_TROMBINOSCOPE_' . 'BLOCKS_ADMIN', 'Blocks Admin');

//Template Admin
\define('CO_TROMBINOSCOPE_' . 'TPLSETS', 'Template Management');
\define('CO_TROMBINOSCOPE_' . 'GENERATE', 'Generate');
\define('CO_TROMBINOSCOPE_' . 'FILENAME', 'File Name');

//Menu
\define('CO_TROMBINOSCOPE_' . 'ADMENU_MIGRATE', 'Migrate');
\define('CO_TROMBINOSCOPE_' . 'FOLDER_YES', 'Folder "%s" exist');
\define('CO_TROMBINOSCOPE_' . 'FOLDER_NO', 'Folder "%s" does not exist. Create the specified folder with CHMOD 777.');
\define('CO_TROMBINOSCOPE_' . 'SHOW_DEV_TOOLS', 'Show Development Tools Button?');
\define('CO_TROMBINOSCOPE_' . 'SHOW_DEV_TOOLS_DESC', 'If yes, the "Migrate" Tab and other Development tools will be visible to the Admin.');
\define('CO_TROMBINOSCOPE_' . 'ADMENU_FEEDBACK', 'Feedback');

//Latest Version Check
\define('CO_TROMBINOSCOPE_' . 'NEW_VERSION', 'New Version: ');

//DirectoryChecker
\define('CO_TROMBINOSCOPE_' . 'AVAILABLE', "<span style='color: green;'>Available</span>");
\define('CO_TROMBINOSCOPE_' . 'NOTAVAILABLE', "<span style='color: red;'>Not available</span>");
\define('CO_TROMBINOSCOPE_' . 'NOTWRITABLE', "<span style='color: red;'>Should have permission ( %d ), but it has ( %d )</span>");
\define('CO_TROMBINOSCOPE_' . 'CREATETHEDIR', 'Create it');
\define('CO_TROMBINOSCOPE_' . 'SETMPERM', 'Set the permission');
\define('CO_TROMBINOSCOPE_' . 'DIRCREATED', 'The directory has been created');
\define('CO_TROMBINOSCOPE_' . 'DIRNOTCREATED', 'The directory cannot be created');
\define('CO_TROMBINOSCOPE_' . 'PERMSET', 'The permission has been set');
\define('CO_TROMBINOSCOPE_' . 'PERMNOTSET', 'The permission cannot be set');

//FileChecker
//\define('CO_TROMBINOSCOPE_' . 'AVAILABLE', "<span style='color: green;'>Available</span>");
//\define('CO_TROMBINOSCOPE_' . 'NOTAVAILABLE', "<span style='color: red;'>Not available</span>");
//\define('CO_TROMBINOSCOPE_' . 'NOTWRITABLE', "<span style='color: red;'>Should have permission ( %d ), but it has ( %d )</span>");
//\define('CO_TROMBINOSCOPE_' . 'COPYTHEFILE', 'Copy it');
//\define('CO_TROMBINOSCOPE_' . 'CREATETHEFILE', 'Create it');
//\define('CO_TROMBINOSCOPE_' . 'SETMPERM', 'Set the permission');

\define('CO_TROMBINOSCOPE_' . 'FILECOPIED', 'The file has been copied');
\define('CO_TROMBINOSCOPE_' . 'FILENOTCOPIED', 'The file cannot be copied');

//\define('CO_TROMBINOSCOPE_' . 'PERMSET', 'The permission has been set');
//\define('CO_TROMBINOSCOPE_' . 'PERMNOTSET', 'The permission cannot be set');

//image config
\define('CO_TROMBINOSCOPE_' . 'IMAGE_WIDTH', 'Image Display Width');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_WIDTH_DSC', 'Display width for image');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_HEIGHT', 'Image Display Height');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_HEIGHT_DSC', 'Display height for image');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_CONFIG', '<span style="color: #FF0000; font-size: Small;  font-weight: bold;">--- EXTERNAL Image configuration ---</span> ');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_CONFIG_DSC', '');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_UPLOAD_PATH', 'Image Upload path');
\define('CO_TROMBINOSCOPE_' . 'IMAGE_UPLOAD_PATH_DSC', 'Path for uploading images');

//Preferences
\define('CO_TROMBINOSCOPE_' . 'TRUNCATE_LENGTH', 'Number of Characters to truncate to the long text field');
\define('CO_TROMBINOSCOPE_' . 'TRUNCATE_LENGTH_DESC', 'Set the maximum number of characters to truncate the long text fields');

//Module Stats
\define('CO_TROMBINOSCOPE_' . 'STATS_SUMMARY', 'Module Statistics');
\define('CO_TROMBINOSCOPE_' . 'TOTAL_CATEGORIES', 'Categories:');
\define('CO_TROMBINOSCOPE_' . 'TOTAL_ITEMS', 'Items');
\define('CO_TROMBINOSCOPE_' . 'TOTAL_OFFLINE', 'Offline');
\define('CO_TROMBINOSCOPE_' . 'TOTAL_PUBLISHED', 'Published');
\define('CO_TROMBINOSCOPE_' . 'TOTAL_REJECTED', 'Rejected');
\define('CO_TROMBINOSCOPE_' . 'TOTAL_SUBMITTED', 'Submitted');
