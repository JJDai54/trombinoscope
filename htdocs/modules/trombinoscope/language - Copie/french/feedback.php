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
 * feedback plugin for xoops modules
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        general
 * @since          1.0
 * @min_xoops      2.5.11
 * @author         XOOPS - Website:<https://xoops.org>
 */
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('_CO_TROMBINOSCOPE_FB_FORM_TITLE', "Envoyer un commentaire");
\define('_CO_TROMBINOSCOPE_FB_RECIPIENT', "Destinataire");
\define('_CO_TROMBINOSCOPE_FB_NAME', "Nom");
\define('_CO_TROMBINOSCOPE_FB_NAME_PLACEHOLER', "Veuillez entrer votre nom");
\define('_CO_TROMBINOSCOPE_FB_SITE', "Site Web");
\define('_CO_TROMBINOSCOPE_FB_SITE_PLACEHOLER', "Veuillez entrer votre site web");
\define('_CO_TROMBINOSCOPE_FB_MAIL', "Email");
\define('_CO_TROMBINOSCOPE_FB_MAIL_PLACEHOLER', "Veuillez entrer votre email");
\define('_CO_TROMBINOSCOPE_FB_TYPE', "Type de retour");
\define('_CO_TROMBINOSCOPE_FB_TYPE_SUGGESTION', "Suggestions");
\define('_CO_TROMBINOSCOPE_FB_TYPE_BUGS', "Bogues");
\define('_CO_TROMBINOSCOPE_FB_TYPE_TESTIMONIAL', "Témoignages");
\define('_CO_TROMBINOSCOPE_FB_TYPE_FEATURES', "Caractéristiques");
\define('_CO_TROMBINOSCOPE_FB_TYPE_OTHERS', "Divers");
\define('_CO_TROMBINOSCOPE_FB_TYPE_CONTENT', "Contenu des commentaires");
\define('_CO_TROMBINOSCOPE_FB_SEND_FOR', "Commentaires pour le module ");
\define('_CO_TROMBINOSCOPE_FB_SEND_SUCCESS', "Commentaires envoyés avec succès");
\define('_CO_TROMBINOSCOPE_FB_SEND_ERROR', "Une erreur s'est produite lors de l'envoi du retour !");