# Sử dụng hình ảnh PHP 7.4
FROM php:7.4-fpm

# Cài đặt các phụ thuộc hệ thống
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Xóa bộ nhớ cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Cài đặt các tiện ích mở rộng PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài đặt Node.js
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Đặt thư mục làm việc
WORKDIR /var/www

# Sao chép ứng dụng hiện tại vào thư mục /var/www
COPY . /var/www

# Cài đặt các gói phụ thuộc Composer và npm
RUN composer install
RUN npm install

# Biên dịch tài nguyên
RUN npm run production

# Khởi động máy chủ PHP
CMD ["php-fpm"]
