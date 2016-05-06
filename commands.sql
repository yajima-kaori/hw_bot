create database check_bot;

use check_bot;

grant all on check_bot. * to testuser@localhost identified by '9999';

create table check_url(
  id int primary key auto_increment,
  url varchar(255),
  byte varchar(255),
  cheched_at datetime,
  updated_at datetime
);

insert into check_url(url) value('http://www.apple.com/');
insert into check_url(url) value('http://www.amazon.co.jp/');
insert into check_url(url) value('http://192.168.33.10/homework/bbs/index.php');
