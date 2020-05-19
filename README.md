# bloggi

使用laravel开发的简单的多用户博客系统

```
cd public
bower install
```

```
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `slug` varchar(255) DEFAULT NULL,
  `sid` varchar(255) DEFAULT NULL,
  `blog_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` longtext,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) DEFAULT NULL,
  `view` int DEFAULT '0',
  `sid` varchar(255) DEFAULT NULL,
  `blog_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;


CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `md5_passwd` varchar(255) DEFAULT NULL,
  `blog_freedomain` varchar(255) DEFAULT NULL,
  `blog_domain` varchar(255) DEFAULT NULL,
  `blog_name` varchar(255) DEFAULT NULL,
  `blog_logo` varchar(255) DEFAULT NULL,
  `createdtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_bio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;
```

```
cd public
php -S localhost:3000
```
