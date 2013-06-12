#!/bin/sh

# $Id: install.sh 163 2006-02-16 15:03:26Z shinobu $

psql mono -U postgres -f sql/Mono.table.sql
chmod 777 tmp
chmod 777 tmp/temporary_file
