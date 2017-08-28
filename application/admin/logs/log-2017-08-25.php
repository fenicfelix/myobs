<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-08-25 11:01:00 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 11:01:28 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 12:40:35 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 12:40:42 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 16:05:36 --> 404 Page Not Found: Auth/login
ERROR - 2017-08-25 16:07:38 --> 404 Page Not Found: Auth/login
ERROR - 2017-08-25 16:08:09 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 16:09:52 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 16:12:39 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 16:22:57 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 16:23:34 --> 404 Page Not Found: Admin/jobs
ERROR - 2017-08-25 16:30:31 --> 404 Page Not Found: Admin/job_applications
ERROR - 2017-08-25 16:35:04 --> Query error: Table 'db_myjobs.job_id' doesn't exist - Invalid query: SHOW COLUMNS FROM `job_id`
ERROR - 2017-08-25 16:37:53 --> Query error: Unknown column 'name' in 'field list' - Invalid query: SELECT *, name as sb068931c
FROM `job_skills`
JOIN `jobs` ON `job_skills`.`job_id` = `jobs`.`job_id`
WHERE `skill_id` = '1'
ORDER BY `jobs`.`name`
ERROR - 2017-08-25 16:38:47 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 16:39:09 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 16:45:17 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 16:45:39 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:03:18 --> Query error: Table 'db_myjobs.category' doesn't exist - Invalid query: SHOW COLUMNS FROM `category`
ERROR - 2017-08-25 17:03:35 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:04:58 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:05:31 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:09:24 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:26:39 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 17:27:42 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:29:10 --> Severity: Warning --> Creating default object from empty value D:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 1354
ERROR - 2017-08-25 17:38:16 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 19:17:53 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 22:28:26 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:28:49 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 22:35:50 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:36:03 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 22:39:32 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:39:37 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:40:20 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:41:26 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:41:48 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:42:12 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:42:37 --> 404 Page Not Found: Auth/images
ERROR - 2017-08-25 22:42:58 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 22:52:16 --> Severity: Notice --> Undefined variable: page_title E:\xampp\htdocs\2017\myjobs\application\admin\views\includes\template.php 21
ERROR - 2017-08-25 22:54:51 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 22:58:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = 
ERROR - 2017-08-25 22:59:21 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = images
ERROR - 2017-08-25 22:59:46 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = images
ERROR - 2017-08-25 23:00:24 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = images
ERROR - 2017-08-25 23:00:56 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = images
ERROR - 2017-08-25 23:01:53 --> Severity: Notice --> Undefined property: stdClass::$surname E:\xampp\htdocs\2017\myjobs\application\admin\views\view_application.php 17
ERROR - 2017-08-25 23:01:53 --> Severity: Notice --> Undefined property: stdClass::$other_names E:\xampp\htdocs\2017\myjobs\application\admin\views\view_application.php 17
ERROR - 2017-08-25 23:01:57 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = images
ERROR - 2017-08-25 23:05:41 --> Severity: Notice --> Undefined property: stdClass::$job_title E:\xampp\htdocs\2017\myjobs\application\admin\views\view_application.php 5
ERROR - 2017-08-25 23:05:45 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:06:32 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:07:40 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:10:48 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:11:43 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:13:49 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:14:26 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:17:05 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:17:20 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:17:49 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:18:34 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
from job_applications a
join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:20:22 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:21:14 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:21:23 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 23:22:34 --> Severity: Error --> Call to undefined function unset_read() E:\xampp\htdocs\2017\myjobs\application\admin\libraries\Grocery_CRUD.php 3797
ERROR - 2017-08-25 23:35:43 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:36:33 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:37:14 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:37:41 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 23:39:02 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:39:29 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:40:00 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:42:00 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:44:16 --> Severity: Notice --> Undefined variable: identity E:\xampp\htdocs\2017\myjobs\application\admin\views\auth\email\activate.tpl.php 3
ERROR - 2017-08-25 23:44:16 --> Severity: Notice --> Undefined variable: id E:\xampp\htdocs\2017\myjobs\application\admin\views\auth\email\activate.tpl.php 4
ERROR - 2017-08-25 23:44:16 --> Severity: Notice --> Undefined variable: activation E:\xampp\htdocs\2017\myjobs\application\admin\views\auth\email\activate.tpl.php 4
ERROR - 2017-08-25 23:45:34 --> Severity: Notice --> Undefined variable: identity E:\xampp\htdocs\2017\myjobs\application\admin\views\auth\email\forgot_password.tpl.php 3
ERROR - 2017-08-25 23:45:34 --> Severity: Notice --> Undefined variable: forgotten_password_code E:\xampp\htdocs\2017\myjobs\application\admin\views\auth\email\forgot_password.tpl.php 4
ERROR - 2017-08-25 23:49:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 3 - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = 
ERROR - 2017-08-25 23:49:28 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:51:34 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:51:52 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:54:28 --> 404 Page Not Found: Admin/images
ERROR - 2017-08-25 23:57:25 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:58:47 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:59:36 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
ERROR - 2017-08-25 23:59:50 --> Query error: Unknown column 'images' in 'where clause' - Invalid query: select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = images
