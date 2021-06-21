#!/bin/bash
user='root'
passoword='123456'

files=/docker-entrypoint-initdb.d/sql/*

for file in $files
do
    mysql -u $user --password="$passoword" < $file
done
