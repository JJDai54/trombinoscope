<?php
   /**
 * Name: modinfo.php
 * Description:
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package : XOOPS
 * @Module : 
 * @subpackage : Menu Language
 * @since 2.5.7
 * @author Jean-Jacques DELALANDRE (jjdelalandre@orange.fr)
 * @version {version}
 * Traduction:  
 */
 
defined( 'XOOPS_ROOT_PATH' ) or die( 'Accès restreint' );

define('_CO_TROMBINOSCOPE_GDLIBSTATUS', "GD library support: ");
define('_CO_TROMBINOSCOPE_GDLIBVERSION', "GD Library version: ");
define('_CO_TROMBINOSCOPE_GDOFF', "<span style='font-weight: bold;'>Disabled</span> (No thumbnails available)");
define('_CO_TROMBINOSCOPE_GDON', "<span style='font-weight: bold;'>Enabled</span> (Thumbsnails available)");
define('_CO_TROMBINOSCOPE_IMAGEINFO', "Server status");
define('_CO_TROMBINOSCOPE_MAXPOSTSIZE', "Max post size permitted (post_max_size directive in php.ini): ");
define('_CO_TROMBINOSCOPE_MAXUPLOADSIZE', "Max upload size permitted (upload_max_filesize directive in php.ini): ");
define('_CO_TROMBINOSCOPE_MEMORYLIMIT', "Memory limit (memory_limit directive in php.ini): ");
define('_CO_TROMBINOSCOPE_METAVERSION', "<span style='font-weight: bold;'>Downloads meta version:</span> ");
define('_CO_TROMBINOSCOPE_OFF', "<span style='font-weight: bold;'>OFF</span>");
define('_CO_TROMBINOSCOPE_ON', "<span style='font-weight: bold;'>ON</span>");
define('_CO_TROMBINOSCOPE_SERVERPATH', "Server path to XOOPS root: ");
define('_CO_TROMBINOSCOPE_SERVERUPLOADSTATUS', "Server uploads status: ");
define('_CO_TROMBINOSCOPE_SPHPINI', "<span style='font-weight: bold;'>Information taken from PHP ini file:</span>");
define('_CO_TROMBINOSCOPE_UPLOADPATHDSC', "Note. Upload path *MUST* contain the full server path of your upload folder.");
define('_CO_TROMBINOSCOPE_ERROR_BAD_XOOPS', "This module requires XOOPS %s+ (%s installed)");
define('_CO_TROMBINOSCOPE_ERROR_BAD_PHP', "This module requires PHP version %s+ (%s installed)");
define('_CO_TROMBINOSCOPE_ERROR_BAD_DEL_PATH', "Could not delete %s directory");
define('_CO_TROMBINOSCOPE_ADD_SAMPLEDATA', "Importer des exemples de données (supprimera TOUTES les données actuelles)");
define('_CO_TROMBINOSCOPE_SAMPLEDATA_SUCCESS', "Exemple de données importé avec succès");
define('_CO_TROMBINOSCOPE_SAVE_SAMPLEDATA', "Exporter les tables vers YAML");
define('_CO_TROMBINOSCOPE_SAVE_SAMPLEDATA_SUCCESS', "Exportation réussie des tables vers YAML");
define('_CO_TROMBINOSCOPE_SHOW_SAMPLE_BUTTON', "Afficher le bouton d'échantillon ?");
define('_CO_TROMBINOSCOPE_SHOW_SAMPLE_BUTTON_DESC', "Si oui, le bouton \"Ajouter des données d'exemple\" sera visible par l'administrateur. C'est Oui par défaut pour la première installation.");
define('_CO_TROMBINOSCOPE_EXPORT_SCHEMA', "Exporter le schéma de base de données vers YAML");
define('_CO_TROMBINOSCOPE_EXPORT_SCHEMA_SUCCESS', "L'exportation du schéma de base de données vers YAML a été un succès");
define('_CO_TROMBINOSCOPE_EXPORT_SCHEMA_ERROR', "ERREUR : l'exportation du schéma de base de données vers YAML a échoué");
define('_CO_TROMBINOSCOPE_ADD_SAMPLEDATA_OK', "Êtes-vous sûr d'importer des exemples de données ? (Cela supprimera TOUTES les données actuelles)");
define('_CO_TROMBINOSCOPE_CONFIRM', "Confirmer");
define('_CO_TROMBINOSCOPE_NEW_VERSION', "Nouvelle version : ");
define('_CO_TROMBINOSCOPE_UNACTIVATE', "Désactiver");
define('_CO_TROMBINOSCOPE_', "Submitted");

define('_CO_TROMBINOSCOPE_FORM_UPLOAD', "Upload file");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_NEW', "Upload new file: ");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_SIZE', "Max file size: ");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_SIZE_MB', "MB");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_IMG_WIDTH', "Max image width: ");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_IMG_HEIGHT', "Max image height: ");
define('_CO_TROMBINOSCOPE_FORM_ACTION', "Action");
define('_CO_TROMBINOSCOPE_FORM_DELETE', "Clear");
define('_CO_TROMBINOSCOPE_FORM_DELETE_OK', "Successfully deleted");
define('_CO_TROMBINOSCOPE_CATEGORIE', "Category");
define('_CO_TROMBINOSCOPE_FORMAT_DATE_SHORT', "Y-m-j");
define('_CO_TROMBINOSCOPE_MEMBER_ADDRESS', "Address");
define('_CO_TROMBINOSCOPE_MEMBER_CIVILITE', "Civility");
define('_CO_TROMBINOSCOPE_MEMBER_TEL', "Phones");
define('_CO_TROMBINOSCOPE_MEMBER_SEXE', "Sexe");
define('_CO_TROMBINOSCOPE_MEMBER_HOMME', "Homme");
define('_CO_TROMBINOSCOPE_MEMBER_FEMME', "Femme");
define('_CO_TROMBINOSCOPE_MEMBER_ADD', "Add Member");
define('_CO_TROMBINOSCOPE_MEMBER_EDIT', "Edit Member");
define('_CO_TROMBINOSCOPE_MEMBER_ID', "Id");
define('_CO_TROMBINOSCOPE_MEMBER_CAT_ID', "Cat id");
define('_CO_TROMBINOSCOPE_MEMBER_UID', "Members");
define('_CO_TROMBINOSCOPE_MEMBER_UID_DESC', "Si le membre est enregistré sur le site indiquez ici son pseudo.");
define('_CO_TROMBINOSCOPE_MEMBER_FIRSTNAME', "Firstname");
define('_CO_TROMBINOSCOPE_MEMBER_LASTNAME', "Lastname");
define('_CO_TROMBINOSCOPE_MEMBER_FONCTION', "Fonction");
define('_CO_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
define('_CO_TROMBINOSCOPE_MEMBER_BIRTHDAY', "Birthday");
define('_CO_TROMBINOSCOPE_MEMBER_EMAIL', "Email");
define('_CO_TROMBINOSCOPE_MEMBER_FIXE', "Fixe");
define('_CO_TROMBINOSCOPE_MEMBER_MOBILE', "Mobile");
define('_CO_TROMBINOSCOPE_MEMBER_STATUS', "Status");
define('_CO_TROMBINOSCOPE_MEMBER_COMMENTS', "Comments");
define('_CO_TROMBINOSCOPE_MEMBER_ACTIF', "Actif");
define('_CO_TROMBINOSCOPE_MEMBER_CREATION', "Creation");
define('_CO_TROMBINOSCOPE_MEMBER_UPDATE', "Update");

?>