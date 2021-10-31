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

\define('CO_TROMBINOSCOPE_GDLIBSTATUS', "Prise en charge de la biblioth�que GD : ");
\define('CO_TROMBINOSCOPE_GDLIBVERSION', "Version de la biblioth�que GD : ");
\define('CO_TROMBINOSCOPE_GDOFF', "<span style='font-weight: bold;'>D�sactiv�</span> (Aucune vignette disponible)");
\define('CO_TROMBINOSCOPE_GDON', "<span style='font-weight: bold;'>Activ�</span> (Vignettes disponibles)");
\define('CO_TROMBINOSCOPE_IMAGEINFO', "Statut du serveur");
\define('CO_TROMBINOSCOPE_MAXPOSTSIZE', "Taille maximale de publication autoris�e (directive post_max_size dans php.ini): ");
\define('CO_TROMBINOSCOPE_MAXUPLOADSIZE', "Taille maximale de t�l�chargement autoris�e (directive upload_max_filesize dans php.ini): ");
\define('CO_TROMBINOSCOPE_MEMORYLIMIT', "Limite de m�moire (directive memory_limit dans php.ini): ");
\define('CO_TROMBINOSCOPE_METAVERSION', "<span style='font-weight: bold;'>T�l�charge la m�ta version�:</span> ");
\define('CO_TROMBINOSCOPE_OFF', "<span style='font-weight: bold;'>OFF</span>");
\define('CO_TROMBINOSCOPE_ON', "<span style='font-weight: bold;'>ON</span>");
\define('CO_TROMBINOSCOPE_SERVERPATH', "Chemin du serveur vers la racine XOOPS : ");
\define('CO_TROMBINOSCOPE_SERVERUPLOADSTATUS', "Statut des t�l�chargements du serveur�: ");
\define('CO_TROMBINOSCOPE_SPHPINI', "<span style='font-weight: bold;'>Informations extraites du fichier PHP ini�:</span>");
\define('CO_TROMBINOSCOPE_UPLOADPATHDSC', "Remarque. Le chemin de t�l�chargement *DOIT* contenir le chemin complet du serveur de votre dossier de t�l�chargement.");

\define('CO_TROMBINOSCOPE_PRINT', "<span style='font-weight: bold;'>Print</span>");
\define('CO_TROMBINOSCOPE_PDF', "<span style='font-weight: bold;'>Cr�er un PDF</span>");

\define('CO_TROMBINOSCOPE_UPGRADEFAILED0', "La mise � jour a �chou� - impossible de renommer le champ '%s'");
\define('CO_TROMBINOSCOPE_UPGRADEFAILED1', "La mise � jour a �chou� - impossible d'ajouter de nouveaux champs");
\define('CO_TROMBINOSCOPE_UPGRADEFAILED2', "La mise � jour a �chou� - impossible de renommer la table '%s'");
\define('CO_TROMBINOSCOPE_ERROR_COLUMN', "Impossible de cr�er la colonne dans la base de donn�es : %s");
\define('CO_TROMBINOSCOPE_ERROR_BAD_XOOPS', "Ce module requiert XOOPS %s+ (%s install�)");
\define('CO_TROMBINOSCOPE_ERROR_BAD_PHP', "Ce module requiert la version PHP %s+ (%s install�)");
\define('CO_TROMBINOSCOPE_ERROR_TAG_REMOVAL', "Impossible de supprimer les balises du module de balises");

\define('CO_TROMBINOSCOPE_FOLDERS_DELETED_OK', "Les dossiers de t�l�chargement ont �t� supprim�s");

// Messages d'erreur
\define('CO_TROMBINOSCOPE_ERROR_BAD_DEL_PATH', "Impossible de supprimer le r�pertoire %s");
\define('CO_TROMBINOSCOPE_ERROR_BAD_REMOVE', "Impossible de supprimer %s");
\define('CO_TROMBINOSCOPE_ERROR_NO_PLUGIN', "Impossible de charger le plugin");

//Aider
\define('CO_TROMBINOSCOPE_DIRNAME', \basename(\dirname(__DIR__, 2)));
\define('CO_TROMBINOSCOPE_HELP_HEADER', __DIR__ . "/help/helpheader.tpl");
\define('CO_TROMBINOSCOPE_BACK_2_ADMIN', "Retour � l'administration de ");
\define('CO_TROMBINOSCOPE_OVERVIEW', "Aper�u");

//\define('CO_TROMBINOSCOPE_HELP_DIR', __DIR__);

//aide multipage
\define('CO_TROMBINOSCOPE_DISCLAIMER', "Avertissement");
\define('CO_TROMBINOSCOPE_LICENSE', "Licence");
\define('CO_TROMBINOSCOPE_SUPPORT', "Support");

//Exemple de donn�es
\define('CO_TROMBINOSCOPE_ADD_SAMPLEDATA', "Importer des exemples de donn�es (supprimera TOUTES les donn�es actuelles)");
\define('CO_TROMBINOSCOPE_SAMPLEDATA_SUCCESS', "Exemple de donn�es import� avec succ�s");
\define('CO_TROMBINOSCOPE_SAVE_SAMPLEDATA', "Exporter les tables vers YAML");
\define('CO_TROMBINOSCOPE_SAVE_SAMPLEDATA_SUCCESS', "Exportation r�ussie des tables vers YAML");
\define('CO_TROMBINOSCOPE_SAVE_SAMPLEDATA_ERROR', "ERREUR�: l'exportation des tables vers YAML a �chou�");
\define('CO_TROMBINOSCOPE_SHOW_SAMPLE_BUTTON', "Afficher le bouton d'�chantillon�?");
\define('CO_TROMBINOSCOPE_SHOW_SAMPLE_BUTTON_DESC', "Si oui, le bouton \"Ajouter des donn�es d'exemple\" sera visible par l'administrateur. C'est Oui par d�faut pour la premi�re installation.");
\define('CO_TROMBINOSCOPE_EXPORT_SCHEMA', "Exporter le sch�ma de base de donn�es vers YAML");
\define('CO_TROMBINOSCOPE_EXPORT_SCHEMA_SUCCESS', "L'exportation du sch�ma de base de donn�es vers YAML a �t� un succ�s");
\define('CO_TROMBINOSCOPE_EXPORT_SCHEMA_ERROR', "ERREUR�: l'exportation du sch�ma de base de donn�es vers YAML a �chou�");
\define('CO_TROMBINOSCOPE_ADD_SAMPLEDATA_OK', "�tes-vous s�r d'importer des exemples de donn�es ? (Cela supprimera TOUTES les donn�es actuelles)");
\define('CO_TROMBINOSCOPE_HIDE_SAMPLEDATA_BUTTONS', "Masquer les boutons d'importation");
\define('CO_TROMBINOSCOPE_SHOW_SAMPLEDATA_BUTTONS', "Afficher les boutons d'importation");
\define('CO_TROMBINOSCOPE_CONFIRM', "Confirmer");

//choix de la lettre
\define('CO_TROMBINOSCOPE_BROWSETOTOPIC', "<span style='font-weight: bold;'>Parcourir les �l�ments par ordre alphab�tique</span>");
\define('CO_TROMBINOSCOPE_OTHER', "Autre");
\define('CO_TROMBINOSCOPE_ALL', "Tous");

// bloc d�finit
\define('CO_TROMBINOSCOPE_ACCESSRIGHTS', "Droits d'acc�s");
\define('CO_TROMBINOSCOPE_ACTION', "Action");
\define('CO_TROMBINOSCOPE_ACTIVERIGHTS', "Droits actifs");
\define('CO_TROMBINOSCOPE_BADMIN', "Bloquer l'administration");
\define('CO_TROMBINOSCOPE_BLKDESC', "Description");
\define('CO_TROMBINOSCOPE_CBCENTER', "Centre Milieu");
\define('CO_TROMBINOSCOPE_CBLEFT', "Centre Gauche");
\define('CO_TROMBINOSCOPE_CBRIGHT', "Centre � droite");
\define('CO_TROMBINOSCOPE_SBLEFT', "Gauche");
\define('CO_TROMBINOSCOPE_SBRIGHT', "Droite");
\define('CO_TROMBINOSCOPE_SIDE', "Alignement");
\define('CO_TROMBINOSCOPE_TITLE', "Titre");
\define('CO_TROMBINOSCOPE_VISIBLE', "Visible");
\define('CO_TROMBINOSCOPE_VISIBLEIN', "Visible dans");
\define('CO_TROMBINOSCOPE_WEIGHT', "Poids");

\define('CO_TROMBINOSCOPE_PERMISSIONS', "Autorisations");
\define('CO_TROMBINOSCOPE_BLOCKS', "Administrateur des blocs");
\define('CO_TROMBINOSCOPE_BLOCKS_DESC', "Administrateur de blocs/groupe");
\define('CO_TROMBINOSCOPE_BLOCKS_MANAGMENT', "G�rer");
\define('CO_TROMBINOSCOPE_BLOCKS_ADDBLOCK', "Ajouter un nouveau bloc");
\define('CO_TROMBINOSCOPE_BLOCKS_EDITBLOCK', "Modifier un bloc");
\define('CO_TROMBINOSCOPE_BLOCKS_CLONEBLOCK', "Cloner un bloc");

//mesblocsadmin
\define('CO_TROMBINOSCOPE_AGDS', "Groupes d'administrateurs");
\define('CO_TROMBINOSCOPE_BCACHETIME', "Heure du cache");
\define('CO_TROMBINOSCOPE_BLOCKS_ADMIN', "Administrateur des blocs");

//Administrateur de mod�les
\define('CO_TROMBINOSCOPE_TPLSETS', "Gestion des mod�les");
\define('CO_TROMBINOSCOPE_GENERATE', "G�n�rer");
\define('CO_TROMBINOSCOPE_FILENAME', "Nom de fichier");

//Menu
\define('CO_TROMBINOSCOPE_ADMENU_MIGRATE', "Migrer");
\define('CO_TROMBINOSCOPE_FOLDER_YES', "Le dossier \"%s\" existe");
\define('CO_TROMBINOSCOPE_FOLDER_NO', "Le dossier \"%s\" n'existe pas. Cr�ez le dossier sp�cifi� avec CHMOD 777.");
\define('CO_TROMBINOSCOPE_SHOW_DEV_TOOLS', "Afficher le bouton Outils de d�veloppement�?");
\define('CO_TROMBINOSCOPE_SHOW_DEV_TOOLS_DESC', "Si oui, l'onglet \"Migrer\" et les autres outils de d�veloppement seront visibles par l'administrateur.");
\define('CO_TROMBINOSCOPE_ADMENU_FEEDBACK', "Commentaires");

//V�rification de la derni�re version
\define('CO_TROMBINOSCOPE_NEW_VERSION', "Nouvelle version : ");

//DirectoryChecker
\define('CO_TROMBINOSCOPE_AVAILABLE', "<span style='color: green;'>Disponible</span>");
\define('CO_TROMBINOSCOPE_NOTAVAILABLE', "<span style='color: red;'>Non disponible</span>");
\define('CO_TROMBINOSCOPE_NOTWRITABLE', "<span style='color: red;'>Devrait avoir l'autorisation ( %d ), mais il a ( %d )</span>");
\define('CO_TROMBINOSCOPE_CREATETHEDIR', "Cr�ez-le");
\define('CO_TROMBINOSCOPE_SETMPERM', "D�finir l'autorisation");
\define('CO_TROMBINOSCOPE_DIRCREATED', "Le r�pertoire a �t� cr��");
\define('CO_TROMBINOSCOPE_DIRNOTCREATED', "Impossible de cr�er le r�pertoire");
\define('CO_TROMBINOSCOPE_PERMSET', "L'autorisation a �t� d�finie");
\define('CO_TROMBINOSCOPE_PERMNOTSET', "L'autorisation ne peut pas �tre d�finie");

// V�rificateur de fichiers
//\define('CO_TROMBINOSCOPE_AVAILABLE', "<span style='color: green;'>Disponible</span>");
//\define('CO_TROMBINOSCOPE_NOTAVAILABLE', "<span style='color: red;'>Non disponible</span>");
//\define('CO_TROMBINOSCOPE_NOTWRITABLE', "<span style='color: red;'>Devrait avoir l'autorisation ( %d ), mais il a ( %d )</span>");
//\define('CO_TROMBINOSCOPE_COPYTHEFILE', "Copier");
//\define('CO_TROMBINOSCOPE_CREATETHEFILE', "Cr�ez-le");
//\define('CO_TROMBINOSCOPE_SETMPERM', "D�finir l'autorisation");

\define('CO_TROMBINOSCOPE_FILECOPIED', "Le fichier a �t� copi�");
\define('CO_TROMBINOSCOPE_FILENOTCOPIED', "Le fichier ne peut pas �tre copi�");

//\define('CO_TROMBINOSCOPE_PERMSET', "L'autorisation a �t� d�finie");
//\define('CO_TROMBINOSCOPE_PERMNOTSET', "L'autorisation ne peut pas �tre d�finie");

//configuration de l'image
\define('CO_TROMBINOSCOPE_IMAGE_WIDTH', "Largeur d'affichage de l'image");
\define('CO_TROMBINOSCOPE_IMAGE_WIDTH_DSC', "Largeur d'affichage pour l'image");
\define('CO_TROMBINOSCOPE_IMAGE_HEIGHT', "Hauteur d'affichage de l'image");
\define('CO_TROMBINOSCOPE_IMAGE_HEIGHT_DSC', "Afficher la hauteur de l'image");
\define('CO_TROMBINOSCOPE_IMAGE_CONFIG', "<span style='color: #FF0000; font-size: Small; font-weight: bold;'>--- Configuration de l'image EXTERNE ---</span> ");
\define('CO_TROMBINOSCOPE_IMAGE_CONFIG_DSC', "");
\define('CO_TROMBINOSCOPE_IMAGE_UPLOAD_PATH', "Chemin de t�l�chargement de l'image");
\define('CO_TROMBINOSCOPE_IMAGE_UPLOAD_PATH_DSC', "Chemin de t�l�chargement des images");

//Pr�f�rences
\define('CO_TROMBINOSCOPE_TRUNCATE_LENGTH', "Nombre de caract�res � tronquer au champ de texte long");
\define('CO_TROMBINOSCOPE_TRUNCATE_LENGTH_DESC', "D�finir le nombre maximum de caract�res pour tronquer les champs de texte longs");

//Statistiques du module
\define('CO_TROMBINOSCOPE_STATS_SUMMARY', "Statistiques du module");
\define('CO_TROMBINOSCOPE_TOTAL_CATEGORIES', "Cat�gories�:");
\define('CO_TROMBINOSCOPE_TOTAL_ITEMS', "Articles");
\define('CO_TROMBINOSCOPE_TOTAL_OFFLINE', "Hors ligne");
\define('CO_TROMBINOSCOPE_TOTAL_PUBLISHED', "Publi�");
\define('CO_TROMBINOSCOPE_TOTAL_REJECTED', "Rejet�");
\define('CO_TROMBINOSCOPE_TOTAL_SUBMITTED', "Soumis");