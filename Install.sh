sudo apt-get install pip -y
sudo apt-get install ffmpeg -y
sudo pip install pytz
sudo apt-get install apache2 -y
sudo apt-get install php7.4 libapache2-mod-php7.4 php7.4-mbstring php7.4-mysql php7.4-curl php7.4-gd php7.4-zip -y
sudo service apache2 restart
sudo apt-get install -y systemd
echo "---finished Downloads Moving Files"
echo "---Removing Old Files"
sudo rm -rf /etc/systemd/system/Bell-Timer-System.service
sudo rm -rf /etc/systemd/system/frpc.service
sudo rm -rf /etc/frp/frpc.ini
sudo rm -rf /usr/bin/frpc
echo "---Moving New Files"
sudo mv Bell-Timer-System.service /etc/systemd/system
echo "---Starting Systemctl"
sudo systemctl daemon-reload
sudo systemctl enable Bell-Timer-System.service
sudo systemctl start Bell-Timer-System.service
echo "---Moving Web files"
sudo rm -rf /var/www/html
sudo mv /etc/Bell-Timer-System/html /var/www/
sudo chown -R www-data /var/www/
echo "---Replacing ini"
sudo rm -rf /etc/php/7.4/cli/php.ini
sudo mv /etc/Bell-Timer-System/php.ini /etc/php/7.4/cli/
sudo service apache2 restart