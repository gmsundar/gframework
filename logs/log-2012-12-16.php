<?php  if ( ! defined('AppRoot')) exit('No direct script access allowed'); ?>

DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT TABLE_NAME,TABLE_TYPE,TABLE_ROWS,AUTO_INCREMENT,CREATE_TIME  from information_schema.TABLES where  TABLE_SCHEMA='gbase'  order by TABLE_NAME;
DEBUG - 2012-12-16 09:06:56 --> SQL : select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE,extra,COLUMN_KEY from information_schema.COLUMNS c  where c.TABLE_NAME='test_ui' and c.TABLE_SCHEMA='gbase' order by c.ORDINAL_POSITION;
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='id'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='text'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='select_foregin'
DEBUG - 2012-12-16 09:06:56 --> SQL : select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE,extra,COLUMN_KEY from information_schema.COLUMNS c  where c.TABLE_NAME='test_ui_child' and c.TABLE_SCHEMA='gbase' order by c.ORDINAL_POSITION;
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui_child' and TABLE_SCHEMA='gbase' and COLUMN_NAME='id'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui_child' and TABLE_SCHEMA='gbase' and COLUMN_NAME='data'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='number'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='date'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='check_box'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='radio'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='photo'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='read_only'
DEBUG - 2012-12-16 09:06:56 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='select_array'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT TABLE_NAME,TABLE_TYPE,TABLE_ROWS,AUTO_INCREMENT,CREATE_TIME  from information_schema.TABLES where  TABLE_SCHEMA='gbase'  order by TABLE_NAME;
DEBUG - 2012-12-16 09:08:40 --> SQL : select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE,extra,COLUMN_KEY from information_schema.COLUMNS c  where c.TABLE_NAME='test_ui' and c.TABLE_SCHEMA='gbase' order by c.ORDINAL_POSITION;
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='id'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='text'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='select_foregin'
DEBUG - 2012-12-16 09:08:40 --> SQL : select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE,extra,COLUMN_KEY from information_schema.COLUMNS c  where c.TABLE_NAME='test_ui_child' and c.TABLE_SCHEMA='gbase' order by c.ORDINAL_POSITION;
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui_child' and TABLE_SCHEMA='gbase' and COLUMN_NAME='id'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui_child' and TABLE_SCHEMA='gbase' and COLUMN_NAME='data'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='number'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='date'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='check_box'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='radio'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='photo'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='read_only'
DEBUG - 2012-12-16 09:08:40 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='select_array'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT TABLE_NAME,TABLE_TYPE,TABLE_ROWS,AUTO_INCREMENT,CREATE_TIME  from information_schema.TABLES where  TABLE_SCHEMA='gbase'  order by TABLE_NAME;
DEBUG - 2012-12-16 09:12:55 --> SQL : select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE,extra,COLUMN_KEY from information_schema.COLUMNS c  where c.TABLE_NAME='test_ui' and c.TABLE_SCHEMA='gbase' order by c.ORDINAL_POSITION;
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='id'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='text'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='select_foregin'
DEBUG - 2012-12-16 09:12:55 --> SQL : select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE,extra,COLUMN_KEY from information_schema.COLUMNS c  where c.TABLE_NAME='test_ui_child' and c.TABLE_SCHEMA='gbase' order by c.ORDINAL_POSITION;
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui_child' and TABLE_SCHEMA='gbase' and COLUMN_NAME='id'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui_child' and TABLE_SCHEMA='gbase' and COLUMN_NAME='data'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='number'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='date'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='check_box'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='radio'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='photo'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='read_only'
DEBUG - 2012-12-16 09:12:55 --> SQL : SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='test_ui' and TABLE_SCHEMA='gbase' and COLUMN_NAME='select_array'