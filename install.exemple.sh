#!/bin/sh

ROOT_NAME=
ROOT_PASSWORD=

USER_NAME=
USER_PASSWORD=

DBNAME=
HOST=

SQL=$(cat<<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
DELETE FROM mysql.user WHERE user='$USER_NAME' AND host='$USER_NAME';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_NAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)

echo $SQL > tmp
mysql -u$ROOT_NAME -p$ROOT_PASSWORD < tmp
rm -f tmp

# php artisan make:migration create_student_table --create=students
# php artisan migrate:refresh --seed