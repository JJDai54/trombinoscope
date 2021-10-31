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

require_once __DIR__ . '/admin.php';

// ---------------- Principale ----------------
\define('_MA_TROMBINOSCOPE_INDEX', "Aperçu du trombinoscope");
\define('_MA_TROMBINOSCOPE_TITLE', "Trombinoscope");
\define('_MA_TROMBINOSCOPE_DESC', "Module de présentation d'un tromboniscope, et accessoirement de suivi des anniversaires");
\define('_MA_TROMBINOSCOPE_INDEX_DESC', "Bienvenue sur la page d'accueil de votre nouveau module Trombinoscope !<br>
Comme vous pouvez le voir, vous avez créé une page avec une liste de liens en haut pour naviguer entre les pages de votre module. Cette description n'est visible que sur la page d'accueil de ce module, les autres pages vous verrez le contenu que vous avez créé lorsque vous avez construit ce module avec le module ModuleBuilder, et après avoir créé un nouveau contenu dans l'admin de ce module. Afin d'étendre ce module avec d'autres ressources, ajoutez simplement le code dont vous avez besoin pour étendre les fonctionnalités de celui-ci. Les fichiers sont regroupés par type, de l'en-tête au pied de page pour voir comment se divise le code source.<br><br>Si vous voyez ce message, c'est que vous n'avez pas créé de contenu pour ce module. Une fois que vous avez créé tout type de contenu, vous ne verrez plus ce message.<br><br>Si vous avez aimé le module ModuleBuilder et grâce au long processus pour donner la possibilité au nouveau module d'être créé en un instant, pensez faire un don pour conserver le module ModuleBuilder et faire un don en utilisant ce bouton <a href='https://xoops.org/modules/xdonations/index.php' title='Donation To Txmod Xoops'><img src=' https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='Button Donations' ></a><br>Merci !<br><br>Utilisez le lien ci-dessous pour accéder au admin et créer du contenu.");
\define('_MA_TROMBINOSCOPE_NO_PDF_LIBRARY', "Les bibliothèques TCPDF ne sont pas encore là, téléchargez-les dans root/Frameworks");
\define('_MA_TROMBINOSCOPE_NO', "Non");
\define('_MA_TROMBINOSCOPE_DETAILS', "Afficher les détails");
\define('_MA_TROMBINOSCOPE_BROKEN', "Notifier cassé");
// ---------------- Contenu ----------------
// Membre
\define('_MA_TROMBINOSCOPE_MEMBER', "Membre");
\define('_MA_TROMBINOSCOPE_MEMBER_ADD', "Ajouter un membre");
\define('_MA_TROMBINOSCOPE_MEMBER_EDIT', "Modifier le membre");
\define('_MA_TROMBINOSCOPE_MEMBER_DELETE', "Supprimer un membre");
\define('_MA_TROMBINOSCOPE_MEMBER_CLONE', "Clone Member");
\define('_MA_TROMBINOSCOPE_MEMBERS', "Membres");
\define('_MA_TROMBINOSCOPE_MEMBERS_LIST', "Liste des membres");
\define('_MA_TROMBINOSCOPE_MEMBERS_TITLE', "Membres");
\define('_MA_TROMBINOSCOPE_MEMBERS_DESC', "Description des membres");
// Légende du membre
\define('_MA_TROMBINOSCOPE_MEMBER_ID', "Id");
\define('_MA_TROMBINOSCOPE_MEMBER_CAT_ID', "Cat_id");
\define('_MA_TROMBINOSCOPE_MEMBER_UID', "Uid");
\define('_MA_TROMBINOSCOPE_MEMBER_FIRSTNAME', "Prénom");
\define('_MA_TROMBINOSCOPE_MEMBER_LASTNAME', "Lastname");
\define('_MA_TROMBINOSCOPE_MEMBER_FONCTION', "Fonction");
\define('_MA_TROMBINOSCOPE_MEMBER_PHOTO', "Photo");
\define('_MA_TROMBINOSCOPE_MEMBER_BIRTHDAY', "Anniversaire");
\define('_MA_TROMBINOSCOPE_MEMBER_EMAIL', "Email");
\define('_MA_TROMBINOSCOPE_MEMBER_FIXE', "Fixe");
\define('_MA_TROMBINOSCOPE_MEMBER_MOBILE', "Mobile");
\define('_MA_TROMBINOSCOPE_MEMBER_STATUS', "Statut");
\define('_MA_TROMBINOSCOPE_MEMBER_COMMENTS', "Commentaires");
\define('_MA_TROMBINOSCOPE_MEMBER_ACTIF', "Actif");
\define('_MA_TROMBINOSCOPE_MEMBER_CREATION', "Création");
\define('_MA_TROMBINOSCOPE_MEMBER_UPDATE', "Mise à jour");
// Catégorie
\define('_MA_TROMBINOSCOPE_CATEGORY', "Catégorie");
\define('_MA_TROMBINOSCOPE_CATEGORY_ADD', "Ajouter une catégorie");
\define('_MA_TROMBINOSCOPE_CATEGORY_EDIT', "Modifier la catégorie");
\define('_MA_TROMBINOSCOPE_CATEGORY_DELETE', "Supprimer la catégorie");
\define('_MA_TROMBINOSCOPE_CATEGORY_CLONE', "Catégorie de clone");
\define('_MA_TROMBINOSCOPE_CATEGORIES', "Catégories");
\define('_MA_TROMBINOSCOPE_CATEGORIES_LIST', "Liste des catégories");
\define('_MA_TROMBINOSCOPE_CATEGORIES_TITLE', "Titre des catégories");
\define('_MA_TROMBINOSCOPE_CATEGORIES_DESC', "Description des catégories");
// Légende de la catégorie
\define('_MA_TROMBINOSCOPE_CATEGORY_ID', "Id");
\define('_MA_TROMBINOSCOPE_CATEGORY_PARENT_ID', "Parent_id");
\define('_MA_TROMBINOSCOPE_CATEGORY_NAME', "Nom");
\define('_MA_TROMBINOSCOPE_CATEGORY_WEIGHT', "Poids");
\define('_MA_TROMBINOSCOPE_CATEGORY_THEME', "Thème");
// Soumettre
\define('_MA_TROMBINOSCOPE_SUBMIT', "Soumettre");
// Former
\define('_MA_TROMBINOSCOPE_FORM_OK', "Enregistré avec succès");
\define('_MA_TROMBINOSCOPE_FORM_DELETE_OK', "Supprimé avec succès");
\define('_MA_TROMBINOSCOPE_FORM_SURE_DELETE', "Êtes-vous sûr de supprimer : <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TROMBINOSCOPE_FORM_SURE_RENEW', "Êtes-vous sûr de mettre à jour : <b><span style='color : Red;'>%s </span></b>");
\define('_MA_TROMBINOSCOPE_INVALID_PARAM', 'Paramètre invalide');
// Lien administrateur
\define('_MA_TROMBINOSCOPE_ADMIN', "Admin");
// ---------------- Finir ----------------
\define('_MA_TROMBINOSCOPE_INDEX_THEREARE', "Il y a %s événements");
\define('_MA_TROMBINOSCOPE_INDEX_LATEST_LIST', "Dernier trombinoscope");
\define('_MA_TROMBINOSCOPE_MEMBER_FONCTIONS', "Fonctions");