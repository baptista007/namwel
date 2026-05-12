-- Fleet / Vehicle table for Namwel Tours & Car Rentals
-- Run this once against your application database

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
    `id`                        INT            NOT NULL AUTO_INCREMENT,
    `make`                      VARCHAR(100)   NOT NULL,
    `model`                     VARCHAR(100)   NOT NULL,
    `year`                      SMALLINT       NOT NULL DEFAULT 2020,
    `body_type`                 TINYINT        NOT NULL DEFAULT 1  COMMENT '1=Sedan, 2=SUV, 3=Pickup/4x4',
    `seats`                     TINYINT        NOT NULL DEFAULT 5,
    `transmission`              ENUM('automatic','manual') NOT NULL DEFAULT 'automatic',
    `fuel_type`                 ENUM('petrol','diesel','hybrid') NOT NULL DEFAULT 'diesel',
    `price_per_day`             DECIMAL(10,2)  NOT NULL DEFAULT 0.00,
    `mileage`                   VARCHAR(50)    DEFAULT NULL,
    `description`               TEXT           DEFAULT NULL,
    `features`                  TEXT           DEFAULT NULL  COMMENT 'Comma-separated feature list',
    `cover_image`               VARCHAR(500)   DEFAULT NULL,
    `cover_image_original_name` VARCHAR(500)   DEFAULT NULL,
    `status`                    TINYINT        NOT NULL DEFAULT 1  COMMENT '1=Active, 3=Inactive',
    `created_at`                TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified_date`             TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
