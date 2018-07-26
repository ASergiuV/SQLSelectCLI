#!/usr/bin/env bash
!/usr/bin/env bash

echo "run script"
echo "Test --help"
#./sql.php --help --select Name
echo ""

echo "Select Name from users where Name>Moldovan"
php sql.php --select Name --from users.csv --where "Name>Moldovan"

echo "Select Name from users where Name<Iancu"
php sql.php --select Name --from users.csv --where "Name<Iancu"

echo "Select Name from users where Name<>abc"
php sql.php --select Name --from users.csv --where "Name<>abc" --unique Name --multi-sort Name,Age --multi-sort-dir asc,desc --power-values "Age 2"


echo "Select Name from users where ID>5 -unique"
php sql.php --select Name --from users.csv --where "ID>5" --unique Name --multi-sort Name,Age --multi-sort-dir asc,desc --power-values "Age 2"

php sql.php --select '*',Name --from users.csv --output 'screen' --where "Name<>Abrudean" --lowercase-column "Surname" --multi-sort Name,Age --multi-sort-dir asc,desc --power-values "Age 2" --uppercase-column "Name"


php sql.php --select '*',Name --from users.csv --output 'screen' --where "Name<>Abrudean" --lowercase-column "Surname" --multi-sort Name,Age --multi-sort-dir asc,desc --power-values "Age 2" --uppercase-column "Name"

php sql.php --select '*,Name' --from users.csv --output 'screen' --where "name<>Abrudean" --lowercase-column "surname" --multi-sort Name,Age --multi-sort-dir asc,desc --power-values "age 2" --uppercase-column "name"


php sql.php --select '*' --from users.csv --output 'screen' --where "Name<>Sarig" --power-values "Age 2" --aggregate-list Name --aggregate-list-glue '*'

php sql.php --select '*' --from users.csv --aggregate-sum 'ID' --output 'screen' --where "Name<>Sarig" --lowercase-column "Surname" --unique 'Name' --multi-sort 'Name,Age' --multi-sort-dir 'asc,desc' --power-values "Age 2" --uppercase-column "Name"


php sql.php --select '*' --from users.csv --aggregate-sum 'ID' --output 'screen' --lowercase-column "Surname" --unique 'Name' --multi-sort 'Name,Age' --multi-sort-dir 'asc,desc' --power-values "Age 2" --uppercase-column "Name"

php sql.php --from ceva --multi-sort dsa --multi-sort-dir as --output csv --sort-column name --sort-mode natural --sort-direction des
php sql.php -from
php sql.php from

php sql.php --select Name --from users.csv --output 'screen' --where "Nametabc" --lowercase-column "Surname" --unique Name --multi-sort Name,Age --multi-sort-dir asc,desc --power-values "Age 2" --uppercase-column "Name"

echo "finish run"
