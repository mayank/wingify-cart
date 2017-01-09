#!/bin/bash

mysqld_safe > /dev/null 2>&1 &
sleep 5
mysql -uroot -proot < sql/dump.sql
php -S localhost:8000 index.php
