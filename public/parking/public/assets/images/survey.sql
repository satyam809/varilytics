-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2022 at 06:47 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE `survey_answers` (
  `aid` int NOT NULL,
  `qid` int NOT NULL,
  `code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortorder` int NOT NULL,
  `assessment_value` int NOT NULL DEFAULT '0',
  `scale_id` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_answer_l10ns`
--

CREATE TABLE `survey_answer_l10ns` (
  `id` int NOT NULL,
  `aid` int NOT NULL,
  `answer` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_archived_table_settings`
--

CREATE TABLE `survey_archived_table_settings` (
  `id` int NOT NULL,
  `survey_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tbl_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `properties` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_assessments`
--

CREATE TABLE `survey_assessments` (
  `id` int NOT NULL,
  `sid` int NOT NULL DEFAULT '0',
  `scope` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gid` int NOT NULL DEFAULT '0',
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_asset_version`
--

CREATE TABLE `survey_asset_version` (
  `id` int NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_boxes`
--

CREATE TABLE `survey_boxes` (
  `id` int NOT NULL,
  `position` int DEFAULT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usergroup` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_boxes`
--

INSERT INTO `survey_boxes` (`id`, `position`, `url`, `title`, `ico`, `desc`, `page`, `usergroup`) VALUES
(1, 1, 'surveyAdministration/newSurvey', 'Create survey', 'icon-add', 'Create a new survey', 'welcome', -2),
(2, 2, 'surveyAdministration/listsurveys', 'List surveys', 'icon-list', 'List available surveys', 'welcome', -1),
(3, 3, 'admin/globalsettings', 'Global settings', 'icon-settings', 'Edit global settings', 'welcome', -2),
(4, 4, 'admin/update', 'ComfortUpdate', 'icon-shield', 'Stay safe and up to date', 'welcome', -2),
(5, 5, 'http://165.22.215.103/varistats/', 'LimeStore', 'fa fa-cart-plus', 'VariStats extension marketplace', 'welcome', -2),
(6, 6, 'themeOptions', 'Themes', 'icon-templates', 'Themes', 'welcome', -2);

-- --------------------------------------------------------

--
-- Table structure for table `survey_conditions`
--

CREATE TABLE `survey_conditions` (
  `cid` int NOT NULL,
  `qid` int NOT NULL DEFAULT '0',
  `cqid` int NOT NULL DEFAULT '0',
  `cfieldname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `method` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `scenario` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_defaultvalues`
--

CREATE TABLE `survey_defaultvalues` (
  `dvid` int NOT NULL,
  `qid` int NOT NULL DEFAULT '0',
  `scale_id` int NOT NULL DEFAULT '0',
  `sqid` int NOT NULL DEFAULT '0',
  `specialtype` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_defaultvalue_l10ns`
--

CREATE TABLE `survey_defaultvalue_l10ns` (
  `id` int NOT NULL,
  `dvid` int NOT NULL DEFAULT '0',
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `defaultvalue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_expression_errors`
--

CREATE TABLE `survey_expression_errors` (
  `id` int NOT NULL,
  `errortime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sid` int DEFAULT NULL,
  `gid` int DEFAULT NULL,
  `qid` int DEFAULT NULL,
  `gseq` int DEFAULT NULL,
  `qseq` int DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eqn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `prettyprint` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_failed_login_attempts`
--

CREATE TABLE `survey_failed_login_attempts` (
  `id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_attempt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_attempts` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_groups`
--

CREATE TABLE `survey_groups` (
  `gid` int NOT NULL,
  `sid` int NOT NULL DEFAULT '0',
  `group_order` int NOT NULL DEFAULT '0',
  `randomization_group` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `grelevance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_groups`
--

INSERT INTO `survey_groups` (`gid`, `sid`, `group_order`, `randomization_group`, `grelevance`) VALUES
(1, 145616, 1, '', '1'),
(2, 492846, 1, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `survey_group_l10ns`
--

CREATE TABLE `survey_group_l10ns` (
  `id` int NOT NULL,
  `gid` int NOT NULL,
  `group_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_group_l10ns`
--

INSERT INTO `survey_group_l10ns` (`id`, `gid`, `group_name`, `description`, `language`) VALUES
(1, 1, 'My first question group', NULL, 'en'),
(2, 2, 'My first question group', NULL, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `survey_labels`
--

CREATE TABLE `survey_labels` (
  `id` int NOT NULL,
  `lid` int NOT NULL DEFAULT '0',
  `code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sortorder` int NOT NULL,
  `assessment_value` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_labelsets`
--

CREATE TABLE `survey_labelsets` (
  `lid` int NOT NULL,
  `label_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `languages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_label_l10ns`
--

CREATE TABLE `survey_label_l10ns` (
  `id` int NOT NULL,
  `label_id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_map_tutorial_users`
--

CREATE TABLE `survey_map_tutorial_users` (
  `tid` int NOT NULL,
  `uid` int NOT NULL,
  `taken` int DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_notifications`
--

CREATE TABLE `survey_notifications` (
  `id` int NOT NULL,
  `entity` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `importance` int NOT NULL DEFAULT '1',
  `display_class` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `hash` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `first_read` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_notifications`
--

INSERT INTO `survey_notifications` (`id`, `entity`, `entity_id`, `title`, `message`, `status`, `importance`, `display_class`, `hash`, `created`, `first_read`) VALUES
(1, 'user', 1, 'SSL not enforced', '<span class=\"fa fa-exclamation-circle text-warning\"></span>&nbsp;Warning: Please enforce SSL encrpytion in Global settings/Security after SSL is properly configured for your webserver.', 'new', 1, 'default', '72d109bee95d1381831c7f2e8eade340a523f9702f5ec2c7cc2d25726bec3e9a', '2022-02-15 17:09:50', '2022-02-15 12:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `survey_participants`
--

CREATE TABLE `survey_participants` (
  `participant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `language` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blacklisted` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_uid` int NOT NULL,
  `created_by` int NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_participant_attribute`
--

CREATE TABLE `survey_participant_attribute` (
  `participant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_participant_attribute_names`
--

CREATE TABLE `survey_participant_attribute_names` (
  `attribute_id` int NOT NULL,
  `attribute_type` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `defaultname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `encrypted` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_attribute` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_participant_attribute_names`
--

INSERT INTO `survey_participant_attribute_names` (`attribute_id`, `attribute_type`, `defaultname`, `visible`, `encrypted`, `core_attribute`) VALUES
(1, 'TB', 'firstname', 'TRUE', 'Y', 'Y'),
(2, 'TB', 'lastname', 'TRUE', 'Y', 'Y'),
(3, 'TB', 'email', 'TRUE', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `survey_participant_attribute_names_lang`
--

CREATE TABLE `survey_participant_attribute_names_lang` (
  `attribute_id` int NOT NULL,
  `attribute_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_participant_attribute_values`
--

CREATE TABLE `survey_participant_attribute_values` (
  `value_id` int NOT NULL,
  `attribute_id` int NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_participant_shares`
--

CREATE TABLE `survey_participant_shares` (
  `participant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `share_uid` int NOT NULL,
  `date_added` datetime NOT NULL,
  `can_edit` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_permissions`
--

CREATE TABLE `survey_permissions` (
  `id` int NOT NULL,
  `entity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` int NOT NULL,
  `uid` int NOT NULL,
  `permission` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_p` int NOT NULL DEFAULT '0',
  `read_p` int NOT NULL DEFAULT '0',
  `update_p` int NOT NULL DEFAULT '0',
  `delete_p` int NOT NULL DEFAULT '0',
  `import_p` int NOT NULL DEFAULT '0',
  `export_p` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_permissions`
--

INSERT INTO `survey_permissions` (`id`, `entity`, `entity_id`, `uid`, `permission`, `create_p`, `read_p`, `update_p`, `delete_p`, `import_p`, `export_p`) VALUES
(1, 'global', 0, 1, 'superadmin', 0, 1, 0, 0, 0, 0),
(2, 'survey', 145616, 1, 'assessments', 1, 1, 1, 1, 0, 0),
(3, 'survey', 145616, 1, 'quotas', 1, 1, 1, 1, 0, 0),
(4, 'survey', 145616, 1, 'responses', 1, 1, 1, 1, 1, 1),
(5, 'survey', 145616, 1, 'statistics', 0, 1, 0, 0, 0, 0),
(6, 'survey', 145616, 1, 'survey', 0, 1, 0, 1, 0, 0),
(7, 'survey', 145616, 1, 'surveyactivation', 0, 0, 1, 0, 0, 0),
(8, 'survey', 145616, 1, 'surveycontent', 1, 1, 1, 1, 1, 1),
(9, 'survey', 145616, 1, 'surveylocale', 0, 1, 1, 0, 0, 0),
(10, 'survey', 145616, 1, 'surveysecurity', 1, 1, 1, 1, 0, 0),
(11, 'survey', 145616, 1, 'surveysettings', 0, 1, 1, 0, 0, 0),
(12, 'survey', 145616, 1, 'tokens', 1, 1, 1, 1, 1, 1),
(13, 'survey', 145616, 1, 'translations', 0, 1, 1, 0, 0, 0),
(14, 'survey', 492846, 1, 'assessments', 1, 1, 1, 1, 0, 0),
(15, 'survey', 492846, 1, 'quotas', 1, 1, 1, 1, 0, 0),
(16, 'survey', 492846, 1, 'responses', 1, 1, 1, 1, 1, 1),
(17, 'survey', 492846, 1, 'statistics', 0, 1, 0, 0, 0, 0),
(18, 'survey', 492846, 1, 'survey', 0, 1, 0, 1, 0, 0),
(19, 'survey', 492846, 1, 'surveyactivation', 0, 0, 1, 0, 0, 0),
(20, 'survey', 492846, 1, 'surveycontent', 1, 1, 1, 1, 1, 1),
(21, 'survey', 492846, 1, 'surveylocale', 0, 1, 1, 0, 0, 0),
(22, 'survey', 492846, 1, 'surveysecurity', 1, 1, 1, 1, 0, 0),
(23, 'survey', 492846, 1, 'surveysettings', 0, 1, 1, 0, 0, 0),
(24, 'survey', 492846, 1, 'tokens', 1, 1, 1, 1, 1, 1),
(25, 'survey', 492846, 1, 'translations', 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey_permissiontemplates`
--

CREATE TABLE `survey_permissiontemplates` (
  `ptid` int NOT NULL,
  `name` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `renewed_last` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_plugins`
--

CREATE TABLE `survey_plugins` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plugin_type` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `active` int NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0',
  `version` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_error` int DEFAULT '0',
  `load_error_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_plugins`
--

INSERT INTO `survey_plugins` (`id`, `name`, `plugin_type`, `active`, `priority`, `version`, `load_error`, `load_error_message`) VALUES
(1, 'UpdateCheck', 'core', 1, 0, '1.0.0', 0, NULL),
(2, 'PasswordRequirement', 'core', 1, 0, '1.0.0', 0, NULL),
(3, 'ComfortUpdateChecker', 'core', 1, 0, '1.0.0', 0, NULL),
(4, 'Authdb', 'core', 1, 0, '1.0.0', 0, NULL),
(5, 'AuthLDAP', 'core', 0, 0, '1.0.0', 0, NULL),
(6, 'AuditLog', 'core', 0, 0, '1.0.0', 0, NULL),
(7, 'Authwebserver', 'core', 0, 0, '1.0.0', 0, NULL),
(8, 'ExportR', 'core', 1, 0, '1.0.0', 0, NULL),
(9, 'ExportSTATAxml', 'core', 1, 0, '1.0.0', 0, NULL),
(10, 'ExportSPSSsav', 'core', 1, 0, '1.0.4', 0, NULL),
(11, 'oldUrlCompat', 'core', 0, 0, '1.0.1', 0, NULL),
(12, 'expressionQuestionHelp', 'core', 0, 0, '1.0.1', 0, NULL),
(13, 'expressionQuestionForAll', 'core', 0, 0, '1.0.1', 0, NULL),
(14, 'expressionFixedDbVar', 'core', 0, 0, '1.0.2', 0, NULL),
(15, 'customToken', 'core', 0, 0, '1.0.1', 0, NULL),
(16, 'mailSenderToFrom', 'core', 0, 0, '1.0.0', 0, NULL),
(17, 'TwoFactorAdminLogin', 'core', 0, 0, '1.2.5', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_plugin_settings`
--

CREATE TABLE `survey_plugin_settings` (
  `id` int NOT NULL,
  `plugin_id` int NOT NULL,
  `model` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` int DEFAULT NULL,
  `key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_plugin_settings`
--

INSERT INTO `survey_plugin_settings` (`id`, `plugin_id`, `model`, `model_id`, `key`, `value`) VALUES
(1, 1, NULL, NULL, 'next_extension_update_check', '\"2022-02-19 06:04:32\"');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `qid` int NOT NULL,
  `parent_qid` int NOT NULL DEFAULT '0',
  `sid` int NOT NULL DEFAULT '0',
  `gid` int NOT NULL DEFAULT '0',
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'T',
  `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `preg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `other` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `mandatory` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encrypted` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `question_order` int NOT NULL,
  `scale_id` int NOT NULL DEFAULT '0',
  `same_default` int NOT NULL DEFAULT '0',
  `relevance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `question_theme_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modulename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`qid`, `parent_qid`, `sid`, `gid`, `type`, `title`, `preg`, `other`, `mandatory`, `encrypted`, `question_order`, `scale_id`, `same_default`, `relevance`, `question_theme_name`, `modulename`) VALUES
(1, 0, 145616, 1, 'T', 'Q00', NULL, 'N', 'N', 'N', 1, 0, 0, '1', 'longfreetext', NULL),
(2, 0, 492846, 2, 'T', 'Q00', NULL, 'N', 'N', 'N', 1, 0, 0, '1', 'longfreetext', NULL),
(3, 0, 492846, 2, 'T', 'G01Q02', '', 'N', 'N', 'N', 2, 0, 0, '1', 'longfreetext', ''),
(4, 0, 492846, 2, 'G', 'G01Q03', NULL, 'N', 'N', 'N', 3, 0, 0, '1', 'gender', '');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question_attributes`
--

CREATE TABLE `survey_question_attributes` (
  `qaid` int NOT NULL,
  `qid` int NOT NULL DEFAULT '0',
  `attribute` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_question_attributes`
--

INSERT INTO `survey_question_attributes` (`qaid`, `qid`, `attribute`, `value`, `language`) VALUES
(1, 3, 'random_group', '', ''),
(2, 3, 'em_validation_q', '', ''),
(3, 3, 'em_validation_q_tip', '', 'en'),
(4, 3, 'hide_tip', '0', ''),
(5, 3, 'text_input_width', '', ''),
(6, 3, 'input_size', '', ''),
(7, 3, 'display_rows', '', ''),
(8, 3, 'hidden', '0', ''),
(9, 3, 'cssclass', '', ''),
(10, 3, 'maximum_chars', '', ''),
(11, 3, 'page_break', '0', ''),
(12, 3, 'time_limit', '', ''),
(13, 3, 'time_limit_action', '1', ''),
(14, 3, 'time_limit_disable_next', '0', ''),
(15, 3, 'time_limit_disable_prev', '0', ''),
(16, 3, 'time_limit_countdown_message', '', 'en'),
(17, 3, 'time_limit_timer_style', '', ''),
(18, 3, 'time_limit_message_delay', '', ''),
(19, 3, 'time_limit_message', '', 'en'),
(20, 3, 'time_limit_message_style', '', ''),
(21, 3, 'time_limit_warning', '', ''),
(22, 3, 'time_limit_warning_display_time', '', ''),
(23, 3, 'time_limit_warning_message', '', 'en'),
(24, 3, 'time_limit_warning_style', '', ''),
(25, 3, 'time_limit_warning_2', '', ''),
(26, 3, 'time_limit_warning_2_display_time', '', ''),
(27, 3, 'time_limit_warning_2_message', '', 'en'),
(28, 3, 'time_limit_warning_2_style', '', ''),
(29, 3, 'statistics_showgraph', '1', ''),
(30, 3, 'statistics_graphtype', '0', ''),
(31, 3, 'save_as_default', 'Y', ''),
(32, 4, 'random_group', '', ''),
(33, 4, 'display_type', '0', ''),
(34, 4, 'hide_tip', '0', ''),
(35, 4, 'hidden', '0', ''),
(36, 4, 'cssclass', '', ''),
(37, 4, 'printable_help', '', 'en'),
(38, 4, 'page_break', '0', ''),
(39, 4, 'scale_export', '0', ''),
(40, 4, 'public_statistics', '0', ''),
(41, 4, 'statistics_showgraph', '1', ''),
(42, 4, 'statistics_graphtype', '0', ''),
(43, 4, 'save_as_default', 'N', ''),
(44, 4, 'clear_default', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question_l10ns`
--

CREATE TABLE `survey_question_l10ns` (
  `id` int NOT NULL,
  `qid` int NOT NULL,
  `question` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `help` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `script` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `language` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_question_l10ns`
--

INSERT INTO `survey_question_l10ns` (`id`, `qid`, `question`, `help`, `script`, `language`) VALUES
(1, 1, 'A first example question. Please answer this question:', 'This is a question help text.', NULL, 'en'),
(2, 2, 'A first example question. Please answer this question:', 'This is a question help text.', NULL, 'en'),
(3, 3, 'What do you feel about BJP winning UP Elections', '', '', 'en'),
(4, 4, 'Select Gender', '', '', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question_themes`
--

CREATE TABLE `survey_question_themes` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xml_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `author` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `license` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `version` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_version` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_update` datetime DEFAULT NULL,
  `owner_id` int DEFAULT NULL,
  `theme_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_type` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_theme` tinyint(1) DEFAULT NULL,
  `extends` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_question_themes`
--

INSERT INTO `survey_question_themes` (`id`, `name`, `visible`, `xml_path`, `image_path`, `title`, `creation_date`, `author`, `author_email`, `author_url`, `copyright`, `license`, `version`, `api_version`, `description`, `last_update`, `owner_id`, `theme_type`, `question_type`, `core_theme`, `extends`, `group`, `settings`) VALUES
(1, '5pointchoice', 'Y', 'application/views/survey/questions/answer/5pointchoice', '/assets/images/screenshots/5.png', '5 point choice', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', '5 point choice question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', '5', 1, '', 'Single choice questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"choice-5-pt-radio\"}'),
(2, 'arrays/10point', 'Y', 'application/views/survey/questions/answer/arrays/10point', '/assets/images/screenshots/B.png', 'Array (10 point choice)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array (10 point choice) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'B', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-10-pt\"}'),
(3, 'arrays/5point', 'Y', 'application/views/survey/questions/answer/arrays/5point', '/assets/images/screenshots/A.png', 'Array (5 point choice)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array (5 point choice) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'A', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-5-pt\"}'),
(4, 'arrays/array', 'Y', 'application/views/survey/questions/answer/arrays/array', '/assets/images/screenshots/F.png', 'Array', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'F', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-flexible-row\"}'),
(5, 'arrays/column', 'Y', 'application/views/survey/questions/answer/arrays/column', '/assets/images/screenshots/H.png', 'Array by column', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array by column question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'H', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-flexible-column\"}'),
(6, 'arrays/dualscale', 'Y', 'application/views/survey/questions/answer/arrays/dualscale', '/assets/images/screenshots/1.png', 'Array dual scale', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array dual scale question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', '1', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"2\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-flexible-dual-scale\"}'),
(7, 'arrays/increasesamedecrease', 'Y', 'application/views/survey/questions/answer/arrays/increasesamedecrease', '/assets/images/screenshots/E.png', 'Array (Increase/Same/Decrease)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array (Increase/Same/Decrease) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'E', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-increase-same-decrease\"}'),
(8, 'arrays/multiflexi', 'Y', 'application/views/survey/questions/answer/arrays/multiflexi', '/assets/images/screenshots/COLON.png', 'Array (Numbers)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array (Numbers) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', ':', 1, '', 'Arrays', '{\"subquestions\":\"2\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-multi-flexi\"}'),
(9, 'arrays/texts', 'Y', 'application/views/survey/questions/answer/arrays/texts', '/assets/images/screenshots/;.png', 'Array (Texts)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array (Texts) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', ';', 1, '', 'Arrays', '{\"subquestions\":\"2\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"array-multi-flexi-text\"}'),
(10, 'arrays/yesnouncertain', 'Y', 'application/views/survey/questions/answer/arrays/yesnouncertain', '/assets/images/screenshots/C.png', 'Array (Yes/No/Uncertain)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Array (Yes/No/Uncertain) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'C', 1, '', 'Arrays', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"array-yes-uncertain-no\"}'),
(11, 'boilerplate', 'Y', 'application/views/survey/questions/answer/boilerplate', '/assets/images/screenshots/X.png', 'Text display', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Text display question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'X', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"boilerplate\"}'),
(12, 'date', 'Y', 'application/views/survey/questions/answer/date', '/assets/images/screenshots/D.png', 'Date/Time', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Date/Time question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'D', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"date\"}'),
(13, 'equation', 'Y', 'application/views/survey/questions/answer/equation', '/assets/images/screenshots/EQUATION.png', 'Equation', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Equation question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', '*', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"equation\"}'),
(14, 'file_upload', 'Y', 'application/views/survey/questions/answer/file_upload', '/assets/images/screenshots/PIPE.png', 'File upload', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'File upload question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', '|', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"upload-files\"}'),
(15, 'gender', 'Y', 'application/views/survey/questions/answer/gender', '/assets/images/screenshots/G.png', 'Gender', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Gender question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'G', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"gender\"}'),
(16, 'hugefreetext', 'Y', 'application/views/survey/questions/answer/hugefreetext', '/assets/images/screenshots/U.png', 'Huge free text', '1970-01-01 01:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Huge free text question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'U', 1, '', 'Text questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"text-huge\"}'),
(17, 'language', 'Y', 'application/views/survey/questions/answer/language', '/assets/images/screenshots/I.png', 'Language switch', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Language switch question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'I', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"0\",\"assessable\":\"0\",\"class\":\"language\"}'),
(18, 'listradio', 'Y', 'application/views/survey/questions/answer/listradio', '/assets/images/screenshots/L.png', 'List (Radio)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'List (radio) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'L', 1, '', 'Single choice questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"list-radio\"}'),
(19, 'list_dropdown', 'Y', 'application/views/survey/questions/answer/list_dropdown', '/assets/images/screenshots/!.png', 'List (Dropdown)', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'List (dropdown) question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', '!', 1, '', 'Single choice questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"list-dropdown\"}'),
(20, 'list_with_comment', 'Y', 'application/views/survey/questions/answer/list_with_comment', '/assets/images/screenshots/O.png', 'List with comment', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'List with comment question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'O', 1, '', 'Single choice questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"list-with-comment\"}'),
(21, 'longfreetext', 'Y', 'application/views/survey/questions/answer/longfreetext', '/assets/images/screenshots/T.png', 'Long free text', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Long free text question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'T', 1, '', 'Text questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"text-long\"}'),
(22, 'multiplechoice', 'Y', 'application/views/survey/questions/answer/multiplechoice', '/assets/images/screenshots/M.png', 'Multiple choice', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Multiple choice question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'M', 1, '', 'Multiple choice questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"multiple-opt\"}'),
(23, 'multiplechoice_with_comments', 'Y', 'application/views/survey/questions/answer/multiplechoice_with_comments', '/assets/images/screenshots/P.png', 'Multiple choice with comments', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Multiple choice with comments question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'P', 1, '', 'Multiple choice questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"multiple-opt-comments\"}'),
(24, 'multiplenumeric', 'Y', 'application/views/survey/questions/answer/multiplenumeric', '/assets/images/screenshots/K.png', 'Multiple numerical input', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Multiple numerical input question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'K', 1, '', 'Mask questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"numeric-multi\"}'),
(25, 'multipleshorttext', 'Y', 'application/views/survey/questions/answer/multipleshorttext', '/assets/images/screenshots/Q.png', 'Multiple short text', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Multiple short text question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'Q', 1, '', 'Text questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"multiple-short-txt\"}'),
(26, 'numerical', 'Y', 'application/views/survey/questions/answer/numerical', '/assets/images/screenshots/N.png', 'Numerical input', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Numerical input question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'N', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"numeric\"}'),
(27, 'ranking', 'Y', 'application/views/survey/questions/answer/ranking', '/assets/images/screenshots/R.png', 'Ranking', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Ranking question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'R', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"ranking\"}'),
(28, 'shortfreetext', 'Y', 'application/views/survey/questions/answer/shortfreetext', '/assets/images/screenshots/S.png', 'Short free text', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Short free text question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'S', 1, '', 'Text questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"text-short\"}'),
(29, 'yesno', 'Y', 'application/views/survey/questions/answer/yesno', '/assets/images/screenshots/Y.png', 'Yes/No', '2018-09-08 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Yes/No question type configuration', '2019-09-23 15:05:59', 1, 'question_theme', 'Y', 1, '', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"yes-no\"}'),
(30, 'bootstrap_buttons', 'Y', 'themes/question/bootstrap_buttons/survey/questions/answer/listradio', '/themes/question/bootstrap_buttons/survey/questions/answer/listradio/assets/bootstrap_buttons_listradio.png', 'Bootstrap buttons', '1970-01-01 01:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'New implementation of the Bootstrap buttons question theme', '2019-09-23 15:05:59', 1, 'question_theme', 'L', 1, 'L', 'Single choice questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"list-radio\"}'),
(31, 'bootstrap_buttons_multi', 'Y', 'themes/question/bootstrap_buttons/survey/questions/answer/multiplechoice', '/themes/question/bootstrap_buttons/survey/questions/answer/multiplechoice/assets/bootstrap_buttons_multiplechoice.png', 'Bootstrap buttons', '1970-01-01 01:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2018 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'New implementation of the Bootstrap buttons question theme', '2019-09-23 15:05:59', 1, 'question_theme', 'M', 1, 'M', 'Multiple choice questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"multiple-opt\"}'),
(32, 'browserdetect', 'Y', 'themes/question/browserdetect/survey/questions/answer/shortfreetext', '/assets/images/screenshots/S.png', 'Browser detection', '2017-07-09 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2017 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Browser, Platform and Proxy detection', '2019-09-23 15:05:59', 1, 'question_theme', 'S', 1, 'S', 'Text questions', '{\"subquestions\":\"0\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"text-short\"}'),
(33, 'image_select-listradio', 'Y', 'themes/question/image_select/survey/questions/answer/listradio', '/assets/images/screenshots/L.png', 'Image select list (Radio)', '1970-01-01 01:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2016 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'List Radio with images.', '2019-09-23 15:05:59', 1, 'question_theme', 'L', 1, 'L', 'Single choice questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"list-radio\"}'),
(34, 'image_select-multiplechoice', 'Y', 'themes/question/image_select/survey/questions/answer/multiplechoice', '/assets/images/screenshots/M.png', 'Image select multiple choice', '1970-01-01 01:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2016 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Multiplechoice with images.', '2019-09-23 15:05:59', 1, 'question_theme', 'M', 1, 'M', 'Multiple choice questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"1\",\"class\":\"multiple-opt\"}'),
(35, 'inputondemand', 'Y', 'themes/question/inputondemand/survey/questions/answer/multipleshorttext', '/assets/images/screenshots/Q.png', 'Input on demand', '2019-10-04 00:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2019 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'Hide not needed input fields in multiple shorttext', '2019-09-23 15:05:59', 1, 'question_theme', 'Q', 1, 'Q', 'Text questions', '{\"subquestions\":\"1\",\"answerscales\":\"0\",\"hasdefaultvalues\":\"1\",\"assessable\":\"0\",\"class\":\"multiple-short-txt\"}'),
(36, 'ranking_advanced', 'Y', 'themes/question/ranking_advanced/survey/questions/answer/ranking', '/assets/images/screenshots/R.png', 'Ranking advanced', '1970-01-01 01:00:00', 'LimeSurvey GmbH', 'info@limesurvey.org', 'http://www.limesurvey.org', 'Copyright (C) 2005 - 2017 LimeSurvey Gmbh, Inc. All rights reserved.', 'GNU General Public License version 2 or later', '1.0', '1', 'New implementation of the ranking question', '2019-09-23 15:05:59', 1, 'question_theme', 'R', 1, 'R', 'Mask questions', '{\"subquestions\":\"0\",\"answerscales\":\"1\",\"hasdefaultvalues\":\"0\",\"assessable\":\"1\",\"class\":\"ranking\"}');

-- --------------------------------------------------------

--
-- Table structure for table `survey_quota`
--

CREATE TABLE `survey_quota` (
  `id` int NOT NULL,
  `sid` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qlimit` int DEFAULT NULL,
  `action` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `autoload_url` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_quota_languagesettings`
--

CREATE TABLE `survey_quota_languagesettings` (
  `quotals_id` int NOT NULL,
  `quotals_quota_id` int NOT NULL DEFAULT '0',
  `quotals_language` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `quotals_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotals_message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotals_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotals_urldescrip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_quota_members`
--

CREATE TABLE `survey_quota_members` (
  `id` int NOT NULL,
  `sid` int DEFAULT NULL,
  `qid` int DEFAULT NULL,
  `quota_id` int DEFAULT NULL,
  `code` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_saved_control`
--

CREATE TABLE `survey_saved_control` (
  `scid` int NOT NULL,
  `sid` int NOT NULL DEFAULT '0',
  `srid` int NOT NULL DEFAULT '0',
  `identifier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `saved_thisstep` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `saved_date` datetime NOT NULL,
  `refurl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_sessions`
--

CREATE TABLE `survey_sessions` (
  `id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` int DEFAULT NULL,
  `data` longblob
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_settings_global`
--

CREATE TABLE `survey_settings_global` (
  `stg_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `stg_value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_settings_global`
--

INSERT INTO `survey_settings_global` (`stg_name`, `stg_value`) VALUES
('sendadmincreationemail', '1'),
('admincreationemailsubject', 'User registration at \'{SITENAME}\''),
('admincreationemailtemplate', '<p>Hello {FULLNAME}, </p><p>This is an automated email notification that a user has been created for you on the website <strong>\'{SITENAME}\'</strong>.</p><p></p><p>You can use now the following credentials to log in:</p><p><strong>Username</strong>: {USERNAME}</p><p><a href=\"{LOGINURL}\">Click here to set your password</a></p><p>If you have any questions regarding this email, please do not hesitate to contact the site administrator at {SITEADMINEMAIL}.</p><p> </p><p>Thank you!</p>'),
('DBVersion', '479'),
('SessionName', 'XVOTINDBWWCFIISLWLCPBTQPUSCJCFRABSYYFJKVIPRAWCAIUBQWWRHUHENPOLSM'),
('sitename', 'Survey'),
('siteadminname', 'Administrator'),
('siteadminemail', 'admin@codeni.in'),
('siteadminbounce', 'admin@codeni.in'),
('defaultlang', 'en'),
('AssetsVersion', '30259'),
('last_survey_1', '492846');

-- --------------------------------------------------------

--
-- Table structure for table `survey_settings_user`
--

CREATE TABLE `survey_settings_user` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `entity` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stg_name` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stg_value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_settings_user`
--

INSERT INTO `survey_settings_user` (`id`, `uid`, `entity`, `entity_id`, `stg_name`, `stg_value`) VALUES
(1, 1, NULL, NULL, 'question_default_values_T', '{ \"logic\":{ \"random_group\":\"\",\"em_validation_q\":\"\",\"em_validation_q_tip\":{ \"en\":\"\" } },\"display\":{ \"hide_tip\":\"0\",\"text_input_width\":\"\",\"input_size\":\"\",\"display_rows\":\"\",\"hidden\":\"0\",\"cssclass\":\"\" },\"input\":{ \"maximum_chars\":\"\" },\"other\":{ \"page_break\":\"0\" },\"timer\":{ \"time_limit\":\"\",\"time_limit_action\":\"1\",\"time_limit_disable_next\":\"0\",\"time_limit_disable_prev\":\"0\",\"time_limit_countdown_message\":{ \"en\":\"\" },\"time_limit_timer_style\":\"\",\"time_limit_message_delay\":\"\",\"time_limit_message\":{ \"en\":\"\" },\"time_limit_message_style\":\"\",\"time_limit_warning\":\"\",\"time_limit_warning_display_time\":\"\",\"time_limit_warning_message\":{ \"en\":\"\" },\"time_limit_warning_style\":\"\",\"time_limit_warning_2\":\"\",\"time_limit_warning_2_display_time\":\"\",\"time_limit_warning_2_message\":{ \"en\":\"\" },\"time_limit_warning_2_style\":\"\" },\"statistics\":{ \"statistics_showgraph\":\"1\",\"statistics_graphtype\":\"0\" } }'),
(2, 1, NULL, NULL, 'question_default_values_G', '{ \"logic\":{ \"random_group\":\"\" },\"display\":{ \"display_type\":\"0\",\"hide_tip\":\"0\",\"hidden\":\"0\",\"cssclass\":\"\",\"printable_help\":{ \"en\":\"\" } },\"other\":{ \"page_break\":\"0\",\"scale_export\":\"0\" },\"statistics\":{ \"public_statistics\":\"0\",\"statistics_showgraph\":\"1\",\"statistics_graphtype\":\"0\" } }'),
(3, 1, NULL, NULL, 'quickaction_state', '1');

-- --------------------------------------------------------

--
-- Table structure for table `survey_surveymenu`
--

CREATE TABLE `survey_surveymenu` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `survey_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int DEFAULT '0',
  `level` int DEFAULT '0',
  `title` varchar(168) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `position` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'side',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `showincollapse` int DEFAULT '0',
  `active` int NOT NULL DEFAULT '0',
  `changed_at` datetime DEFAULT NULL,
  `changed_by` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_surveymenu`
--

INSERT INTO `survey_surveymenu` (`id`, `parent_id`, `survey_id`, `user_id`, `name`, `ordering`, `level`, `title`, `position`, `description`, `showincollapse`, `active`, `changed_at`, `changed_by`, `created_at`, `created_by`) VALUES
(1, NULL, NULL, NULL, 'settings', 1, 0, 'Survey settings', 'side', 'Survey settings', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(2, NULL, NULL, NULL, 'mainmenu', 2, 0, 'Survey menu', 'side', 'Main survey menu', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(3, NULL, NULL, NULL, 'quickmenu', 3, 0, 'Quick menu', 'collapsed', 'Quick menu', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey_surveymenu_entries`
--

CREATE TABLE `survey_surveymenu_entries` (
  `id` int NOT NULL,
  `menu_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `ordering` int DEFAULT '0',
  `name` varchar(168) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `title` varchar(168) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_title` varchar(168) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `menu_icon` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_icon_type` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_class` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_link` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `template` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `partial` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `classes` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `permission` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `permission_grade` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `getdatamethod` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `language` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-GB',
  `showincollapse` int DEFAULT '0',
  `active` int NOT NULL DEFAULT '0',
  `changed_at` datetime DEFAULT NULL,
  `changed_by` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_surveymenu_entries`
--

INSERT INTO `survey_surveymenu_entries` (`id`, `menu_id`, `user_id`, `ordering`, `name`, `title`, `menu_title`, `menu_description`, `menu_icon`, `menu_icon_type`, `menu_class`, `menu_link`, `action`, `template`, `partial`, `classes`, `permission`, `permission_grade`, `data`, `getdatamethod`, `language`, `showincollapse`, `active`, `changed_at`, `changed_by`, `created_at`, `created_by`) VALUES
(1, 1, NULL, 1, 'overview', 'Survey overview', 'Overview', 'Open the general survey overview', 'list', 'fontawesome', '', 'surveyAdministration/view', '', '', '', '', '', '', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(2, 1, NULL, 2, 'generalsettings', 'General survey settings', 'General settings', 'Open general survey settings', 'gears', 'fontawesome', '', '', 'updatesurveylocalesettings_generalsettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_generaloptions_panel', '', 'surveysettings', 'read', NULL, 'generalTabEditSurvey', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(3, 1, NULL, 3, 'surveytexts', 'Survey text elements', 'Text elements', 'Survey text elements', 'file-text-o', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/tab_edit_view', '', 'surveylocale', 'read', NULL, 'getTextEditData', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(4, 1, NULL, 4, 'datasecurity', 'Data policy settings', 'Data policy settings', 'Edit data policy settings', 'shield', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/tab_edit_view_datasecurity', '', 'surveylocale', 'read', NULL, 'getDataSecurityEditData', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(5, 1, NULL, 5, 'theme_options', 'Theme options', 'Theme options', 'Edit theme options for this survey', 'paint-brush', 'fontawesome', '', 'themeOptions/updateSurvey', '', '', '', '', 'surveysettings', 'update', '{\"render\": {\"link\": { \"pjaxed\": true, \"data\": {\"surveyid\": [\"survey\",\"sid\"], \"gsid\":[\"survey\",\"gsid\"]}}}}', '', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(6, 1, NULL, 6, 'presentation', 'Presentation & navigation settings', 'Presentation', 'Edit presentation and navigation settings', 'eye-slash', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_presentation_panel', '', 'surveylocale', 'read', NULL, 'tabPresentationNavigation', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(7, 1, NULL, 7, 'tokens', 'Survey participant settings', 'Participant settings', 'Set additional options for survey participants', 'users', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_tokens_panel', '', 'surveylocale', 'read', NULL, 'tabTokens', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(8, 1, NULL, 8, 'notification', 'Notification and data management settings', 'Notifications & data', 'Edit settings for notification and data management', 'feed', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_notification_panel', '', 'surveylocale', 'read', NULL, 'tabNotificationDataManagement', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(9, 1, NULL, 9, 'publication', 'Publication & access control settings', 'Publication & access', 'Edit settings for publication and access control', 'key', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_publication_panel', '', 'surveylocale', 'read', NULL, 'tabPublicationAccess', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(10, 1, NULL, 10, 'surveypermissions', 'Edit survey permissions', 'Survey permissions', 'Edit permissions for this survey', 'lock', 'fontawesome', '', 'admin/surveypermission/sa/view/', '', '', '', '', 'surveysecurity', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(11, 2, NULL, 1, 'listQuestions', 'Question list', 'Question list', 'List questions', 'list', 'fontawesome', '', 'questionAdministration/listQuestions', '', '', '', '', 'surveycontent', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(12, 2, NULL, 2, 'listQuestionGroups', 'Group list', 'Group list', 'List question groups', 'th-list', 'fontawesome', '', 'questionGroupsAdministration/listquestiongroups', '', '', '', '', 'surveycontent', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(13, 2, NULL, 3, 'reorder', 'Reorder questions & groups', 'Reorder questions & groups', 'Reorder questions & groups', 'icon-organize', 'iconclass', '', 'surveyAdministration/organize/', '', '', '', '', 'surveycontent', 'update', '{\"render\": {\"isActive\": false, \"link\": {\"data\": {\"surveyid\": [\"survey\", \"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(14, 2, NULL, 4, 'participants', 'Survey participants', 'Survey participants', 'Go to survey participant and token settings', 'user', 'fontawesome', '', 'admin/tokens/sa/index/', '', '', '', '', 'surveysettings', 'update', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(15, 2, NULL, 5, 'emailtemplates', 'Email templates', 'Email templates', 'Edit the templates for invitation, reminder and registration emails', 'envelope-square', 'fontawesome', '', 'admin/emailtemplates/sa/index/', '', '', '', '', 'surveylocale', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(16, 2, NULL, 6, 'quotas', 'Edit quotas', 'Quotas', 'Edit quotas for this survey.', 'tasks', 'fontawesome', '', 'admin/quotas/sa/index/', '', '', '', '', 'quotas', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(17, 2, NULL, 7, 'assessments', 'Edit assessments', 'Assessments', 'Edit and look at the assessements for this survey.', 'comment-o', 'fontawesome', '', 'assessment/index', '', '', '', '', 'assessments', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(18, 2, NULL, 8, 'panelintegration', 'Edit survey panel integration', 'Panel integration', 'Define panel integrations for your survey', 'link', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_integration_panel', '', 'surveylocale', 'read', '{\"render\": {\"link\": { \"pjaxed\": false}}}', 'tabPanelIntegration', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(19, 2, NULL, 9, 'responses', 'Responses', 'Responses', 'Responses', 'icon-browse', 'iconclass', '', 'responses/browse/', '', '', '', '', 'responses', 'read', '{\"render\": {\"isActive\": true, \"link\": {\"data\": {\"surveyId\": [\"survey\", \"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(20, 2, NULL, 10, 'statistics', 'Statistics', 'Statistics', 'Statistics', 'bar-chart', 'fontawesome', '', 'admin/statistics/sa/index/', '', '', '', '', 'statistics', 'read', '{\"render\": {\"isActive\": true, \"link\": {\"data\": {\"surveyid\": [\"survey\", \"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(21, 2, NULL, 11, 'resources', 'Add/edit resources (files/images) for this survey', 'Resources', 'Add/edit resources (files/images) for this survey', 'file', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_resources_panel', '', 'surveylocale', 'read', '{\"render\": { \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', 'tabResourceManagement', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(22, 2, NULL, 12, 'plugins', 'Simple plugin settings', 'Simple plugins', 'Edit simple plugin settings', 'plug', 'fontawesome', '', '', 'updatesurveylocalesettings', 'editLocalSettings_main_view', '/admin/survey/subview/accordion/_plugins_panel', '', 'surveysettings', 'read', '{\"render\": {\"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', 'pluginTabSurvey', 'en-GB', 0, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(23, 3, NULL, 1, 'activateSurvey', 'Activate survey', 'Activate survey', 'Activate survey', 'play', 'fontawesome', '', 'surveyAdministration/activate', '', '', '', '', 'surveyactivation', 'update', '{\"render\": {\"isActive\": false, \"link\": {\"data\": {\"iSurveyID\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(24, 3, NULL, 2, 'deactivateSurvey', 'Stop this survey', 'Stop this survey', 'Stop this survey', 'stop', 'fontawesome', '', 'surveyAdministration/deactivate', '', '', '', '', 'surveyactivation', 'update', '{\"render\": {\"isActive\": true, \"link\": {\"data\": {\"surveyid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(25, 3, NULL, 3, 'testSurvey', 'Go to survey', 'Go to survey', 'Go to survey', 'cog', 'fontawesome', '', 'survey/index/', '', '', '', '', '', '', '{\"render\": {\"link\": {\"external\": true, \"data\": {\"sid\": [\"survey\",\"sid\"], \"newtest\": \"Y\", \"lang\": [\"survey\",\"language\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(26, 3, NULL, 4, 'surveyLogicFile', 'Survey logic file', 'Survey logic file', 'Survey logic file', 'sitemap', 'fontawesome', '', 'admin/expressions/sa/survey_logic_file/', '', '', '', '', 'surveycontent', 'read', '{\"render\": { \"link\": {\"data\": {\"sid\": [\"survey\",\"sid\"]}}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0),
(27, 3, NULL, 5, 'cpdb', 'Central participant database', 'Central participant database', 'Central participant database', 'users', 'fontawesome', '', 'admin/participants/sa/displayParticipants', '', '', '', '', 'tokens', 'read', '{\"render\": {\"link\": {}}}', '', 'en-GB', 1, 1, '2022-02-15 12:38:34', 0, '2022-02-15 12:38:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey_surveys`
--

CREATE TABLE `survey_surveys` (
  `sid` int NOT NULL,
  `owner_id` int NOT NULL,
  `gsid` int DEFAULT '1',
  `admin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `expires` datetime DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `adminemail` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anonymized` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `faxto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `savetimings` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `template` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `language` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_languages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `datestamp` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `usecookie` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `allowregister` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `allowsave` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `autonumber_start` int NOT NULL DEFAULT '0',
  `autoredirect` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `allowprev` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `printanswers` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `ipaddr` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `ipanonymize` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `refurl` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `datecreated` datetime DEFAULT NULL,
  `showsurveypolicynotice` int DEFAULT '0',
  `publicstatistics` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `publicgraphs` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `listpublic` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `htmlemail` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `sendconfirmation` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `tokenanswerspersistence` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `assessments` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `usecaptcha` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `usetokens` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `bounce_email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributedescriptions` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emailresponseto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emailnotificationto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tokenlength` int NOT NULL DEFAULT '15',
  `showxquestions` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `showgroupinfo` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'B',
  `shownoanswer` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `showqnumcode` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'X',
  `bouncetime` int DEFAULT NULL,
  `bounceprocessing` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `bounceaccounttype` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bounceaccounthost` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bounceaccountpass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bounceaccountencryption` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bounceaccountuser` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showwelcome` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `showprogress` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `questionindex` int NOT NULL DEFAULT '0',
  `navigationdelay` int NOT NULL DEFAULT '0',
  `nokeyboard` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `alloweditaftercompletion` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `googleanalyticsstyle` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleanalyticsapikey` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tokenencryptionoptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_surveys`
--

INSERT INTO `survey_surveys` (`sid`, `owner_id`, `gsid`, `admin`, `active`, `expires`, `startdate`, `adminemail`, `anonymized`, `faxto`, `format`, `savetimings`, `template`, `language`, `additional_languages`, `datestamp`, `usecookie`, `allowregister`, `allowsave`, `autonumber_start`, `autoredirect`, `allowprev`, `printanswers`, `ipaddr`, `ipanonymize`, `refurl`, `datecreated`, `showsurveypolicynotice`, `publicstatistics`, `publicgraphs`, `listpublic`, `htmlemail`, `sendconfirmation`, `tokenanswerspersistence`, `assessments`, `usecaptcha`, `usetokens`, `bounce_email`, `attributedescriptions`, `emailresponseto`, `emailnotificationto`, `tokenlength`, `showxquestions`, `showgroupinfo`, `shownoanswer`, `showqnumcode`, `bouncetime`, `bounceprocessing`, `bounceaccounttype`, `bounceaccounthost`, `bounceaccountpass`, `bounceaccountencryption`, `bounceaccountuser`, `showwelcome`, `showprogress`, `questionindex`, `navigationdelay`, `nokeyboard`, `alloweditaftercompletion`, `googleanalyticsstyle`, `googleanalyticsapikey`, `tokenencryptionoptions`) VALUES
(145616, 1, 1, 'inherit', 'N', NULL, NULL, 'inherit', 'N', NULL, 'I', 'I', 'inherit', 'en', '', 'I', 'I', 'I', 'I', 0, 'I', 'I', 'I', 'I', 'I', 'I', '2022-02-16 15:02:49', 0, 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'E', 'N', 'inherit', NULL, 'inherit', 'inherit', -1, 'I', 'I', 'I', 'I', NULL, 'N', NULL, NULL, NULL, NULL, NULL, 'I', 'I', -1, -1, 'I', 'I', NULL, NULL, ''),
(492846, 1, 1, 'inherit', 'N', NULL, NULL, 'inherit', 'N', NULL, 'I', 'I', 'inherit', 'en', '', 'I', 'I', 'I', 'I', 0, 'I', 'I', 'I', 'I', 'I', 'I', '2022-02-18 06:02:17', 0, 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'E', 'N', 'inherit', NULL, 'inherit', 'inherit', -1, 'I', 'I', 'I', 'I', NULL, 'N', NULL, NULL, NULL, NULL, NULL, 'I', 'I', -1, -1, 'I', 'I', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `survey_surveys_groups`
--

CREATE TABLE `survey_surveys_groups` (
  `gsid` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sortorder` int NOT NULL,
  `owner_id` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `alwaysavailable` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_surveys_groups`
--

INSERT INTO `survey_surveys_groups` (`gsid`, `name`, `title`, `template`, `description`, `sortorder`, `owner_id`, `parent_id`, `alwaysavailable`, `created`, `modified`, `created_by`) VALUES
(1, 'default', 'Default', NULL, 'Default survey group', 0, 1, NULL, NULL, '2022-02-15 12:38:34', '2022-02-15 12:38:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_surveys_groupsettings`
--

CREATE TABLE `survey_surveys_groupsettings` (
  `gsid` int NOT NULL,
  `owner_id` int DEFAULT NULL,
  `admin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminemail` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anonymized` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `format` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `savetimings` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `template` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `datestamp` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `usecookie` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `allowregister` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `allowsave` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `autonumber_start` int DEFAULT '0',
  `autoredirect` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `allowprev` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `printanswers` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `ipaddr` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `ipanonymize` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `refurl` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `showsurveypolicynotice` int DEFAULT '0',
  `publicstatistics` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `publicgraphs` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `listpublic` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `htmlemail` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `sendconfirmation` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `tokenanswerspersistence` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `assessments` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `usecaptcha` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `bounce_email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributedescriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emailresponseto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emailnotificationto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tokenlength` int DEFAULT '15',
  `showxquestions` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `showgroupinfo` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'B',
  `shownoanswer` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `showqnumcode` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'X',
  `showwelcome` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `showprogress` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Y',
  `questionindex` int DEFAULT '0',
  `navigationdelay` int DEFAULT '0',
  `nokeyboard` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `alloweditaftercompletion` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_surveys_groupsettings`
--

INSERT INTO `survey_surveys_groupsettings` (`gsid`, `owner_id`, `admin`, `adminemail`, `anonymized`, `format`, `savetimings`, `template`, `datestamp`, `usecookie`, `allowregister`, `allowsave`, `autonumber_start`, `autoredirect`, `allowprev`, `printanswers`, `ipaddr`, `ipanonymize`, `refurl`, `showsurveypolicynotice`, `publicstatistics`, `publicgraphs`, `listpublic`, `htmlemail`, `sendconfirmation`, `tokenanswerspersistence`, `assessments`, `usecaptcha`, `bounce_email`, `attributedescriptions`, `emailresponseto`, `emailnotificationto`, `tokenlength`, `showxquestions`, `showgroupinfo`, `shownoanswer`, `showqnumcode`, `showwelcome`, `showprogress`, `questionindex`, `navigationdelay`, `nokeyboard`, `alloweditaftercompletion`) VALUES
(0, 1, 'Administrator', 'admin@codeni.in', 'N', 'G', 'N', 'fruity', 'N', 'N', 'N', 'Y', 0, 'N', 'N', 'N', 'N', 'N', 'N', 0, 'N', 'N', 'N', 'Y', 'Y', 'N', 'N', 'N', NULL, NULL, NULL, NULL, 15, 'Y', 'B', 'Y', 'X', 'Y', 'Y', 0, 0, 'N', 'N'),
(1, -1, 'inherit', 'inherit', 'I', 'I', 'I', 'inherit', 'I', 'I', 'I', 'I', 0, 'I', 'I', 'I', 'I', 'I', 'I', 0, 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'E', 'inherit', NULL, 'inherit', 'inherit', -1, 'I', 'I', 'I', 'I', 'I', 'I', -1, -1, 'I', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `survey_surveys_languagesettings`
--

CREATE TABLE `survey_surveys_languagesettings` (
  `surveyls_survey_id` int NOT NULL,
  `surveyls_language` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `surveyls_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surveyls_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_welcometext` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_endtext` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_policy_notice` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_policy_error` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_policy_notice_label` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surveyls_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_urldescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surveyls_email_invite_subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surveyls_email_invite` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_email_remind_subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surveyls_email_remind` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_email_register_subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surveyls_email_register` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_email_confirm_subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surveyls_email_confirm` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_dateformat` int NOT NULL DEFAULT '1',
  `surveyls_attributecaptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_admin_notification_subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_admin_notification` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_admin_responses_subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_admin_responses` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `surveyls_numberformat` int NOT NULL DEFAULT '0',
  `attachments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_surveys_languagesettings`
--

INSERT INTO `survey_surveys_languagesettings` (`surveyls_survey_id`, `surveyls_language`, `surveyls_title`, `surveyls_description`, `surveyls_welcometext`, `surveyls_endtext`, `surveyls_policy_notice`, `surveyls_policy_error`, `surveyls_policy_notice_label`, `surveyls_url`, `surveyls_urldescription`, `surveyls_email_invite_subj`, `surveyls_email_invite`, `surveyls_email_remind_subj`, `surveyls_email_remind`, `surveyls_email_register_subj`, `surveyls_email_register`, `surveyls_email_confirm_subj`, `surveyls_email_confirm`, `surveyls_dateformat`, `surveyls_attributecaptions`, `email_admin_notification_subj`, `email_admin_notification`, `email_admin_responses_subj`, `email_admin_responses`, `surveyls_numberformat`, `attachments`) VALUES
(145616, 'en', 'test', '', '', '', '', NULL, '', '', '', 'Invitation to participate in a survey', 'Dear {FIRSTNAME},<br />\n<br />\nyou have been invited to participate in a survey.<br />\n<br />\nThe survey is titled:<br />\n\"{SURVEYNAME}\"<br />\n<br />\n\"{SURVEYDESCRIPTION}\"<br />\n<br />\nTo participate, please click on the link below.<br />\n<br />\nSincerely,<br />\n<br />\n{ADMINNAME} ({ADMINEMAIL})<br />\n<br />\n----------------------------------------------<br />\nClick here to do the survey:<br />\n{SURVEYURL}<br />\n<br />\nIf you do not want to participate in this survey and don\'t want to receive any more invitations please click the following link:<br />\n{OPTOUTURL}<br />\n<br />\nIf you are blacklisted but want to participate in this survey and want to receive invitations please click the following link:<br />\n{OPTINURL}', 'Reminder to participate in a survey', 'Dear {FIRSTNAME},<br />\n<br />\nRecently we invited you to participate in a survey.<br />\n<br />\nWe note that you have not yet completed the survey, and wish to remind you that the survey is still available should you wish to take part.<br />\n<br />\nThe survey is titled:<br />\n\"{SURVEYNAME}\"<br />\n<br />\n\"{SURVEYDESCRIPTION}\"<br />\n<br />\nTo participate, please click on the link below.<br />\n<br />\nSincerely,<br />\n<br />\n{ADMINNAME} ({ADMINEMAIL})<br />\n<br />\n----------------------------------------------<br />\nClick here to do the survey:<br />\n{SURVEYURL}<br />\n<br />\nIf you do not want to participate in this survey and don\'t want to receive any more invitations please click the following link:<br />\n{OPTOUTURL}', 'Survey registration confirmation', 'Dear {FIRSTNAME},<br />\n<br />\nYou, or someone using your email address, have registered to participate in an online survey titled {SURVEYNAME}.<br />\n<br />\nTo complete this survey, click on the following URL:<br />\n<br />\n{SURVEYURL}<br />\n<br />\nIf you have any questions about this survey, or if you did not register to participate and believe this email is in error, please contact {ADMINNAME} at {ADMINEMAIL}.', 'Confirmation of your participation in our survey', 'Dear {FIRSTNAME},<br />\n<br />\nthis email is to confirm that you have completed the survey titled {SURVEYNAME} and your response has been saved. Thank you for participating.<br />\n<br />\nIf you have any further questions about this email, please contact {ADMINNAME} on {ADMINEMAIL}.<br />\n<br />\nSincerely,<br />\n<br />\n{ADMINNAME}', 9, NULL, 'Response submission for survey {SURVEYNAME}', 'Hello,<br />\n<br />\nA new response was submitted for your survey \'{SURVEYNAME}\'.<br />\n<br />\nClick the following link to see the individual response:<br />\n{VIEWRESPONSEURL}<br />\n<br />\nClick the following link to edit the individual response:<br />\n{EDITRESPONSEURL}<br />\n<br />\nView statistics by clicking here:<br />\n{STATISTICSURL}', 'Response submission for survey {SURVEYNAME} with results', 'Hello,<br />\n<br />\nA new response was submitted for your survey \'{SURVEYNAME}\'.<br />\n<br />\nClick the following link to see the individual response:<br />\n{VIEWRESPONSEURL}<br />\n<br />\nClick the following link to edit the individual response:<br />\n{EDITRESPONSEURL}<br />\n<br />\nView statistics by clicking here:<br />\n{STATISTICSURL}<br />\n<br />\n<br />\nThe following answers were given by the participant:<br />\n{ANSWERTABLE}', 0, NULL),
(492846, 'en', 'UP Elections', '', '', '', '', NULL, '', '', '', 'Invitation to participate in a survey', 'Dear {FIRSTNAME},<br />\n<br />\nyou have been invited to participate in a survey.<br />\n<br />\nThe survey is titled:<br />\n\"{SURVEYNAME}\"<br />\n<br />\n\"{SURVEYDESCRIPTION}\"<br />\n<br />\nTo participate, please click on the link below.<br />\n<br />\nSincerely,<br />\n<br />\n{ADMINNAME} ({ADMINEMAIL})<br />\n<br />\n----------------------------------------------<br />\nClick here to do the survey:<br />\n{SURVEYURL}<br />\n<br />\nIf you do not want to participate in this survey and don\'t want to receive any more invitations please click the following link:<br />\n{OPTOUTURL}<br />\n<br />\nIf you are blacklisted but want to participate in this survey and want to receive invitations please click the following link:<br />\n{OPTINURL}', 'Reminder to participate in a survey', 'Dear {FIRSTNAME},<br />\n<br />\nRecently we invited you to participate in a survey.<br />\n<br />\nWe note that you have not yet completed the survey, and wish to remind you that the survey is still available should you wish to take part.<br />\n<br />\nThe survey is titled:<br />\n\"{SURVEYNAME}\"<br />\n<br />\n\"{SURVEYDESCRIPTION}\"<br />\n<br />\nTo participate, please click on the link below.<br />\n<br />\nSincerely,<br />\n<br />\n{ADMINNAME} ({ADMINEMAIL})<br />\n<br />\n----------------------------------------------<br />\nClick here to do the survey:<br />\n{SURVEYURL}<br />\n<br />\nIf you do not want to participate in this survey and don\'t want to receive any more invitations please click the following link:<br />\n{OPTOUTURL}', 'Survey registration confirmation', 'Dear {FIRSTNAME},<br />\n<br />\nYou, or someone using your email address, have registered to participate in an online survey titled {SURVEYNAME}.<br />\n<br />\nTo complete this survey, click on the following URL:<br />\n<br />\n{SURVEYURL}<br />\n<br />\nIf you have any questions about this survey, or if you did not register to participate and believe this email is in error, please contact {ADMINNAME} at {ADMINEMAIL}.', 'Confirmation of your participation in our survey', 'Dear {FIRSTNAME},<br />\n<br />\nthis email is to confirm that you have completed the survey titled {SURVEYNAME} and your response has been saved. Thank you for participating.<br />\n<br />\nIf you have any further questions about this email, please contact {ADMINNAME} on {ADMINEMAIL}.<br />\n<br />\nSincerely,<br />\n<br />\n{ADMINNAME}', 9, NULL, 'Response submission for survey {SURVEYNAME}', 'Hello,<br />\n<br />\nA new response was submitted for your survey \'{SURVEYNAME}\'.<br />\n<br />\nClick the following link to see the individual response:<br />\n{VIEWRESPONSEURL}<br />\n<br />\nClick the following link to edit the individual response:<br />\n{EDITRESPONSEURL}<br />\n<br />\nView statistics by clicking here:<br />\n{STATISTICSURL}', 'Response submission for survey {SURVEYNAME} with results', 'Hello,<br />\n<br />\nA new response was submitted for your survey \'{SURVEYNAME}\'.<br />\n<br />\nClick the following link to see the individual response:<br />\n{VIEWRESPONSEURL}<br />\n<br />\nClick the following link to edit the individual response:<br />\n{EDITRESPONSEURL}<br />\n<br />\nView statistics by clicking here:<br />\n{STATISTICSURL}<br />\n<br />\n<br />\nThe following answers were given by the participant:<br />\n{ANSWERTABLE}', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_survey_links`
--

CREATE TABLE `survey_survey_links` (
  `participant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_id` int NOT NULL,
  `survey_id` int NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_invited` datetime DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_survey_url_parameters`
--

CREATE TABLE `survey_survey_url_parameters` (
  `id` int NOT NULL,
  `sid` int NOT NULL,
  `parameter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `targetqid` int DEFAULT NULL,
  `targetsqid` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_templates`
--

CREATE TABLE `survey_templates` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `author` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `license` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `version` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_version` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_folder` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `files_folder` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_update` datetime DEFAULT NULL,
  `owner_id` int DEFAULT NULL,
  `extends` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_templates`
--

INSERT INTO `survey_templates` (`id`, `name`, `folder`, `title`, `creation_date`, `author`, `author_email`, `author_url`, `copyright`, `license`, `version`, `api_version`, `view_folder`, `files_folder`, `description`, `last_update`, `owner_id`, `extends`) VALUES
(1, 'vanilla', 'vanilla', 'Vanilla Theme', '2022-02-15 12:38:35', 'LimeSurvey GmbH', 'info@limesurvey.org', 'https://www.limesurvey.org/', 'Copyright (C) 2007-2019 The LimeSurvey Project Team\\r\\nAll rights reserved.', 'License: GNU/GPL License v2 or later, see LICENSE.php\\r\\n\\r\\nLimeSurvey is free software. This version may have been modified pursuant to the GNU General Public License, and as distributed it includes or is derivative of works licensed under the GNU General Public License or other free or open source software licenses. See COPYRIGHT.php for copyright notices and details.', '3.0', '3.0', 'views', 'files', '<strong>LimeSurvey Bootstrap Vanilla Survey Theme</strong><br>A clean and simple base that can be used by developers to create their own Bootstrap based theme.', NULL, 1, ''),
(2, 'fruity', 'fruity', 'Fruity Theme', '2022-02-15 12:38:35', 'LimeSurvey GmbH', 'info@limesurvey.org', 'https://www.limesurvey.org/', 'Copyright (C) 2007-2019 The LimeSurvey Project Team\\r\\nAll rights reserved.', 'License: GNU/GPL License v2 or later, see LICENSE.php\\r\\n\\r\\nLimeSurvey is free software. This version may have been modified pursuant to the GNU General Public License, and as distributed it includes or is derivative of works licensed under the GNU General Public License or other free or open source software licenses. See COPYRIGHT.php for copyright notices and details.', '3.0', '3.0', 'views', 'files', '<strong>LimeSurvey Fruity Theme</strong><br>A fruity theme for a flexible use. This theme offers monochromes variations and many options for easy customizations.', NULL, 1, 'vanilla'),
(3, 'bootswatch', 'bootswatch', 'Bootswatch Theme', '2022-02-15 12:38:35', 'LimeSurvey GmbH', 'info@limesurvey.org', 'https://www.limesurvey.org/', 'Copyright (C) 2007-2019 The LimeSurvey Project Team\\r\\nAll rights reserved.', 'License: GNU/GPL License v2 or later, see LICENSE.php\\r\\n\\r\\nLimeSurvey is free software. This version may have been modified pursuant to the GNU General Public License, and as distributed it includes or is derivative of works licensed under the GNU General Public License or other free or open source software licenses. See COPYRIGHT.php for copyright notices and details.', '3.0', '3.0', 'views', 'files', '<strong>LimeSurvey Bootwatch Theme</strong><br>Based on BootsWatch Themes: <a href=\"https://bootswatch.com/3/\"\">Visit BootsWatch page</a> ', NULL, 1, 'vanilla');

-- --------------------------------------------------------

--
-- Table structure for table `survey_template_configuration`
--

CREATE TABLE `survey_template_configuration` (
  `id` int NOT NULL,
  `template_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` int DEFAULT NULL,
  `gsid` int DEFAULT NULL,
  `uid` int DEFAULT NULL,
  `files_css` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `files_js` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `files_print_css` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cssframework_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cssframework_css` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cssframework_js` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `packages_to_load` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `packages_ltr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `packages_rtl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_template_configuration`
--

INSERT INTO `survey_template_configuration` (`id`, `template_name`, `sid`, `gsid`, `uid`, `files_css`, `files_js`, `files_print_css`, `options`, `cssframework_name`, `cssframework_css`, `cssframework_js`, `packages_to_load`, `packages_ltr`, `packages_rtl`) VALUES
(1, 'vanilla', NULL, NULL, NULL, '{\"add\":[\"css/ajaxify.css\",\"css/theme.css\",\"css/custom.css\"]}', '{\"add\":[\"scripts/theme.js\",\"scripts/ajaxify.js\",\"scripts/custom.js\"]}', '{\"add\":[\"css/print_theme.css\"]}', '{\"ajaxmode\":\"off\",\"brandlogo\":\"on\",\"container\":\"on\", \"hideprivacyinfo\": \"off\", \"brandlogofile\":\"themes/survey/vanilla/files/logo.png\",\"font\":\"noto\", \"showpopups\":\"1\", \"showclearall\":\"off\", \"questionhelptextposition\":\"top\"}', 'bootstrap', '{}', '', '{\"add\":[\"pjax\",\"font-noto\",\"moment\"]}', NULL, NULL),
(2, 'fruity', NULL, NULL, NULL, '{\"add\":[\"css/ajaxify.css\",\"css/animate.css\",\"css/variations/sea_green.css\",\"css/theme.css\",\"css/custom.css\"]}', '{\"add\":[\"scripts/theme.js\",\"scripts/ajaxify.js\",\"scripts/custom.js\"]}', '{\"add\":[\"css/print_theme.css\"]}', '{\"ajaxmode\":\"off\",\"brandlogo\":\"on\",\"brandlogofile\":\"themes/survey/fruity/files/logo.png\",\"container\":\"on\",\"backgroundimage\":\"off\",\"backgroundimagefile\":null,\"animatebody\":\"off\",\"bodyanimation\":\"fadeInRight\",\"bodyanimationduration\":\"500\",\"animatequestion\":\"off\",\"questionanimation\":\"flipInX\",\"questionanimationduration\":\"500\",\"animatealert\":\"off\",\"alertanimation\":\"shake\",\"alertanimationduration\":\"500\",\"font\":\"noto\",\"bodybackgroundcolor\":\"#ffffff\",\"fontcolor\":\"#444444\",\"questionbackgroundcolor\":\"#ffffff\",\"questionborder\":\"on\",\"questioncontainershadow\":\"on\",\"checkicon\":\"f00c\",\"animatecheckbox\":\"on\",\"checkboxanimation\":\"rubberBand\",\"checkboxanimationduration\":\"500\",\"animateradio\":\"on\",\"radioanimation\":\"zoomIn\",\"radioanimationduration\":\"500\",\"zebrastriping\":\"off\",\"stickymatrixheaders\":\"off\",\"greyoutselected\":\"off\",\"hideprivacyinfo\":\"off\",\"crosshover\":\"off\",\"showpopups\":\"1\", \"showclearall\":\"off\", \"questionhelptextposition\":\"top\",\"notables\":\"1\"}', 'bootstrap', '{}', '', '{\"add\":[\"pjax\",\"font-noto\",\"moment\"]}', NULL, NULL),
(3, 'bootswatch', NULL, NULL, NULL, '{\"add\":[\"css/ajaxify.css\",\"css/theme.css\",\"css/custom.css\"]}', '{\"add\":[\"scripts/theme.js\",\"scripts/ajaxify.js\",\"scripts/custom.js\"]}', '{\"add\":[\"css/print_theme.css\"]}', '{\"ajaxmode\":\"off\",\"brandlogo\":\"on\",\"container\":\"on\",\"brandlogofile\":\"themes/survey/bootswatch/files/logo.png\", \"showpopups\":\"1\", \"showclearall\":\"off\", \"questionhelptextposition\":\"top\"}', 'bootstrap', '{\"replace\":[[\"css/bootstrap.css\",\"css/variations/flatly.min.css\"]]}', '', '{\"add\":[\"pjax\",\"font-noto\",\"moment\"]}', NULL, NULL),
(4, 'fruity', 145616, NULL, NULL, 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', NULL, NULL),
(5, 'fruity', NULL, 1, NULL, 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', NULL, NULL),
(6, 'fruity', 492846, NULL, NULL, 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_tutorials`
--

CREATE TABLE `survey_tutorials` (
  `tid` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` int DEFAULT '0',
  `settings` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permission` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_grade` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_tutorial_entries`
--

CREATE TABLE `survey_tutorial_entries` (
  `teid` int NOT NULL,
  `ordering` int DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `settings` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_tutorial_entry_relation`
--

CREATE TABLE `survey_tutorial_entry_relation` (
  `teid` int NOT NULL,
  `tid` int NOT NULL,
  `uid` int DEFAULT NULL,
  `sid` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_users`
--

CREATE TABLE `survey_users` (
  `uid` int NOT NULL,
  `users_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `lang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `htmleditormode` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `templateeditormode` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `questionselectormode` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `one_time_pw` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dateformat` int NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `validation_key` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_key_expiration` datetime DEFAULT NULL,
  `last_forgot_email_password` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `survey_users`
--

INSERT INTO `survey_users` (`uid`, `users_name`, `password`, `full_name`, `parent_id`, `lang`, `email`, `htmleditormode`, `templateeditormode`, `questionselectormode`, `one_time_pw`, `dateformat`, `last_login`, `created`, `modified`, `validation_key`, `validation_key_expiration`, `last_forgot_email_password`) VALUES
(1, 'admin', '$2y$10$AsGSPKS83idl4laEJLmvkuZlg5fgE9ocImNu3cGndNIhbzmSZkn8O', 'Administrator', 0, 'en', 'admin@codeni.in', 'default', 'default', 'default', NULL, 1, '2022-02-18 06:17:23', '2022-02-15 17:09:20', '2022-02-18 06:17:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_user_groups`
--

CREATE TABLE `survey_user_groups` (
  `ugid` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_user_in_groups`
--

CREATE TABLE `survey_user_in_groups` (
  `ugid` int NOT NULL,
  `uid` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `survey_user_in_permissionrole`
--

CREATE TABLE `survey_user_in_permissionrole` (
  `ptid` int NOT NULL,
  `uid` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `survey_answers_idx` (`qid`,`code`,`scale_id`),
  ADD KEY `survey_answers_idx2` (`sortorder`);

--
-- Indexes for table `survey_answer_l10ns`
--
ALTER TABLE `survey_answer_l10ns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_answer_l10ns_idx` (`aid`,`language`);

--
-- Indexes for table `survey_archived_table_settings`
--
ALTER TABLE `survey_archived_table_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_assessments`
--
ALTER TABLE `survey_assessments`
  ADD PRIMARY KEY (`id`,`language`),
  ADD KEY `survey_assessments_idx2` (`sid`),
  ADD KEY `survey_assessments_idx3` (`gid`);

--
-- Indexes for table `survey_asset_version`
--
ALTER TABLE `survey_asset_version`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_boxes`
--
ALTER TABLE `survey_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_conditions`
--
ALTER TABLE `survey_conditions`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `survey_conditions_idx` (`qid`),
  ADD KEY `survey_conditions_idx3` (`cqid`);

--
-- Indexes for table `survey_defaultvalues`
--
ALTER TABLE `survey_defaultvalues`
  ADD PRIMARY KEY (`dvid`),
  ADD KEY `survey_idx1_defaultvalue` (`qid`,`scale_id`,`sqid`,`specialtype`);

--
-- Indexes for table `survey_defaultvalue_l10ns`
--
ALTER TABLE `survey_defaultvalue_l10ns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_idx1_defaultvalue_ls` (`dvid`,`language`);

--
-- Indexes for table `survey_expression_errors`
--
ALTER TABLE `survey_expression_errors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_failed_login_attempts`
--
ALTER TABLE `survey_failed_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_groups`
--
ALTER TABLE `survey_groups`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `survey_idx1_groups` (`sid`);

--
-- Indexes for table `survey_group_l10ns`
--
ALTER TABLE `survey_group_l10ns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_idx1_group_ls` (`gid`,`language`);

--
-- Indexes for table `survey_labels`
--
ALTER TABLE `survey_labels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_idx5_labels` (`lid`,`code`),
  ADD KEY `survey_idx1_labels` (`code`),
  ADD KEY `survey_idx2_labels` (`sortorder`),
  ADD KEY `survey_idx4_labels` (`lid`,`sortorder`);

--
-- Indexes for table `survey_labelsets`
--
ALTER TABLE `survey_labelsets`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `survey_label_l10ns`
--
ALTER TABLE `survey_label_l10ns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_map_tutorial_users`
--
ALTER TABLE `survey_map_tutorial_users`
  ADD PRIMARY KEY (`uid`,`tid`);

--
-- Indexes for table `survey_notifications`
--
ALTER TABLE `survey_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_notifications_pk` (`entity`,`entity_id`,`status`),
  ADD KEY `survey_idx1_notifications` (`hash`);

--
-- Indexes for table `survey_participants`
--
ALTER TABLE `survey_participants`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `survey_idx3_participants` (`language`);

--
-- Indexes for table `survey_participant_attribute`
--
ALTER TABLE `survey_participant_attribute`
  ADD PRIMARY KEY (`participant_id`,`attribute_id`);

--
-- Indexes for table `survey_participant_attribute_names`
--
ALTER TABLE `survey_participant_attribute_names`
  ADD PRIMARY KEY (`attribute_id`,`attribute_type`),
  ADD KEY `survey_idx_participant_attribute_names` (`attribute_id`,`attribute_type`);

--
-- Indexes for table `survey_participant_attribute_names_lang`
--
ALTER TABLE `survey_participant_attribute_names_lang`
  ADD PRIMARY KEY (`attribute_id`,`lang`);

--
-- Indexes for table `survey_participant_attribute_values`
--
ALTER TABLE `survey_participant_attribute_values`
  ADD PRIMARY KEY (`value_id`);

--
-- Indexes for table `survey_participant_shares`
--
ALTER TABLE `survey_participant_shares`
  ADD PRIMARY KEY (`participant_id`,`share_uid`);

--
-- Indexes for table `survey_permissions`
--
ALTER TABLE `survey_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_idx1_permissions` (`entity_id`,`entity`,`permission`,`uid`);

--
-- Indexes for table `survey_permissiontemplates`
--
ALTER TABLE `survey_permissiontemplates`
  ADD PRIMARY KEY (`ptid`),
  ADD UNIQUE KEY `survey_idx1_name` (`name`);

--
-- Indexes for table `survey_plugins`
--
ALTER TABLE `survey_plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_plugin_settings`
--
ALTER TABLE `survey_plugin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `survey_idx1_questions` (`sid`),
  ADD KEY `survey_idx2_questions` (`gid`),
  ADD KEY `survey_idx3_questions` (`type`),
  ADD KEY `survey_idx4_questions` (`title`),
  ADD KEY `survey_idx5_questions` (`parent_qid`);

--
-- Indexes for table `survey_question_attributes`
--
ALTER TABLE `survey_question_attributes`
  ADD PRIMARY KEY (`qaid`),
  ADD KEY `survey_idx1_question_attributes` (`qid`),
  ADD KEY `survey_idx2_question_attributes` (`attribute`);

--
-- Indexes for table `survey_question_l10ns`
--
ALTER TABLE `survey_question_l10ns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_idx1_question_ls` (`qid`,`language`);

--
-- Indexes for table `survey_question_themes`
--
ALTER TABLE `survey_question_themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_idx1_question_themes` (`name`);

--
-- Indexes for table `survey_quota`
--
ALTER TABLE `survey_quota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_idx1_quota` (`sid`);

--
-- Indexes for table `survey_quota_languagesettings`
--
ALTER TABLE `survey_quota_languagesettings`
  ADD PRIMARY KEY (`quotals_id`);

--
-- Indexes for table `survey_quota_members`
--
ALTER TABLE `survey_quota_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_idx1_quota_members` (`sid`,`qid`,`quota_id`,`code`);

--
-- Indexes for table `survey_saved_control`
--
ALTER TABLE `survey_saved_control`
  ADD PRIMARY KEY (`scid`),
  ADD KEY `survey_idx1_saved_control` (`sid`),
  ADD KEY `survey_idx2_saved_control` (`srid`);

--
-- Indexes for table `survey_sessions`
--
ALTER TABLE `survey_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sess_expire` (`expire`);

--
-- Indexes for table `survey_settings_global`
--
ALTER TABLE `survey_settings_global`
  ADD PRIMARY KEY (`stg_name`);

--
-- Indexes for table `survey_settings_user`
--
ALTER TABLE `survey_settings_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_idx1_settings_user` (`uid`),
  ADD KEY `survey_idx2_settings_user` (`entity`),
  ADD KEY `survey_idx3_settings_user` (`entity_id`),
  ADD KEY `survey_idx4_settings_user` (`stg_name`);

--
-- Indexes for table `survey_surveymenu`
--
ALTER TABLE `survey_surveymenu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_surveymenu_name` (`name`),
  ADD KEY `survey_idx2_surveymenu` (`title`);

--
-- Indexes for table `survey_surveymenu_entries`
--
ALTER TABLE `survey_surveymenu_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `survey_surveymenu_entries_name` (`name`),
  ADD KEY `survey_idx1_surveymenu_entries` (`menu_id`),
  ADD KEY `survey_idx5_surveymenu_entries` (`menu_title`);

--
-- Indexes for table `survey_surveys`
--
ALTER TABLE `survey_surveys`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `survey_idx1_surveys` (`owner_id`),
  ADD KEY `survey_idx2_surveys` (`gsid`);

--
-- Indexes for table `survey_surveys_groups`
--
ALTER TABLE `survey_surveys_groups`
  ADD PRIMARY KEY (`gsid`),
  ADD KEY `survey_idx1_surveys_groups` (`name`),
  ADD KEY `survey_idx2_surveys_groups` (`title`);

--
-- Indexes for table `survey_surveys_groupsettings`
--
ALTER TABLE `survey_surveys_groupsettings`
  ADD PRIMARY KEY (`gsid`);

--
-- Indexes for table `survey_surveys_languagesettings`
--
ALTER TABLE `survey_surveys_languagesettings`
  ADD PRIMARY KEY (`surveyls_survey_id`,`surveyls_language`),
  ADD KEY `survey_idx1_surveys_languagesettings` (`surveyls_title`);

--
-- Indexes for table `survey_survey_links`
--
ALTER TABLE `survey_survey_links`
  ADD PRIMARY KEY (`participant_id`,`token_id`,`survey_id`);

--
-- Indexes for table `survey_survey_url_parameters`
--
ALTER TABLE `survey_survey_url_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_templates`
--
ALTER TABLE `survey_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_idx1_templates` (`name`),
  ADD KEY `survey_idx2_templates` (`title`),
  ADD KEY `survey_idx3_templates` (`owner_id`),
  ADD KEY `survey_idx4_templates` (`extends`);

--
-- Indexes for table `survey_template_configuration`
--
ALTER TABLE `survey_template_configuration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_idx1_template_configuration` (`template_name`),
  ADD KEY `survey_idx2_template_configuration` (`sid`),
  ADD KEY `survey_idx3_template_configuration` (`gsid`),
  ADD KEY `survey_idx4_template_configuration` (`uid`);

--
-- Indexes for table `survey_tutorials`
--
ALTER TABLE `survey_tutorials`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `survey_idx1_tutorials` (`name`);

--
-- Indexes for table `survey_tutorial_entries`
--
ALTER TABLE `survey_tutorial_entries`
  ADD PRIMARY KEY (`teid`);

--
-- Indexes for table `survey_tutorial_entry_relation`
--
ALTER TABLE `survey_tutorial_entry_relation`
  ADD PRIMARY KEY (`teid`,`tid`),
  ADD KEY `survey_idx1_tutorial_entry_relation` (`uid`),
  ADD KEY `survey_idx2_tutorial_entry_relation` (`sid`);

--
-- Indexes for table `survey_users`
--
ALTER TABLE `survey_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `survey_idx1_users` (`users_name`),
  ADD KEY `survey_idx2_users` (`email`);

--
-- Indexes for table `survey_user_groups`
--
ALTER TABLE `survey_user_groups`
  ADD PRIMARY KEY (`ugid`),
  ADD UNIQUE KEY `survey_idx1_user_groups` (`name`);

--
-- Indexes for table `survey_user_in_groups`
--
ALTER TABLE `survey_user_in_groups`
  ADD PRIMARY KEY (`ugid`,`uid`);

--
-- Indexes for table `survey_user_in_permissionrole`
--
ALTER TABLE `survey_user_in_permissionrole`
  ADD PRIMARY KEY (`ptid`,`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_answer_l10ns`
--
ALTER TABLE `survey_answer_l10ns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_archived_table_settings`
--
ALTER TABLE `survey_archived_table_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_assessments`
--
ALTER TABLE `survey_assessments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_asset_version`
--
ALTER TABLE `survey_asset_version`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_boxes`
--
ALTER TABLE `survey_boxes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_conditions`
--
ALTER TABLE `survey_conditions`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_defaultvalues`
--
ALTER TABLE `survey_defaultvalues`
  MODIFY `dvid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_defaultvalue_l10ns`
--
ALTER TABLE `survey_defaultvalue_l10ns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_expression_errors`
--
ALTER TABLE `survey_expression_errors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_failed_login_attempts`
--
ALTER TABLE `survey_failed_login_attempts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_groups`
--
ALTER TABLE `survey_groups`
  MODIFY `gid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_group_l10ns`
--
ALTER TABLE `survey_group_l10ns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_labels`
--
ALTER TABLE `survey_labels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_labelsets`
--
ALTER TABLE `survey_labelsets`
  MODIFY `lid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_label_l10ns`
--
ALTER TABLE `survey_label_l10ns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_notifications`
--
ALTER TABLE `survey_notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_participant_attribute_names`
--
ALTER TABLE `survey_participant_attribute_names`
  MODIFY `attribute_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_participant_attribute_values`
--
ALTER TABLE `survey_participant_attribute_values`
  MODIFY `value_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_permissions`
--
ALTER TABLE `survey_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `survey_permissiontemplates`
--
ALTER TABLE `survey_permissiontemplates`
  MODIFY `ptid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_plugins`
--
ALTER TABLE `survey_plugins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `survey_plugin_settings`
--
ALTER TABLE `survey_plugin_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `qid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_question_attributes`
--
ALTER TABLE `survey_question_attributes`
  MODIFY `qaid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `survey_question_l10ns`
--
ALTER TABLE `survey_question_l10ns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_question_themes`
--
ALTER TABLE `survey_question_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `survey_quota`
--
ALTER TABLE `survey_quota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_quota_languagesettings`
--
ALTER TABLE `survey_quota_languagesettings`
  MODIFY `quotals_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_quota_members`
--
ALTER TABLE `survey_quota_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_saved_control`
--
ALTER TABLE `survey_saved_control`
  MODIFY `scid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_settings_user`
--
ALTER TABLE `survey_settings_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_surveymenu`
--
ALTER TABLE `survey_surveymenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_surveymenu_entries`
--
ALTER TABLE `survey_surveymenu_entries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `survey_surveys_groups`
--
ALTER TABLE `survey_surveys_groups`
  MODIFY `gsid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_survey_url_parameters`
--
ALTER TABLE `survey_survey_url_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_templates`
--
ALTER TABLE `survey_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_template_configuration`
--
ALTER TABLE `survey_template_configuration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_tutorials`
--
ALTER TABLE `survey_tutorials`
  MODIFY `tid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_tutorial_entries`
--
ALTER TABLE `survey_tutorial_entries`
  MODIFY `teid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_users`
--
ALTER TABLE `survey_users`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_user_groups`
--
ALTER TABLE `survey_user_groups`
  MODIFY `ugid` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
