-- Generated from PMEEXPORT.mwb
-- MySQL Workbench Model → SQL
-- Schemas: pmeexport, homestead, turmavip

-- ============================================================
-- ============================================================
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `caes`;
CREATE TABLE `caes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `cae_id` INT UNSIGNED NULL DEFAULT NULL,
  `code` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `designation` VARCHAR(191) NOT NULL,
  `rev` VARCHAR(191) NULL DEFAULT NULL,
  `other` VARCHAR(191) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `caes_uuid_unique` (`uuid`),
  INDEX `fk_caes_caes_idx` (`cae_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `certificate_categories`;
CREATE TABLE `certificate_categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `certificate_categories_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `certificate_requirements`;
CREATE TABLE `certificate_requirements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `certificate_id` INT UNSIGNED NOT NULL,
  `requirement_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `certificate_requirements_uuid_unique` (`uuid`),
  INDEX `fk_certificate_requirement_idx` (`certificate_id`),
  INDEX `fk_requirement_certificate_idx` (`requirement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `department_id` INT UNSIGNED NOT NULL,
  `certificate_category_id` INT UNSIGNED NOT NULL,
  `duration` VARCHAR(191) NOT NULL,
  `description` TEXT NOT NULL,
  `status` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `certificates_uuid_unique` (`uuid`),
  INDEX `fk_department_certificate_idx` (`department_id`),
  INDEX `fk_category_certificate_idx` (`certificate_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `status` INT NOT NULL DEFAULT '4' COMMENT 'See application code for status values',
  `legal_situation_id` INT UNSIGNED NULL DEFAULT NULL,
  `district_id` INT UNSIGNED NULL DEFAULT NULL,
  `initials` VARCHAR(191) NULL DEFAULT NULL,
  `address` VARCHAR(191) NULL DEFAULT NULL,
  `number` VARCHAR(191) NULL DEFAULT NULL,
  `locality` VARCHAR(191) NULL DEFAULT NULL,
  `latitude` VARCHAR(191) NULL DEFAULT NULL,
  `longitude` VARCHAR(191) NULL DEFAULT NULL,
  `country` INT NULL DEFAULT NULL,
  `zipcode` VARCHAR(191) NULL DEFAULT NULL,
  `website` VARCHAR(191) NULL DEFAULT NULL,
  `nuit` INT NULL DEFAULT NULL,
  `nuit_doc` VARCHAR(191) NULL DEFAULT NULL,
  `alvara` INT NULL DEFAULT NULL,
  `alvara_doc` VARCHAR(191) NULL DEFAULT NULL,
  `initial_investment` VARCHAR(191) NULL DEFAULT NULL,
  `business_volume` INT NULL DEFAULT NULL,
  `number_of_workers_h` INT NULL DEFAULT NULL,
  `number_of_workers_m` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `companies_uuid_unique` (`uuid`),
  UNIQUE INDEX `companies_nuit_unique` (`nuit`),
  UNIQUE INDEX `companies_alvara_unique` (`alvara`),
  INDEX `fk_situacao_juridica_empresa_idx` (`legal_situation_id`),
  INDEX `fk_distrito_empresa_idx` (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_announcements`;
CREATE TABLE `company_announcements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NULL DEFAULT NULL,
  `product_id` INT UNSIGNED NULL DEFAULT NULL,
  `market_type` INT NOT NULL,
  `type_of_exposure` INT NOT NULL,
  `visibility` INT NOT NULL,
  `unit_of_measure_or_weight` INT NOT NULL,
  `amount` INT NOT NULL,
  `coin` INT NOT NULL,
  `price` INT NOT NULL,
  `payment_model` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_announcements_uuid_unique` (`uuid`),
  INDEX `fk_announcements_company_idx` (`company_id`),
  INDEX `fk_announcements_product_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_caes`;
CREATE TABLE `company_caes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` INT UNSIGNED NOT NULL,
  `cae_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_company_caes_idx` (`company_id`),
  INDEX `fk_cae_companies_idx` (`cae_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_certificates`;
CREATE TABLE `company_certificates` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `certificate_id` INT UNSIGNED NOT NULL,
  `status` INT NOT NULL,
  `request_date` DATETIME NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_certificates_uuid_unique` (`uuid`),
  INDEX `fk_company_certificate_idx` (`company_id`),
  INDEX `fk_certificate_company_idx` (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_emails`;
CREATE TABLE `company_emails` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `type` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_emails_uuid_unique` (`uuid`),
  INDEX `fk_email_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_partners`;
CREATE TABLE `company_partners` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_partners_uuid_unique` (`uuid`),
  INDEX `fk_socio_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_phones`;
CREATE TABLE `company_phones` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `type` INT NOT NULL,
  `ddi` VARCHAR(191) NOT NULL,
  `prefix` VARCHAR(191) NOT NULL,
  `number` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_phones_uuid_unique` (`uuid`),
  INDEX `fk_telefone_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_representatives`;
CREATE TABLE `company_representatives` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_representatives_uuid_unique` (`uuid`),
  INDEX `fk_representante_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `departments_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `province_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `districts_uuid_unique` (`uuid`),
  INDEX `fk_provincia_distrito_idx` (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_certificate_id` INT UNSIGNED NOT NULL,
  `requirement_id` INT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `status` INT NOT NULL,
  `url` VARCHAR(191) NOT NULL,
  `approved_date` DATETIME NOT NULL,
  `disapproved_date` DATETIME NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `documents_uuid_unique` (`uuid`),
  INDEX `fk_company_document_idx` (`company_certificate_id`),
  INDEX `fk_requirement_document_idx` (`requirement_id`),
  INDEX `fk_user_document_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `legal_situations`;
CREATE TABLE `legal_situations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `legal_situations_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(191) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` VARCHAR(100) NOT NULL,
  `user_id` INT NULL DEFAULT NULL,
  `client_id` INT NOT NULL,
  `name` VARCHAR(191) NULL DEFAULT NULL,
  `scopes` TEXT NULL DEFAULT NULL,
  `revoked` TINYINT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` VARCHAR(100) NOT NULL,
  `user_id` INT NOT NULL,
  `client_id` INT NOT NULL,
  `scopes` TEXT NULL DEFAULT NULL,
  `revoked` TINYINT NOT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL DEFAULT NULL,
  `name` VARCHAR(191) NOT NULL,
  `secret` VARCHAR(100) NOT NULL,
  `redirect` TEXT NOT NULL,
  `personal_access_client` TINYINT NOT NULL,
  `password_client` TINYINT NOT NULL,
  `revoked` TINYINT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` VARCHAR(100) NOT NULL,
  `access_token_id` VARCHAR(100) NOT NULL,
  `revoked` TINYINT NOT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` VARCHAR(191) NOT NULL,
  `token` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  `value` TINYINT NOT NULL DEFAULT '-1',
  `expires` TIMESTAMP NULL DEFAULT NULL,
  INDEX `permission_role_permission_id_index` (`permission_id`),
  INDEX `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `user_id` INT UNSIGNED NOT NULL,
  `permission_id` INT UNSIGNED NOT NULL,
  `value` TINYINT NOT NULL DEFAULT '-1',
  `expires` TIMESTAMP NULL DEFAULT NULL,
  INDEX `permission_user_user_id_index` (`user_id`),
  INDEX `permission_user_permission_id_index` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `readable_name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `photo` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `product_categories_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `product_category_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `products_uuid_unique` (`uuid`),
  INDEX `fk_produto_category_idx` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `provinces_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `request_messages`;
CREATE TABLE `request_messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `request_id` INT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `request_messages_uuid_unique` (`uuid`),
  INDEX `fk_request_message_requests_idx` (`request_id`),
  INDEX `fk_request_message_users_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `requesting_company_id` INT UNSIGNED NOT NULL,
  `status` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `company_announcements_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `requests_uuid_unique` (`uuid`),
  INDEX `fk_request_company_idx` (`company_id`),
  INDEX `fk_requesting_company_idx` (`requesting_company_id`),
  INDEX `fk_requests_company_announcements1_idx` (`company_announcements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `requirements`;
CREATE TABLE `requirements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `type` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `requirements_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  INDEX `role_user_user_id_index` (`user_id`),
  INDEX `role_user_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `password` VARCHAR(191) NOT NULL,
  `status` INT NOT NULL DEFAULT '1',
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_uuid_unique` (`uuid`),
  UNIQUE INDEX `users_email_unique` (`email`),
  INDEX `fk_user_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
-- ============================================================
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `caes`;
CREATE TABLE `caes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `cae_id` INT UNSIGNED NULL DEFAULT NULL,
  `code` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `designation` VARCHAR(191) NOT NULL,
  `rev` VARCHAR(191) NULL DEFAULT NULL,
  `other` VARCHAR(191) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `caes_uuid_unique` (`uuid`),
  INDEX `fk_caes_caes_idx` (`cae_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `certificate_categories`;
CREATE TABLE `certificate_categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `certificate_categories_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `certificate_requirements`;
CREATE TABLE `certificate_requirements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `certificate_id` INT UNSIGNED NOT NULL,
  `requirement_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `certificate_requirements_uuid_unique` (`uuid`),
  INDEX `fk_certificate_requirement_idx` (`certificate_id`),
  INDEX `fk_requirement_certificate_idx` (`requirement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `department_id` INT UNSIGNED NOT NULL,
  `certificate_category_id` INT UNSIGNED NOT NULL,
  `duration` VARCHAR(191) NOT NULL,
  `description` TEXT NOT NULL,
  `name` TEXT NOT NULL,
  `status` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `certificates_uuid_unique` (`uuid`),
  INDEX `fk_department_certificate_idx` (`department_id`),
  INDEX `fk_category_certificate_idx` (`certificate_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `status` INT NOT NULL DEFAULT '4' COMMENT 'See application code for status values',
  `legal_situation_id` INT UNSIGNED NULL DEFAULT NULL,
  `district_id` INT UNSIGNED NULL DEFAULT NULL,
  `initials` VARCHAR(191) NULL DEFAULT NULL,
  `address` VARCHAR(191) NULL DEFAULT NULL,
  `number` VARCHAR(191) NULL DEFAULT NULL,
  `locality` VARCHAR(191) NULL DEFAULT NULL,
  `latitude` VARCHAR(191) NULL DEFAULT NULL,
  `longitude` VARCHAR(191) NULL DEFAULT NULL,
  `country` INT NULL DEFAULT NULL,
  `zipcode` VARCHAR(191) NULL DEFAULT NULL,
  `website` VARCHAR(191) NULL DEFAULT NULL,
  `nuit` INT NULL DEFAULT NULL,
  `nuit_doc` VARCHAR(191) NULL DEFAULT NULL,
  `alvara` INT NULL DEFAULT NULL,
  `alvara_doc` VARCHAR(191) NULL DEFAULT NULL,
  `initial_investment` VARCHAR(191) NULL DEFAULT NULL,
  `business_volume` INT NULL DEFAULT NULL,
  `number_of_workers_h` INT NULL DEFAULT NULL,
  `number_of_workers_m` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `companies_uuid_unique` (`uuid`),
  UNIQUE INDEX `companies_nuit_unique` (`nuit`),
  UNIQUE INDEX `companies_alvara_unique` (`alvara`),
  INDEX `fk_situacao_juridica_empresa_idx` (`legal_situation_id`),
  INDEX `fk_distrito_empresa_idx` (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_announcements`;
CREATE TABLE `company_announcements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NULL DEFAULT NULL,
  `product_id` INT UNSIGNED NULL DEFAULT NULL,
  `market_type` INT NOT NULL,
  `type_of_exposure` INT NOT NULL,
  `visibility` INT NOT NULL,
  `unit_of_measure_or_weight` INT NOT NULL,
  `amount` INT NOT NULL,
  `coin` INT NOT NULL,
  `price` DOUBLE(10,2) NOT NULL,
  `payment_model` INT NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_announcements_uuid_unique` (`uuid`),
  INDEX `fk_announcements_company_idx` (`company_id`),
  INDEX `fk_announcements_product_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_caes`;
CREATE TABLE `company_caes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` INT UNSIGNED NOT NULL,
  `cae_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_company_caes_idx` (`company_id`),
  INDEX `fk_cae_companies_idx` (`cae_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_certificates`;
CREATE TABLE `company_certificates` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `certificate_id` INT UNSIGNED NOT NULL,
  `status` INT NOT NULL,
  `request_date` DATETIME NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_certificates_uuid_unique` (`uuid`),
  INDEX `fk_company_certificate_idx` (`company_id`),
  INDEX `fk_certificate_company_idx` (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_emails`;
CREATE TABLE `company_emails` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `type` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_emails_uuid_unique` (`uuid`),
  INDEX `fk_email_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_partners`;
CREATE TABLE `company_partners` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_partners_uuid_unique` (`uuid`),
  INDEX `fk_socio_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_phones`;
CREATE TABLE `company_phones` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `type` INT NOT NULL,
  `ddi` VARCHAR(191) NOT NULL,
  `prefix` VARCHAR(191) NOT NULL,
  `number` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_phones_uuid_unique` (`uuid`),
  INDEX `fk_telefone_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `company_representatives`;
CREATE TABLE `company_representatives` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `company_representatives_uuid_unique` (`uuid`),
  INDEX `fk_representante_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `departments_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `province_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `districts_uuid_unique` (`uuid`),
  INDEX `fk_provincia_distrito_idx` (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_certificate_id` INT UNSIGNED NOT NULL,
  `requirement_id` INT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `status` INT NOT NULL,
  `url` VARCHAR(191) NOT NULL,
  `approved_date` DATETIME NOT NULL,
  `disapproved_date` DATETIME NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `documents_uuid_unique` (`uuid`),
  INDEX `fk_company_document_idx` (`company_certificate_id`),
  INDEX `fk_requirement_document_idx` (`requirement_id`),
  INDEX `fk_user_document_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `legal_situations`;
CREATE TABLE `legal_situations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `legal_situations_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(191) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` VARCHAR(100) NOT NULL,
  `user_id` INT NULL DEFAULT NULL,
  `client_id` INT NOT NULL,
  `name` VARCHAR(191) NULL DEFAULT NULL,
  `scopes` TEXT NULL DEFAULT NULL,
  `revoked` TINYINT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` VARCHAR(100) NOT NULL,
  `user_id` INT NOT NULL,
  `client_id` INT NOT NULL,
  `scopes` TEXT NULL DEFAULT NULL,
  `revoked` TINYINT NOT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL DEFAULT NULL,
  `name` VARCHAR(191) NOT NULL,
  `secret` VARCHAR(100) NOT NULL,
  `redirect` TEXT NOT NULL,
  `personal_access_client` TINYINT NOT NULL,
  `password_client` TINYINT NOT NULL,
  `revoked` TINYINT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` VARCHAR(100) NOT NULL,
  `access_token_id` VARCHAR(100) NOT NULL,
  `revoked` TINYINT NOT NULL,
  `expires_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` VARCHAR(191) NOT NULL,
  `token` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  `value` TINYINT NOT NULL DEFAULT '-1',
  `expires` TIMESTAMP NULL DEFAULT NULL,
  INDEX `permission_role_permission_id_index` (`permission_id`),
  INDEX `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `user_id` INT UNSIGNED NOT NULL,
  `permission_id` INT UNSIGNED NOT NULL,
  `value` TINYINT NOT NULL DEFAULT '-1',
  `expires` TIMESTAMP NULL DEFAULT NULL,
  INDEX `permission_user_user_id_index` (`user_id`),
  INDEX `permission_user_permission_id_index` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `readable_name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `photo` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `product_categories_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `product_category_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `products_uuid_unique` (`uuid`),
  INDEX `fk_produto_category_idx` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `provinces_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `request_announcements`;
CREATE TABLE `request_announcements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_announcements_id` INT UNSIGNED NOT NULL,
  `unit_of_measure_or_weight` INT NULL DEFAULT NULL,
  `amount` INT NULL DEFAULT NULL,
  `coin` INT NULL DEFAULT NULL,
  `price` DOUBLE(10,2) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `products_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_requests_company_announcements_idx` (`company_announcements_id`),
  INDEX `fk_request_announcements_products1_idx` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `request_messages`;
CREATE TABLE `request_messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `request_announcements_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `request_messages_uuid_unique` (`uuid`),
  INDEX `fk_request_message_users_idx` (`user_id`),
  INDEX `fk_request_messages_request_announcements1_idx` (`request_announcements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `requirements`;
CREATE TABLE `requirements` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(191) NOT NULL,
  `type` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `requirements_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  INDEX `role_user_user_id_index` (`user_id`),
  INDEX `role_user_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `password` VARCHAR(191) NOT NULL,
  `status` INT NOT NULL DEFAULT '1',
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_uuid_unique` (`uuid`),
  UNIQUE INDEX `users_email_unique` (`email`),
  INDEX `fk_user_empresa_idx` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
-- ============================================================
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` VARCHAR(191) NULL DEFAULT NULL,
  `description` TEXT NOT NULL,
  `subject_id` INT NULL DEFAULT NULL,
  `subject_type` VARCHAR(191) NULL DEFAULT NULL,
  `causer_id` INT NULL DEFAULT NULL,
  `causer_type` VARCHAR(191) NULL DEFAULT NULL,
  `properties` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cupoms`;
CREATE TABLE `cupoms` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `code` VARCHAR(191) NULL DEFAULT NULL,
  `foto` VARCHAR(191) NULL DEFAULT NULL,
  `tipo` INT UNSIGNED NOT NULL,
  `quantidade` INT NOT NULL DEFAULT '0',
  `tipo_desconto` INT UNSIGNED NOT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `porcentagem` INT NULL DEFAULT NULL,
  `validade` DATE NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cupoms_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `uuid` CHAR(36) NOT NULL,
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(300) NULL DEFAULT NULL,
  `subtitle` VARCHAR(300) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `icon` VARCHAR(100) NULL DEFAULT NULL,
  `programacao` TEXT NULL DEFAULT NULL,
  `foto` VARCHAR(500) NULL DEFAULT NULL,
  `status` INT NULL DEFAULT '1' COMMENT 'status de ativo 0 ou null desativado 1 ativado',
  `preco` DECIMAL(10,2) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cursos_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `titulo` VARCHAR(191) NULL DEFAULT NULL,
  `nomes` VARCHAR(191) NULL DEFAULT NULL,
  `emails` VARCHAR(191) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `emails_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(191) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `nome` VARCHAR(191) NULL DEFAULT NULL,
  `email` VARCHAR(191) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `newsletters_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `user_id` INT UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `tipo_pagamento` INT NULL DEFAULT NULL COMMENT '1 = Boleto 2 = Cartao 3 = Depósito',
  `status` INT NOT NULL DEFAULT '1' COMMENT 'Status = 1 Aguardando Pagamento, 2 = Em analise, 3 = Efetuado com sucesso, 4 = Pre Inscricao 5 = Liberado para pagamento 6 Cancelado',
  `data_pedido` DATETIME NULL DEFAULT NULL,
  `data_pagamento` DATETIME NULL DEFAULT NULL,
  `oCustomerId` VARCHAR(191) NULL DEFAULT NULL,
  `oCustomerOwnId` VARCHAR(191) NULL DEFAULT NULL,
  `oOrderId` VARCHAR(191) NULL DEFAULT NULL,
  `oOrderOwnId` VARCHAR(191) NULL DEFAULT NULL,
  `oPagId` VARCHAR(191) NULL DEFAULT NULL,
  `oPagStatus` VARCHAR(191) NULL DEFAULT NULL,
  `oPagLinkBoleto` VARCHAR(191) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `cupom_id` INT NULL DEFAULT NULL,
  `parcelas` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `orders_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` VARCHAR(191) NOT NULL,
  `token` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  `value` TINYINT NOT NULL DEFAULT '-1',
  `expires` TIMESTAMP NULL DEFAULT NULL,
  INDEX `permission_role_permission_id_index` (`permission_id`),
  INDEX `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `user_id` INT UNSIGNED NOT NULL,
  `permission_id` INT UNSIGNED NOT NULL,
  `value` TINYINT NOT NULL DEFAULT '-1',
  `expires` TIMESTAMP NULL DEFAULT NULL,
  INDEX `permission_user_user_id_index` (`user_id`),
  INDEX `permission_user_permission_id_index` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `readable_name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` INT UNSIGNED NOT NULL,
  `role_id` INT UNSIGNED NOT NULL,
  INDEX `role_user_user_id_index` (`user_id`),
  INDEX `role_user_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `turma_orders`;
CREATE TABLE `turma_orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `order_id` INT UNSIGNED NOT NULL,
  `turma_id` INT UNSIGNED NOT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `turma_orders_uuid_unique` (`uuid`),
  INDEX `fk_turma_turmas_id` (`turma_id`),
  INDEX `fk_curso_orders_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE `turmas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `cursos_id` INT UNSIGNED NOT NULL,
  `quantidade` INT NOT NULL,
  `topo` INT NULL DEFAULT NULL,
  `status` INT NOT NULL DEFAULT '1' COMMENT '1 Turma aberta - 2 Proxima Turma 3 Turma Fechada 4 - Pre Inscricao',
  `nome` VARCHAR(191) NULL DEFAULT NULL,
  `data_realizacao` DATE NULL DEFAULT NULL,
  `hora` VARCHAR(191) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `carga_horaria` INT NULL DEFAULT NULL,
  `professor_id` INT UNSIGNED NULL DEFAULT NULL,
  `apostila` VARCHAR(191) NULL DEFAULT NULL,
  `nome_professor` VARCHAR(191) NULL DEFAULT NULL,
  `curriculum_professor` TEXT NULL DEFAULT NULL,
  `local` VARCHAR(191) NULL DEFAULT NULL,
  `referencia` TEXT NULL DEFAULT NULL,
  `bairro` VARCHAR(191) NULL DEFAULT NULL,
  `nome_link` VARCHAR(191) NULL DEFAULT '''''',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `turmas_uuid_unique` (`uuid`),
  INDEX `fk_turma_curso1_idx` (`cursos_id`),
  INDEX `fk_professor_turma_users_idx` (`professor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `turmas_users`;
CREATE TABLE `turmas_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  `turma_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `order_id` INT NULL DEFAULT NULL,
  `status` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `turmas_users_uuid_unique` (`uuid`),
  INDEX `fk_turma_turma1_idx` (`turma_id`),
  INDEX `fk_turma_users_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` CHAR(36) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `password` VARCHAR(191) NOT NULL,
  `celular` VARCHAR(191) NULL DEFAULT NULL,
  `celular_ddd` VARCHAR(191) NULL DEFAULT NULL,
  `nascimento` VARCHAR(191) NULL DEFAULT NULL,
  `cep` VARCHAR(191) NULL DEFAULT NULL,
  `cpf` VARCHAR(191) NULL DEFAULT NULL,
  `endereco` VARCHAR(191) NULL DEFAULT NULL,
  `numero` VARCHAR(191) NULL DEFAULT NULL,
  `cidade` VARCHAR(191) NULL DEFAULT NULL,
  `uf` VARCHAR(191) NULL DEFAULT NULL,
  `bairro` VARCHAR(191) NULL DEFAULT NULL,
  `complemento` VARCHAR(191) NULL DEFAULT NULL,
  `longitude` VARCHAR(191) NULL DEFAULT NULL,
  `latitude` VARCHAR(191) NULL DEFAULT NULL,
  `last_login` DATETIME NULL DEFAULT NULL,
  `last_connection` DATETIME NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `profissao` VARCHAR(191) NULL DEFAULT NULL,
  `last_name` VARCHAR(191) NULL DEFAULT NULL,
  `comosoube` INT NULL DEFAULT NULL,
  `como_conheceu` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_uuid_unique` (`uuid`),
  UNIQUE INDEX `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
