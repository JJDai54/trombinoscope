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

    // Form Create
    $membersObj = $membersHandler->create();
    $membersObj->setVar('mbr_cat_id', $categoriesHandler->getDefault());
    $membersObj->setVar('mbr_submitter', $xoopsUser->uid());
    $form = $membersObj->getFormMembers();
    $GLOBALS['xoopsTpl']->assign('form', $form->render());


