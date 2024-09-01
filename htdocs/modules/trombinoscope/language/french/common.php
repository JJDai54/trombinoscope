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

define('_CO_TROMBINOSCOPE_GDLIBSTATUS', "Prise en charge de la bibliothèque GD : ");
define('_CO_TROMBINOSCOPE_GDLIBVERSION', "Version de la bibliothèque GD : ");
define('_CO_TROMBINOSCOPE_GDOFF', "<span style='font-weight: bold;'>Désactivé</span> (Aucune vignette disponible)");
define('_CO_TROMBINOSCOPE_GDON', "<span style='font-weight: bold;'>Activé</span> (Vignettes disponibles)");
define('_CO_TROMBINOSCOPE_IMAGEINFO', "Statut du serveur");
define('_CO_TROMBINOSCOPE_MAXPOSTSIZE', "Taille maximale de publication autorisée (directive post_max_size dans php.ini): ");
define('_CO_TROMBINOSCOPE_MAXUPLOADSIZE', "Taille maximale de téléchargement autorisée (directive upload_max_filesize dans php.ini): ");
define('_CO_TROMBINOSCOPE_MEMORYLIMIT', "Limite de mémoire (directive memory_limit dans php.ini): ");
define('_CO_TROMBINOSCOPE_METAVERSION', "<span style='font-weight: bold;'>Télécharge la méta version :</span> ");
define('_CO_TROMBINOSCOPE_OFF', "<span style='font-weight: bold;'>OFF</span>");
define('_CO_TROMBINOSCOPE_ON', "<span style='font-weight: bold;'>ON</span>");
define('_CO_TROMBINOSCOPE_SERVERPATH', "Chemin du serveur vers la racine XOOPS : ");
define('_CO_TROMBINOSCOPE_SERVERUPLOADSTATUS', "Statut des téléchargements du serveur : ");
define('_CO_TROMBINOSCOPE_SPHPINI', "<span style='font-weight: bold;'>Informations extraites du fichier PHP ini :</span>");
define('_CO_TROMBINOSCOPE_UPLOADPATHDSC', "Remarque. Le chemin de téléchargement *DOIT* contenir le chemin complet du serveur de votre dossier de téléchargement.");
define('_CO_TROMBINOSCOPE_ERROR_BAD_XOOPS', "Ce module requiert XOOPS %s+ (%s installé)");
define('_CO_TROMBINOSCOPE_ERROR_BAD_PHP', "Ce module requiert la version PHP %s+ (%s installé)");
define('_CO_TROMBINOSCOPE_ERROR_BAD_DEL_PATH', "Impossible de supprimer le répertoire %s");
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

define('_CO_TROMBINOSCOPE_CATEGORIE', "Catégorie");
define('_CO_TROMBINOSCOPE_MEMBER_ADDRESS', "Adresse");
define('_CO_TROMBINOSCOPE_MEMBER_CIVILITE', "Civilité");
define('_CO_TROMBINOSCOPE_MEMBER_TEL', "Téléphones");
define('_AM_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
define('_CO_TROMBINOSCOPE_QUALITY', "Qualité");
define('_CO_TROMBINOSCOPE_QUALITY_HOMME', "Homme");
define('_CO_TROMBINOSCOPE_QUALITY_FEMME', "Femme");
define('_CO_TROMBINOSCOPE_QUALITY_ASSOCIATION', "Association");
define('_CO_TROMBINOSCOPE_QUALITY_SOCIETE', "Societé");
define('_CO_TROMBINOSCOPE_QUALITY_COLLECTIVITE', "Collectivité");
define('_CO_TROMBINOSCOPE_QUALITY_MUNICIPALITE', "Municipalité");
define('_CO_TROMBINOSCOPE_QUALITY_AUTRE', "Autre");

define('_CO_TROMBINOSCOPE_MEMBER_ADD', "Ajouter un membre");
define('_CO_TROMBINOSCOPE_MEMBER_EDIT', "Modifier le membre");
define('_CO_TROMBINOSCOPE_MEMBER_ID', "Id");
define('_CO_TROMBINOSCOPE_MEMBER_CAT_ID', "#cat");
define('_CO_TROMBINOSCOPE_MEMBER_UID', "Membres");
define('_CO_TROMBINOSCOPE_MEMBER_UID_DESC', "Si le membre est enregistré sur le site indiquez ici son pseudo.");
define('_CO_TROMBINOSCOPE_MEMBER_FIRSTNAME', "Prénom");
define('_CO_TROMBINOSCOPE_MEMBER_LASTNAME', "Nom");
define('_CO_TROMBINOSCOPE_MEMBER_FONCTION', "Fonction");
define('_CO_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
define('_CO_TROMBINOSCOPE_MEMBER_BIRTHDAY', "Anniversaire");
define('_CO_TROMBINOSCOPE_MEMBER_EMAIL', "Email");
define('_CO_TROMBINOSCOPE_MEMBER_FIXE', "Fixe");
define('_CO_TROMBINOSCOPE_MEMBER_MOBILE', "Mobile");
define('_CO_TROMBINOSCOPE_MEMBER_STATUS', "Statut");
define('_CO_TROMBINOSCOPE_MEMBER_COMMENTS', "Commentaires");
define('_CO_TROMBINOSCOPE_MEMBER_ACTIF', "Actif");
define('_CO_TROMBINOSCOPE_MEMBER_CREATION', "Création");
define('_CO_TROMBINOSCOPE_MEMBER_UPDATE', "Mise à jour");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD', "Télécharger le fichier");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_NEW', "Télécharger un nouveau fichier : ");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_SIZE', "Taille max du fichier : ");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_SIZE_MB', "MB");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_IMG_WIDTH', "Largeur max de l'image : ");
define('_CO_TROMBINOSCOPE_FORM_UPLOAD_IMG_HEIGHT', "Hauteur max de l'image : ");
define('_CO_TROMBINOSCOPE_FORM_ACTION', "Action");
define('_CO_TROMBINOSCOPE_FORM_DELETE', "Effacer");
define('_CO_TROMBINOSCOPE_FORM_DELETE_OK', "Supprimé avec succès");




?>
