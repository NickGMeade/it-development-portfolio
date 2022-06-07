#!/usr/bin/env bash
apt update
apt-get install -y apache2
apt-get install -y mysql-server # This will ask for a root password, I leave it blank.
apt-get install -y php

