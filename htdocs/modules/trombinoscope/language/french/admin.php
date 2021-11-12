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

// ---------------- Index administrateur ----------------
\define('_AM_TROMBINOSCOPE_STATISTICS', "Statistiques");
// Il y a
\define('_AM_TROMBINOSCOPE_THEREARE_MEMBERS', "Il y a <span class='bold'>%s</span> membres dans la base de données");
\define('_AM_TROMBINOSCOPE_THEREARE_CATEGORIES', "Il y a <span class='bold'>%s</span> catégories dans la base de données");
// ---------------- Fichiers d'administration ----------------
// Il n'y a pas
\define('_AM_TROMBINOSCOPE_THEREARENT_MEMBERS', "Il n'y a pas de membres");
\define('_AM_TROMBINOSCOPE_THEREARENT_CATEGORIES', "Il n'y a pas de catégories");
// Enregistrer/Supprimer
\define('_AM_TROMBINOSCOPE_FORM_OK', "Enregistré avec succès");
\define('_AM_TROMBINOSCOPE_FORM_DELETE_OK', "Supprimé avec succès");
\define('_AM_TROMBINOSCOPE_FORM_SURE_DELETE', "Êtes-vous sûr de supprimer : <b><span style='color : Red;'>%s </span></b>");
\define('_AM_TROMBINOSCOPE_FORM_SURE_RENEW', "Êtes-vous sûr de mettre à jour : <b><span style='color : Red;'>%s </span></b>");
// Boutons
\define('_AM_TROMBINOSCOPE_ADD_MEMBER', "Ajouter un nouveau membre");
\define('_AM_TROMBINOSCOPE_ADD_CATEGORY', "Ajouter une nouvelle catégorie");
// Listes
\define('_AM_TROMBINOSCOPE_LIST_MEMBERS', "Liste des membres");
\define('_AM_TROMBINOSCOPE_LIST_CATEGORIES', "Liste des catégories");
// ---------------- Classes d'administration ----------------
// Ajout/modification d'un membre
\define('_AM_TROMBINOSCOPE_MEMBER_ADD', "Ajouter un membre");
\define('_AM_TROMBINOSCOPE_MEMBER_EDIT', "Modifier le membre");
// Éléments de membre
\define('_AM_TROMBINOSCOPE_MEMBER_ID', "Id");
\define('_AM_TROMBINOSCOPE_MEMBER_CAT_ID', "#cat");
\define('_AM_TROMBINOSCOPE_MEMBER_UID', "Membres");
\define('_AM_TROMBINOSCOPE_MEMBER_FIRSTNAME', "Prénom");
\define('_AM_TROMBINOSCOPE_MEMBER_LASTNAME', "Lastname");
\define('_AM_TROMBINOSCOPE_MEMBER_FONCTION', "Fonction");
\define('_AM_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
\define('_AM_TROMBINOSCOPE_MEMBER_PHOTO_UPLOADS', "Photo dans %s :");
\define('_AM_TROMBINOSCOPE_MEMBER_BIRTHDAY', "Anniversaire");
\define('_AM_TROMBINOSCOPE_MEMBER_EMAIL', "Email");
\define('_AM_TROMBINOSCOPE_MEMBER_FIXE', "Fixe");
\define('_AM_TROMBINOSCOPE_MEMBER_MOBILE', "Mobile");
\define('_AM_TROMBINOSCOPE_MEMBER_STATUS', "Statut");
\define('_AM_TROMBINOSCOPE_MEMBER_COMMENTS', "Commentaires");
\define('_AM_TROMBINOSCOPE_MEMBER_ACTIF', "Actif");
\define('_AM_TROMBINOSCOPE_MEMBER_CREATION', "Création");
\define('_AM_TROMBINOSCOPE_MEMBER_UPDATE', "Mise à jour");
// Category add/edit
\define('_AM_TROMBINOSCOPE_CATEGORY_ADD', "Ajouter une catégorie");
\define('_AM_TROMBINOSCOPE_CATEGORY_EDIT', "Modifier la catégorie");
// Éléments de catégorie
\define('_AM_TROMBINOSCOPE_CATEGORY_ID', "Id");
\define('_AM_TROMBINOSCOPE_CATEGORY_PARENT_ID', "Identifiant parent");
\define('_AM_TROMBINOSCOPE_CATEGORY_NAME', "Nom");
\define('_AM_TROMBINOSCOPE_CATEGORY_WEIGHT', "Poids");
\define('_AM_TROMBINOSCOPE_CATEGORY_THEME', "Thème");
// Général
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD', "Télécharger le fichier");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_NEW', "Télécharger un nouveau fichier : ");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_SIZE', "Taille max du fichier : ");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_SIZE_MB', "MB");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_IMG_WIDTH', "Largeur max de l'image : ");
\define('_AM_TROMBINOSCOPE_FORM_UPLOAD_IMG_HEIGHT', "Hauteur max de l'image : ");
\define('_AM_TROMBINOSCOPE_FORM_IMAGE_PATH', "Fichiers dans %s :");
\define('_AM_TROMBINOSCOPE_FORM_ACTION', "Action");
\define('_AM_TROMBINOSCOPE_FORM_EDIT', "Modification");
\define('_AM_TROMBINOSCOPE_FORM_DELETE', "Effacer");
// Exemples de valeurs de liste
\define('_AM_TROMBINOSCOPE_LIST_1', "Valeur de liste d'échantillons 1");
\define('_AM_TROMBINOSCOPE_LIST_2', "Valeur de liste d'échantillons 2");
\define('_AM_TROMBINOSCOPE_LIST_3', "Valeur de liste d'échantillons 3");
// Fonctionnalité de clonage
\define('_AM_TROMBINOSCOPE_CLONE', "Cloner");
\define('_AM_TROMBINOSCOPE_CLONE_DSC', "Cloner un module n'a jamais été aussi simple ! Tapez simplement le nom que vous voulez et appuyez sur le bouton Soumettre !");
\define('_AM_TROMBINOSCOPE_CLONE_TITLE', "Cloner %s");
\define('_AM_TROMBINOSCOPE_CLONE_NAME', "Choisissez un nom pour le nouveau module");
\define('_AM_TROMBINOSCOPE_CLONE_NAME_DSC', "N'utilisez pas de caractères spéciaux ! <br>Ne choisissez pas un nom de dossier de module ou un nom de table de base de données existant !");
\define('_AM_TROMBINOSCOPE_CLONE_INVALIDNAME', "ERREUR : nom de module invalide, veuillez en essayer un autre !");
\define('_AM_TROMBINOSCOPE_CLONE_EXISTS', "ERREUR : nom du module déjà utilisé, veuillez en essayer un autre !");
\define('_AM_TROMBINOSCOPE_CLONE_CONGRAT', "Félicitations ! %s a été créé avec succès !<br>Vous voudrez peut-être apporter des modifications aux fichiers de langue.");
\define('_AM_TROMBINOSCOPE_CLONE_IMAGEFAIL', "Attention, nous n'avons pas réussi à créer le nouveau logo du module. Veuillez envisager de modifier les assets/images/logo_module.png manuellement !");
\define('_AM_TROMBINOSCOPE_CLONE_FAIL', "Désolé, nous n'avons pas réussi à créer le nouveau clone. Vous devez peut-être définir temporairement des autorisations d'écriture (CHMOD 777) sur le dossier modules et réessayer.");
// ---------------- Admin Autres ----------------
\define('_AM_TROMBINOSCOPE_ABOUT_MAKE_DONATION', "Soumettre");
\define('_AM_TROMBINOSCOPE_SUPPORT_FORUM', "Forum d'assistance");
\define('_AM_TROMBINOSCOPE_DONATION_AMOUNT', "Montant du don");
\define('_AM_TROMBINOSCOPE_MAINTAINEDBY', " est maintenu par ");
// ---------------- End ----------------
\define('_AM_TROMBINOSCOPE_CATEGORIE', "Catégorie");

\define('_AM_TROMBINOSCOPE_FORMAT_DATE_SHORT', "j-m-Y");
\define('_AM_TROMBINOSCOPE_FORMAT_DATE_LONG', "j-m-Y H:i:s");
\define('_AM_TROMBINOSCOPE_MEMBER_ADDRESS', "Adresse");
\define('_AM_TROMBINOSCOPE_MEMBER_CIVILITE', "Civilité");
\define('_AM_TROMBINOSCOPE_MEMBER_TEL', "Téléphones");
\define('_AM_TROMBINOSCOPE_MEMBRE_PHOTO', "Photo");

\define('_AM_TROMBINOSCOPE_MEMBER_SEXE', "Sexe");
\define('_AM_TROMBINOSCOPE_MEMBER_HOMME', "Homme");
\define('_AM_TROMBINOSCOPE_MEMBER_FEMME', "Femme");

