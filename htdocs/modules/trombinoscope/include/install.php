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
 * Trombinoscope module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        Trombinoscope
 * @since          1.0
 * @min_xoops      2.5.11
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com> XOOPS Project (www.xoops.org) $
 */

use XoopsModules\Trombinoscope;
use XoopsModules\Trombinoscope\Common;

/**
 * @param \XoopsModule $module
 * @return bool
 */
function xoops_module_pre_install_trombinoscope(\XoopsModule $module)
{
    require \dirname(__DIR__) . '/preloads/autoloader.php';

    $utility = new Trombinoscope\Utility();

    //check for minimum XOOPS version
    $xoopsSuccess = $utility::checkVerXoops($module);

    // check for minimum PHP version
    $phpSuccess = $utility::checkVerPhp($module);

    if ($xoopsSuccess && $phpSuccess) {
        $moduleTables = &$module->getInfo('tables');
        foreach ($moduleTables as $table) {
            $GLOBALS['xoopsDB']->queryF('DROP TABLE IF EXISTS ' . $GLOBALS['xoopsDB']->prefix($table) . ';');
        }
    }

    return $xoopsSuccess && $phpSuccess;
}

/**
 * @param \XoopsModule $module
 * @return bool
 */
function xoops_module_install_trombinoscope(\XoopsModule $module)
{
    require \dirname(__DIR__) . '/preloads/autoloader.php';

    /** @var Trombinoscope\Helper $helper */ 
    /** @var Trombinoscope\Utility $utility */
    /** @var Common\Configurator $configurator */
    $helper       = Trombinoscope\Helper::getInstance();
    $utility      = new Trombinoscope\Utility();
    $configurator = new Common\Configurator();

    // Load language files
    $helper->loadLanguage('admin');
    $helper->loadLanguage('modinfo');
    $helper->loadLanguage('common');

    //  ---  CREATE FOLDERS ---------------
    if ($configurator->uploadFolders && \is_array($configurator->uploadFolders)) {
        foreach (\array_keys($configurator->uploadFolders) as $i) {
            $utility::createFolder($configurator->uploadFolders[$i]);
            chmod($configurator->uploadFolders[$i], 0777);
        }
    }

    //  ---  COPY blank.gif FILES ---------------
    if ($configurator->copyBlankFiles && \is_array($configurator->copyBlankFiles)) {
        $file = \dirname(__DIR__) . '/assets/images/blank.gif';
        foreach (\array_keys($configurator->copyBlankFiles) as $i) {
            $dest = $configurator->copyBlankFiles[$i] . '/blank.gif';
            $utility::copyFile($file, $dest);
        }
		$file = \dirname(__DIR__) . '/assets/images/blank.png';
        foreach (\array_keys($configurator->copyBlankFiles) as $i) {
            $dest = $configurator->copyBlankFiles[$i] . '/blank.png';
            $utility::copyFile($file, $dest);
        }
    }
    
    // JJDai
    $imgs = array('no-picture-00.jpg','no-picture-01.jpg');
    foreach ($imgs as $img){
        copy( \dirname(__DIR__) . 'assets/image/' . $img, XOOPS_ROOT_PATH . '/uploads/trombinoscope/images/members/' . $img);
    }

    return true;
}
