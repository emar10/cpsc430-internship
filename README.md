{\rtf1\ansi\ansicpg1252\cocoartf1671\cocoasubrtf500
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\margl1440\margr1440\vieww13540\viewh12640\viewkind0
\pard\tx720\tx1440\tx2160\tx2880\tx3600\tx4320\tx5040\tx5760\tx6480\tx7200\tx7920\tx8640\pardirnatural\partightenfactor0

\f0\fs24 \cf0 # Internship Website\
The internship website is a website for University of Mary Washington computer science students to use to look for future internship opportunities as well as post reviews of internships they have completed.\
\
## Installation\
\
1.Creating your own: Install Debian 10 on Google Cloud\
Create a free google cloud account.\
Create a new google cloud project.\
Create a VM instance with the correct details (desired name, region, zone)\
Select the correct machine type (0.6 GB Memory)\
Select Boot Disk: Debian GNU/ Linux 9 \
Allow full access to all cloud API\'92s\
Firewall: Check allow http traffic & allow https traffic\
Click Create and your VM will be generated.\
Reserve your IP address: go to VPC Network -> External IP addresses -> reserve\
Install MariaDB:\
Run the following commands to update your Debian 10 instance and install:\
$ sudo apt update\
$ sudo apt install mariadb-server\
$ sudo mysql_secure_installation\
You will be prompted to input information on the database you\'92d like to create, choose a user and password\
Run the given database.sql script with the following command:\
$ mysql --host=localhost --user=your_username --password=your_password -e \'93database.sql\'94\
Set up Apache Web Server:\
$ sudo apt install -y apache2 apache2-utils\
$ sudo apache2 -v\
$ systemct1 status apache2\
On your VM, install php with the following commands:\
$ sudo apt update && sudo apt -y upgrade\
$ sudo apt -y install php php-common\
$ sudo apt -y install php-cli php-fpm php-json php-pdo php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath\
Install leaflet onto the VM: $ sudo-apt install leaflet\
Clone this repository by using git clone and you are all set up!\
\
2. Using the existing VM with ssh: (if added to the project)\
Log into google cloud.\
Click on google console.\
Click on computer engine -> VM Instances\
Click ssh on the cpscinternships instance and a terminal window will pop up.\
From there run the following commands to view directories:\
$ cd /var/www/internships/html \
Here are the working php files for the website\
\
To log into the mariadb:\
Run:\
$ sudo mysql -u cpsc -p\
You\'92ll be prompted for a password, the password is 430\
\
#Authors\
Jessica Thomas, Michael Windsor, Kevin Gardella\
}