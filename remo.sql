CREATE TABLE pub_author(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pub_id int(11) NOT NULL,
    author_id int(11) NOT NULL,
    author_order int(2) NOT NULL ,
    isCorresponding TINYINT(1) NOT NULL
)
CREATE TABLE `Author`(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(20) NOT NULL,
    last_name varchar(20) NOT NULL
)
CREATE TABLE publication(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(128) NOT NULL,
    `type` tinyint(4) NOT NULL,
    pub_id varchar(11) NOT NULL,
    `year` varchar(4) NOT NULL,
    volumn varchar(10) NOT NULL,
    `page` varchar(20) NOT NULL
)
CREATE TABLE Journal(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(256) NOT NULL,
    isSCI tinyint(1) ,
    isEI tinyint(1) ,
    country varchar(20) NOT NULL
)
CREATE TABLE Conference(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(256) NOT NULL,
    conf_name varchar(256) NOT NULL,
    isEI tinyint(1) NOT NULL,
    venue varchar(128) NOT NULL,
    city varchar(50) NOT NULL,
    country varchar(50) NOT NULL,
    start_name date ,
    end_date date 
)
