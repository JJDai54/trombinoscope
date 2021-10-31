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

// ---------------- Administration principale ----------------
\define('_MI_TROMBINOSCOPE_NAME', "Trombinoscope");
\define('_MI_TROMBINOSCOPE_DESC', "Module de présentation d'un tromboniscope, et accessoirement de suivi des anniversaires");
// ---------------- Menu Admin ----------------
\define('_MI_TROMBINOSCOPE_ADMENU1', "Tableau de bord");
\define('_MI_TROMBINOSCOPE_ADMENU2', "Catégories");
\define('_MI_TROMBINOSCOPE_ADMENU3', "Membres");
\define('_MI_TROMBINOSCOPE_ADMENU5', "Cloner");
\define('_MI_TROMBINOSCOPE_ADMENU6', "Commentaires");
\define('_MI_TROMBINOSCOPE_ABOUT', "À propos");
// ---------------- Nav Admin ----------------
\define('_MI_TROMBINOSCOPE_ADMIN_PAGER', "Pager administrateur");
\define('_MI_TROMBINOSCOPE_ADMIN_PAGER_DESC', "Admin par liste de pages");
// Utilisateur
\define('_MI_TROMBINOSCOPE_USER_PAGER', "Pager utilisateur");
\define('_MI_TROMBINOSCOPE_USER_PAGER_DESC', "Liste d'utilisateurs par page");
// Sous-menu
\define('_MI_TROMBINOSCOPE_SMNAME1', "Page d'index");
\define('_MI_TROMBINOSCOPE_SMNAME2', "Membres");
\define('_MI_TROMBINOSCOPE_SMNAME3', "Soumettre les membres");
\define('_MI_TROMBINOSCOPE_SMNAME4', "Catégories");
\define('_MI_TROMBINOSCOPE_SMNAME5', "Soumettre les catégories");
\define('_MI_TROMBINOSCOPE_SMNAME8', "Rechercher");
// Blocs
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK', "Bloc des membres");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_DESC', "Description du bloc des membres");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_MEMBER', "Membres du bloc MEMBER");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_MEMBER_DESC', "Description du MEMBRE du bloc des membres");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_LAST', "Les membres bloquent en dernier");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_LAST_DESC', "Les membres bloquent la dernière description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_NEW', "Les membres bloquent nouveau");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_NEW_DESC', "Les membres bloquent la nouvelle description");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_HITS', "Les membres bloquent les hits");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_HITS_DESC', "Description des occurrences du bloc de membres");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_TOP', "Les membres bloquent en haut");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_TOP_DESC', "Description du haut du bloc des membres");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_RANDOM', "Les membres bloquent au hasard");
\define('_MI_TROMBINOSCOPE_MEMBERS_BLOCK_RANDOM_DESC', "Les membres bloquent la description aléatoire");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK', "Bloc de catégories");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK_DESC', "Description du bloc de catégories");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK_CATEGORY', "Catégories bloc CATEGORY");
\define('_MI_TROMBINOSCOPE_CATEGORIES_BLOCK_CATEGORY_DESC', "Catégories bloc description CATÉGORIE");
// Config
\define('_MI_TROMBINOSCOPE_EDITOR_ADMIN', "Editeur administrateur");
\define('_MI_TROMBINOSCOPE_EDITOR_ADMIN_DESC', "Sélectionnez l'éditeur qui doit être utilisé dans la zone d'administration pour les champs de zone de texte");
\define('_MI_TROMBINOSCOPE_EDITOR_USER', "Éditeur utilisateur");
\define('_MI_TROMBINOSCOPE_EDITOR_USER_DESC', "Sélectionnez l'éditeur qui doit être utilisé dans la zone utilisateur pour les champs de la zone de texte");
\define('_MI_TROMBINOSCOPE_EDITOR_MAXCHAR', "Texte max caractères");
\define('_MI_TROMBINOSCOPE_EDITOR_MAXCHAR_DESC', "Max caractères pour afficher le texte d'une zone de texte ou d'un champ d'éditeur dans la zone d'administration");
\define('_MI_TROMBINOSCOPE_KEYWORDS', "Mots clés");
\define('_MI_TROMBINOSCOPE_KEYWORDS_DESC', "Insérez ici les mots-clés (séparés par des virgules)");
\define('_MI_TROMBINOSCOPE_SIZE_MB', "Mo");
\define('_MI_TROMBINOSCOPE_MAXSIZE_IMAGE', "Taille max de l'image");
\define('_MI_TROMBINOSCOPE_MAXSIZE_IMAGE_DESC', "Définir la taille maximale pour le téléchargement des images");
\define('_MI_TROMBINOSCOPE_MIMETYPES_IMAGE', "Image de types Mime");
\define('_MI_TROMBINOSCOPE_MIMETYPES_IMAGE_DESC', "Définir les types mime autorisés pour le téléchargement d'images");
\define('_MI_TROMBINOSCOPE_MAXWIDTH_IMAGE', "Largeur max de l'image");
\define('_MI_TROMBINOSCOPE_MAXWIDTH_IMAGE_DESC', "Définir la largeur maximale à laquelle les images téléchargées doivent être redimensionnées (en pixels)<br>0 signifie que les images conservent la taille d'origine. <br>Si une image est plus petite que la valeur maximale, alors l'image ne sera pas agrandi, il sera sauvegardé dans la largeur d'origine.");
\define('_MI_TROMBINOSCOPE_MAXHEIGHT_IMAGE', "Hauteur max de l'image");
\define('_MI_TROMBINOSCOPE_MAXHEIGHT_IMAGE_DESC', "Définir la hauteur maximale à laquelle les images téléchargées doivent être redimensionnées (en pixels)<br>0 signifie que les images conservent la taille d'origine. <br>Si une image est plus petite que la valeur maximale, alors l'image ne sera pas agrandi, il sera sauvegardé dans la hauteur d'origine");
\define('_MI_TROMBINOSCOPE_NUMB_COL', "Nombre de colonnes");
\define('_MI_TROMBINOSCOPE_NUMB_COL_DESC', "Nombre de colonnes à afficher");
\define('_MI_TROMBINOSCOPE_DIVIDEBY', "Diviser par");
\define('_MI_TROMBINOSCOPE_DIVIDEBY_DESC', "Diviser par le nombre de colonnes");
\define('_MI_TROMBINOSCOPE_TABLE_TYPE', "Type de table");
\define('_MI_TROMBINOSCOPE_TABLE_TYPE_DESC', "Le type de table est la table html d'amorçage");
\define('_MI_TROMBINOSCOPE_PANEL_TYPE', "Type de panneau");
\define('_MI_TROMBINOSCOPE_PANEL_TYPE_DESC', "Le type de panneau est la div html d'amorçage");
\define('_MI_TROMBINOSCOPE_IDPAYPAL', "Identifiant Paypal");
\define('_MI_TROMBINOSCOPE_IDPAYPAL_DESC', "Insérez ici votre identifiant PayPal pour les dons");
\define('_MI_TROMBINOSCOPE_SHOW_BREADCRUMBS', "Afficher le fil d'Ariane");
\define('_MI_TROMBINOSCOPE_SHOW_BREADCRUMBS_DESC', "Afficher le fil d'Ariane qui affiche la page actuelle en contexte dans la structure du site");
\define('_MI_TROMBINOSCOPE_ADVERTISE', "Code d'annonce");
\define('_MI_TROMBINOSCOPE_ADVERTISE_DESC', "Insérez ici le code de l'annonce");
\define('_MI_TROMBINOSCOPE_MAINTAINEDBY', "Maintenu par");
\define('_MI_TROMBINOSCOPE_MAINTAINEDBY_DESC', "Autoriser l'url du site de support ou de la communauté");
\define('_MI_TROMBINOSCOPE_BOOKMARKS', "Signets sociaux");
\define('_MI_TROMBINOSCOPE_BOOKMARKS_DESC', "Afficher les signets sociaux sur une seule page");
// ---------------- Finir ----------------