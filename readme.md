# Hướng dẫn cài đặt hệ thống trên môi trường linux.

## 1. Cài đặt apache
Chạy lần lượt các lệnh sau:
> sudo apt update

> sudo apt-get install apache2

Sau khi cài đặt bạn có thể start và enable Apache bằng cách:
> systemctl start apache2

> systemctl enable apache2
## 2. Cài đặt PHP
Thêm PHP vào khi PPA:
> sudo add-apt-repository ppa:ondrej/php

> sudo apt-get update

Chạy lệnh sau để cài PHP 7.2 và các extension cần thiết:
> apt install php7.2 php7.2-xml php7.2-mbstring php7.2-mysql php7.2-json php7.2-curl php7.2-cli php7.2-common php7.1-mcrypt php7.2-gd libapache2-mod-php7.2 php7.2-zip

> sudo nano /etc/php/7.2/apache2/php.ini

Tìm và sửa lại giống như sau:

memory_limit = 256M

upload_max_filesize = 64M

cgi.fix_pathinfo=0

## 3. Cài đặt MySql
Chạy lệnh sau:
> sudo apt-get install mysql-server

> sudo mysql_secure_installation

> sudo mysql

Nhập tiếp:
> SELECT user,authentication_string,plugin,host FROM mysql.user;

> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';

> FLUSH PRIVILEGES;

> CREATE DATABASE 'DB_NAME';

> exit

## 4. Cài đặt Composer và Laravel
### 4.1. Cài đặt Composer
> curl -sS https://getcomposer.org/installer | php

>  mv composer.phar /usr/bin/composer
### 4.2. Cài đặt Laravel
Các bạn dùng composer để cài hoặc có thể dùng Git để clone source code vào đường dẫn: /var/www/html
> cd /var/www/html

> git clone https://github.com/sondn-github/thesis/

> cd thesis/ 

> composer install

> cp .env-example .env

> php artisan key:generate

Sau đó sửa lại như file .env cho phù hợp máy của bạn. Ví dụ:
> APP_NAME=Laravel
>
> APP_ENV=local
>
> APP_KEY=base64:rZIXoi5Z+RDTpYs0+9EaYCWvULop2HEgnYWjr0tEE3g=
>
> APP_DEBUG=true
>
> APP_URL=http://localhost
>
> 
> LOG_CHANNEL=stack
>
> 
> DB_CONNECTION=mysql
>
> DB_HOST=127.0.0.1
>
> DB_PORT=3306
>
> DB_DATABASE=thesis
>
> DB_USERNAME=root
>
> DB_PASSWORD=sonduong
>
> 
> BROADCAST_DRIVER=log
>
> CACHE_DRIVER=file
>
> SESSION_DRIVER=file
>
> SESSION_LIFETIME=120
>
> QUEUE_DRIVER=sync
>
> 
> REDIS_HOST=127.0.0.1
>
> REDIS_PASSWORD=null
>
> REDIS_PORT=6379
>
> 
> MAIL_DRIVER=smtp
>
> MAIL_HOST=smtp.gmail.com
>
> MAIL_PORT=587
>
> MAIL_USERNAME=sondn.test@gmail.com
>
> MAIL_PASSWORD=dhqvhupxdghaacmn
>
> MAIL_ENCRYPTION=tls
>
> MAIL_FROM_ADDRESS=sondn.test@gmail.com
>
> MAIL_FROM_NAME=Academics
>
> 
> PUSHER_APP_ID=
>
> PUSHER_APP_KEY=
>
> PUSHER_APP_SECRET=
>
> PUSHER_APP_CLUSTER=mt1
>
> 
> MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
>
> MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

# 5. Cầu hình apache.
Chạy lệnh sau:
> sudo nano /etc/apache2/sites-available/000-default.conf

Tìm dòng DocumentRoot /var/www/html sửa lại thành như sau:
> DocumentRoot /var/www/html/thesis/public

Sau đó lưu lại rồi restart lại Apache nhé:
> systemctl restart apache2

# 6. Truy cập.
Đi tới đường link http://localhost
