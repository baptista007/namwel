<?php

final class SqlTables {
    const tbl_user = "tbl_user";
    const tbl_client = "tbl_client";
    const tbl_plan = "tbl_plan";
    const tbl_reference = "tbl_reference";
    const tbl_plan_file = "tbl_plan_file";
    const tbl_testimonial = "tbl_testimonial";
    const tbl_service = "tbl_service";
    const tbl_service_file = "tbl_service_file";
    const tbl_news = "tbl_news";
    const tbl_news_file = "tbl_news_file";
    const tbl_banner = "tbl_banner"; 
    const tbl_statistics = "tbl_statistics";
    const tbl_gallery_item = "tbl_gallery_item";
    const tbl_product = "tbl_product";
    const tbl_product_file = "tbl_product_file";
    const tbl_core = "tbl_core";
    const tbl_product_feature = "tbl_product_feature";
    const tbl_product_testimonial = "tbl_product_testimonial";
    const tbl_product_cta = "tbl_product_cta";
    const tbl_faq = "tbl_faq";
    
    const tbl_driver = "tbl_driver";
    const tbl_driver_file = "tbl_driver_file";
    const tbl_vacancy = "tbl_vacancy";
}

final class InputType {

    const text = 1;
    const password = 2;
    const submit = 3;
    const hidden = 4;
    const button = 5;
    const checkbox = 6;
    const date = 7;
    const number = 8;
    const radio = 9;
    const select = 10;
    const textarea = 11;
    const datetime = 12;
    const datemonth = 13;
    const color = 14;
    const checkgroup = 15;
    const radiogroup = 16;
    const file = 17;
    const filter_date_from_to = 18;
    const filter_year_from_to = 19;

}

final class FieldOptions {
    const status = 1;
    const yes_no = 2;
    const car_body_type = 3;
}

final class AccountStatus {

    const active = 1;
    const inactive = 9;

}

final class CarBodyType {
    const sedan = 1;
    const suv = 2;
    const pickup_truck = 3;
}

final class Status {

    const active = 1;
    const pending_review = 2;
    const inactive = 3;

}

final class UserAccountType {

    const backoffice = 1;
    const bidder = 2;

}

final class EmailStatus {

    const verified = 1;
    const unverified = 2;

}

final class YesNo {

    const yes = 1;
    const no = 2;

}

final class PaymentStatus {
    const verified = 1;
    const unverified = 2;
}

final class UserStatus {
    const active = 1;
    const inactive = 2;
}

final class FileType {
    const nationa_id = 1;
    const drivers = 2;
    const criminal_clearance = 3;
    const passport_photo = 4;
    const logo = 5;
    
}

final class MediaType {
    const image = 1;
    const video = 2;
}

class Getters {

    public static $allowed_extensions = array(
        'jpeg',
        'jpg',
        'png',
        'pdf',
        'doc',
        'docx',
        'xlsx',
        'txt',
        'ppt',
        'pptx',
    );
    
    public static $default_upload_config = array(
        'maxSize' => CUSTOM_MAX_UPLOAD_SIZE,
        'limit' => 1,
        'extensions' => array(
            'jpeg',
            'jpg',
            'png',
            'pdf',
            'doc',
            'docx',
            'xlsx',
            'txt',
            'ppt',
            'pptx',
            'mp4'
        ),
        'uploadDir' => UPLOAD_FILE_DIR,
        'required' => false,
        'returnfullpath' => true,
        'removeFiles' => true
    );

    public static $file_type_value_label = [
        FileType::logo => 'Logo',
    ];

}
