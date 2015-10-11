-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 07:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phalanx`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE IF NOT EXISTS `address_book` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `street` varchar(155) NOT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_def` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Default address?',
  `residence_type` varchar(25) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `additional_info` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `address_book`:
--   `user_id`
--       `users` -> `id`
--   `residence_type`
--       `address_residence_types` -> `slug`
--   `city`
--       `cities` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_residence_types`
--

CREATE TABLE IF NOT EXISTS `address_residence_types` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(25) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `address_residence_types`:
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `clean_name` varchar(100) NOT NULL,
  `latitude` decimal(15,10) DEFAULT NULL,
  `longitude` decimal(15,10) DEFAULT NULL,
  `state_id` int(10) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `geonameid` varchar(7) DEFAULT NULL,
  `alternativenames` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `cities`:
--   `state_id`
--       `states` -> `id`
--   `country_id`
--       `countries` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(155) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `activated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `activated_on` datetime DEFAULT NULL,
  `activation_key` varchar(64) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `contacts`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(45) NOT NULL,
  `iso_numeric` varchar(3) DEFAULT NULL,
  `iso_alpha3` varchar(3) DEFAULT NULL,
  `fips` varchar(2) DEFAULT NULL,
  `continent` varchar(2) DEFAULT NULL,
  `phone_code` varchar(10) DEFAULT NULL,
  `tld` varchar(3) DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `currency_name` varchar(20) DEFAULT NULL,
  `postal_format` varchar(55) DEFAULT NULL,
  `postal_regex` varchar(155) DEFAULT NULL,
  `geonameid` varchar(7) DEFAULT NULL,
  `neighbours` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `countries`:
--

-- --------------------------------------------------------

--
-- Table structure for table `emails_queue`
--

CREATE TABLE IF NOT EXISTS `emails_queue` (
  `id` int(10) unsigned NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `to_be_sent_on` datetime DEFAULT NULL,
  `sent_on` datetime DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `serialized_recipient` varchar(255) DEFAULT NULL,
  `serialized_sender` varchar(255) DEFAULT NULL,
  `headers` text,
  `sent` tinyint(1) DEFAULT '0',
  `email_object` mediumblob,
  `slug` varchar(45) DEFAULT NULL,
  `blobhash` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `emails_queue`:
--   `slug`
--       `emails_templates` -> `slug`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails_templates`
--

CREATE TABLE IF NOT EXISTS `emails_templates` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text,
  `body_html` text,
  `template_info` text COMMENT 'Information about this template. When is it sent, why, etc.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `emails_templates`:
--

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE IF NOT EXISTS `entities` (
  `id` int(10) unsigned NOT NULL,
  `entity` varchar(45) NOT NULL,
  `references` varchar(45) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `entities`:
--

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE IF NOT EXISTS `errors` (
  `id` int(10) unsigned NOT NULL,
  `url` text NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `stack_trace` text,
  `details` text,
  `type` varchar(10) NOT NULL,
  `code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `errors`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `recent_searches`
--

CREATE TABLE IF NOT EXISTS `recent_searches` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `query` varchar(155) NOT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `recent_searches`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `remembered_sessions`
--

CREATE TABLE IF NOT EXISTS `remembered_sessions` (
  `id` int(10) unsigned NOT NULL,
  `usernamehashed` varchar(128) DEFAULT NULL,
  `cookievaluehashed` varchar(128) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `remembered_sessions`:
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(45) DEFAULT NULL,
  `value` text,
  `user_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `settings`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `short_name` varchar(10) NOT NULL,
  `country_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `states`:
--   `country_id`
--       `countries` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `tag` varchar(35) NOT NULL,
  `parent` int(10) unsigned DEFAULT '0',
  `tag_type` int(10) unsigned NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tags`:
--   `parent`
--       `tags` -> `id`
--   `tag_type`
--       `tag_types` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tag_bind`
--

CREATE TABLE IF NOT EXISTS `tag_bind` (
  `id` bigint(20) unsigned NOT NULL,
  `tag` int(10) unsigned NOT NULL,
  `entity_type` varchar(45) DEFAULT NULL,
  `entity_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tag_bind`:
--   `entity_type`
--       `entities` -> `entity`
--   `tag`
--       `tags` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tag_types`
--

CREATE TABLE IF NOT EXISTS `tag_types` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tag_types`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(45) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `password_reset_hash` varchar(200) DEFAULT NULL,
  `main_contact_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `users`:
--   `created_by`
--       `users` -> `id`
--   `main_contact_id`
--       `contacts` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(10) unsigned NOT NULL,
  `role_slug` varchar(45) NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users_roles`:
--   `role_slug`
--       `user_roles` -> `slug`
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user_roles`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_book_1_idx` (`user_id`),
  ADD KEY `fk_address_book_2_idx` (`residence_type`),
  ADD KEY `fk_address_book_3_idx` (`city`);

--
-- Indexes for table `address_residence_types`
--
ALTER TABLE `address_residence_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cities_1_idx` (`state_id`),
  ADD KEY `fk_cities_2_idx` (`country_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailunique` (`email`),
  ADD KEY `fk_contacts_1_idx` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code_UNIQUE` (`country_code`),
  ADD UNIQUE KEY `iso_numeric_UNIQUE` (`iso_numeric`),
  ADD UNIQUE KEY `iso_alpha3_UNIQUE` (`iso_alpha3`),
  ADD UNIQUE KEY `fips_UNIQUE` (`fips`);

--
-- Indexes for table `emails_queue`
--
ALTER TABLE `emails_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_slug_from_queue_idx` (`slug`);

--
-- Indexes for table `emails_templates`
--
ALTER TABLE `emails_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entity_UNIQUE` (`entity`);

--
-- Indexes for table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_errors_1_idx` (`user_id`);

--
-- Indexes for table `recent_searches`
--
ALTER TABLE `recent_searches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recent_search_1_idx` (`user_id`);

--
-- Indexes for table `remembered_sessions`
--
ALTER TABLE `remembered_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index3` (`key`,`user_id`),
  ADD KEY `fk_settings_1_idx` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_states_1_idx` (`country_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_uniquepertype` (`tag`,`tag_type`),
  ADD KEY `tag_type_fk_bind_idx` (`tag_type`),
  ADD KEY `tag_parent_self_bind_idx` (`parent`);

--
-- Indexes for table `tag_bind`
--
ALTER TABLE `tag_bind`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id_from_bind_idx` (`tag`),
  ADD KEY `entity_type_from_bind_idx` (`entity_type`);

--
-- Indexes for table `tag_types`
--
ALTER TABLE `tag_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_UNIQUE` (`type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `mainContactId_UNIQUE` (`main_contact_id`),
  ADD KEY `fk_users_1_idx` (`created_by`),
  ADD KEY `mainContactId` (`main_contact_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueuserrole` (`role_slug`,`user_id`),
  ADD KEY `fk_users_roles_1_idx` (`role_slug`),
  ADD KEY `fk_users_roles_2_idx` (`user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `address_residence_types`
--
ALTER TABLE `address_residence_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails_queue`
--
ALTER TABLE `emails_queue`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails_templates`
--
ALTER TABLE `emails_templates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recent_searches`
--
ALTER TABLE `recent_searches`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `remembered_sessions`
--
ALTER TABLE `remembered_sessions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_bind`
--
ALTER TABLE `tag_bind`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_types`
--
ALTER TABLE `tag_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_book`
--
ALTER TABLE `address_book`
  ADD CONSTRAINT `fk_address_book_1_idx` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_address_book_2` FOREIGN KEY (`residence_type`) REFERENCES `address_residence_types` (`slug`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_address_book_3_idx` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cities_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cities_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `emails_queue`
--
ALTER TABLE `emails_queue`
  ADD CONSTRAINT `email_slug_from_queue` FOREIGN KEY (`slug`) REFERENCES `emails_templates` (`slug`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `errors`
--
ALTER TABLE `errors`
  ADD CONSTRAINT `fk_errors_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recent_searches`
--
ALTER TABLE `recent_searches`
  ADD CONSTRAINT `fk_recent_search_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_settings_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `fk_states_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tag_parent_self_bind` FOREIGN KEY (`parent`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_type_fk_bind` FOREIGN KEY (`tag_type`) REFERENCES `tag_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_bind`
--
ALTER TABLE `tag_bind`
  ADD CONSTRAINT `entity_type_from_bind` FOREIGN KEY (`entity_type`) REFERENCES `entities` (`entity`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_id_from_bind` FOREIGN KEY (`tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mainContactId` FOREIGN KEY (`main_contact_id`) REFERENCES `contacts` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_users_roles_1` FOREIGN KEY (`role_slug`) REFERENCES `user_roles` (`slug`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_roles_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
