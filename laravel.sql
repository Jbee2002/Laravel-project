CREATE DATABASE `laravel_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use laravel_project;

CREATE TABLE IF NOT EXISTS category (
  id INT primary key AUTO_INCREMENT,
  name VARCHAR(100) not null unique,
  status INT null default 0,
  created_at TIMESTAMP default current_timestamp(),
  updated_at date null 
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product (
  id INT primary key AUTO_INCREMENT,
  name VARCHAR(120) not null,
  price float not null,
  sale_price float null default 0,
  image varchar(200) not null,
  category_id int not null,
  quantity int,
  status tinyint default 0,
  description text null,
  created_at date default current_timestamp(),
  updated_at date null,
  foreign key (category_id) references category(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS customers (
  id INT primary key AUTO_INCREMENT,
  name VARCHAR(120) not null,
  email VARCHAR(200) not null unique,
  password VARCHAR(200) not null,
  phone VARCHAR(200) not null unique,
  address VARCHAR(200) not null,
  created_at date default current_timestamp(),
  updated_at date null
) ENGINE = InnoDB;

use laravel_project;
CREATE TABLE IF NOT EXISTS favorites (
  customer_id int not null,
  product_id int not null,
  created_at date default current_timestamp(),
  updated_at date null,
  foreign key (customer_id) references customers (id),
  foreign key (product_id) references product (id)
) ENGINE = InnoDB;