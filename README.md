﻿# order menu basic
## docs: [toidicode.com](http://toidicode.com/sap-xep-menu-voi-jquery-softable-php-va-mysql-136.html)
## database 
```SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE `tb_menu` (
	`id` int(11) NOT NULL,
	`name` varchar(255) NOT NULL,
	`slug` varchar(255) NOT NULL,
	`numbers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `tb_menu` (`id`, `name`, `slug`, `numbers`) VALUES
(1, 'Trang chủ', '/', 4),
(2, 'Lập trình web', 'lap-trinh-web', 3),
(3, 'lập trình mobile', 'lap-trinh-mobile', 2),
(4, 'Sản phẩm', 'san-pham', 1);
ALTER TABLE `tb_menu`
ADD PRIMARY KEY (`id`);
ALTER TABLE `tb_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
```
