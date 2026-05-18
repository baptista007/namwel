-- Guaranteed Trips table
-- Run this against your Namwel database to enable the Guaranteed Trips feature.

CREATE TABLE IF NOT EXISTS `tbl_guaranteed_trip` (
    `id`               INT           NOT NULL AUTO_INCREMENT,
    `title`            VARCHAR(255)  NOT NULL,
    `subtitle`         VARCHAR(255)  DEFAULT NULL,
    `destination`      VARCHAR(255)  DEFAULT NULL,
    `departure_date`   DATE          DEFAULT NULL,
    `end_date`         DATE          DEFAULT NULL,
    `duration`         VARCHAR(100)  DEFAULT NULL,
    `price`            DECIMAL(10,2) DEFAULT 0.00,
    `price_currency`   VARCHAR(10)   DEFAULT 'USD',
    `price_label`      VARCHAR(255)  DEFAULT NULL,
    `spots_available`  TINYINT       DEFAULT 0,
    `spots_left`       TINYINT       DEFAULT 0,
    `description`      TEXT          DEFAULT NULL,
    `highlights`       TEXT          DEFAULT NULL,
    `includes_text`    TEXT          DEFAULT NULL,
    `cover_image`      VARCHAR(500)  DEFAULT NULL,
    `badge`            VARCHAR(100)  DEFAULT 'Guaranteed',
    `status`           TINYINT       NOT NULL DEFAULT 1,
    `created_date`     TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified_date`    TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
