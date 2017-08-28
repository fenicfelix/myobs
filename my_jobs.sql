use bimsofts_jobs;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_myjobs.application_skills
CREATE TABLE IF NOT EXISTS `application_skills` (
  `application_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  KEY `FK_2d2ncnp0wokflinabu8top87x` (`skill_id`),
  KEY `FK_pmrlkualhssensddfqqgmg5md` (`application_id`),
  CONSTRAINT `FK_2d2ncnp0wokflinabu8top87x` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  CONSTRAINT `FK_pmrlkualhssensddfqqgmg5md` FOREIGN KEY (`application_id`) REFERENCES `job_applications` (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.application_skills: ~0 rows (approximately)
/*!40000 ALTER TABLE `application_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_skills` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`category_id`, `category_name`) VALUES
	(1, 'Information Technology'),
	(2, 'Software Development'),
	(3, 'Business Administration');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.employments_types
CREATE TABLE IF NOT EXISTS `employments_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.employments_types: ~6 rows (approximately)
/*!40000 ALTER TABLE `employments_types` DISABLE KEYS */;
REPLACE INTO `employments_types` (`type_id`, `type_name`) VALUES
	(1, 'Full Time'),
	(2, 'Part Time'),
	(3, 'Contract'),
	(4, 'Temporary'),
	(5, 'Seasonal'),
	(6, 'Internship');
/*!40000 ALTER TABLE `employments_types` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
REPLACE INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'User', 'General Users'),
	(2, 'Admin', 'Administrator');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` longtext,
  `sal_range_id` int(11) DEFAULT NULL,
  `date_posted` datetime DEFAULT NULL,
  `valid_through` datetime DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  KEY `FK_869fdaldt78y8xhcmkoofbdh` (`sal_range_id`),
  KEY `FK_e9r9vho9fad1lteoadciyda3h` (`type_id`),
  KEY `FK_60vy3h9hlwl1ajp272khjelic` (`category_id`),
  CONSTRAINT `FK_60vy3h9hlwl1ajp272khjelic` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  CONSTRAINT `FK_869fdaldt78y8xhcmkoofbdh` FOREIGN KEY (`sal_range_id`) REFERENCES `salary_ranges` (`sal_range_id`),
  CONSTRAINT `FK_e9r9vho9fad1lteoadciyda3h` FOREIGN KEY (`type_id`) REFERENCES `employments_types` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.jobs: ~3 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
REPLACE INTO `jobs` (`job_id`, `title`, `description`, `sal_range_id`, `date_posted`, `valid_through`, `type_id`, `category_id`) VALUES
	(1, 'Nairobi Office Manager', '<p><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;">Kiva (kiva.org) is a mission driven technology company. We run a global marketplace platform for crowd-funded micro-loans that serves the impoverished and financially excluded. Our company combines the culture and technological passion of an internet start-up with the compassion and empathy of a non-profit to address poverty at global scale. We aim to drive social impact and enable opportunity while providing a borrower-to-lender connection: “Loans that change lives.” In just 10 years, we have raised over a billion dollars in loan capital for 2 million+ borrowers in over 85 countries. Our lenders fund over $10 million in loans every month. </span><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;">The Nairobi Office Manager will be key to making Kiva’s Nairobi office an awesome place to work by creating a highly functioning work environment that allows our passionate employees and volunteers to thrive and fulfill the mission of the organization. The Office Manager will create, implement, and maintain systems, procedures, and events that help drive seamless day-to-day operations and continuous improvement in how we manage our office in Nairobi, Kenya. </span><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><strong style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);">Required Skills:</strong><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;"> </span><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;">The Nairobi Office Manager will report to Kiva’s Regional Representative based in Nairobi with a dotted line to the Director of HR who is based in San Francisco. </span><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;">Responsibilities of the role include, but are not limited to:</span></p><ul style="padding: 0px 0px 0px 32px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85);"><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">HR Support: Support the HR needs of the Nairobi office, including assisting with processing of work permit/visa requirements, alien cards, and ensuring timely submission and follow-up as needed as well as hiring and recruitment support.</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Facilities Manager: Manage facility and office management issues including but not limited to scheduling of office maintenance and utilities services; act as liaison between our office vendors, building managers and janitorial staff; manage required government license payments</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Receptionist: Welcome office visitors and manage guest arrivals to the Nairobi office; handle all inquiries and phone calls, directing inquiries to appropriate staff; manage office mail</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Event Planner/Culture Keeper: Organize and assist with company events and contribute to our office culture and environment; support the onboarding of new hires.</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Security and Safety Officer: Support security procedures to ensure security and safety within the office; coordinating security trainings for new hires and existing staff members,manage staff and volunteer access to office facilities</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Organizer: Ensure the Kiva office is kept in a clean and orderly fashion</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Procurement: Manage office budget and procurement of office supplies, food and drinks, equipment, and furniture; manage inventory and record-keeping of fixed assets; verify receipt of supply and process invoices; manage petty cash</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Travel and Scheduling Wizard: Coordinate meetings as needed (e.g. scheduling conference rooms, coordinating food and drink, other logistics of larger events); assist staff with travel arrangements and travel expense management</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Other duties as assigned</li></ul><p><strong style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);">Required Experience</strong><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;"></span></p><ul style="padding: 0px 0px 0px 32px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85);"><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Bachelor\'s degree required</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Minimum of 2 years of previous professional experience</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Strong computer skills including Google applications, Microsoft Word, Excel, PowerPoint, and other commonly used software/web applications</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Excellent organizational skills, attention to detail; ability to work under pressure and juggle multiple tasks and projects</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Proven ability to maintain professionalism when dealing with confidential issues</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Positive presence, great interpersonal skills, business maturity, excellent oral and written communication skills, proven team player</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Ability to take calls at night on occasion (ie. twice per month) to communicate with Kiva’s HQ in San Francisco</li></ul><p><span style="color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 15px;">Because applications for this role will be reviewed on a rolling basis, you are encouraged to submit your application as soon as possible. </span><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"><em style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);">A diverse and inclusive workplace where we learn from each other is an integral part of Kiva\'s culture. We actively welcome people of different backgrounds, experiences, abilities and perspectives. We are an equal opportunity employer and a great place to work. Join us and help us achieve our mission!</em><br></p>', 1, '2017-08-25 16:28:48', '2018-03-09 00:00:00', 1, 1),
	(2, 'Software Development-Lead Facilitator', '<h2 style="padding: 0px; margin-bottom: 16px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 27px; border: 0px; font-variant-ligatures: no-common-ligatures; font-variant-numeric: inherit; font-stretch: inherit; font-size: 20px; vertical-align: baseline; color: rgb(13, 13, 13); font-feature-settings: \'liga\' 0, \'clig\' 0;"><strong style="color: rgb(64, 64, 64); font-family: inherit; font-size: 15px; padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; vertical-align: baseline;">Summary:</strong><br></h2><div class="jobDescriptionContent desc " style="padding: 0px; margin: 0px 0px 24px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(64, 64, 64);"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;">Do you have the potential, skills, and desire to become one of the top 10% Technology Leaders in the world?&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;">At Andela, we believe that Technology Leaders are defined by their ability to model, capture, and transfer the mindset and best practices of their craft to any technology professional from entry level developers to senior software engineers.&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;">In this role you will nurture that expertise by daily investing in the next generation of African technology leaders to gain the skills needed to be globally employable software developers.&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;"><strong style="padding: 0px; margin: 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; vertical-align: baseline;">Role-specific Responsibilities:</strong><ul style="padding: 0px 0px 0px 32px; margin-top: 5px; margin-right: 0px; margin-left: 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Drive teams of software developers (junior and senior) to rapidly develop great software products</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Inspire and Mentor aspiring Software Developers and Software Development Learning Facilitators</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Support the learning and professional development of dozens of Africa\'s most talented software developers every day</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Deliver actionable feedback and support multiple learners to grow significantly</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Drive creative solutions that improve the standard of our software products and learning programs</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Model Technical Leadership that other Facilitators can look up to and learn from</li></ul><strong style="padding: 0px; margin: 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; vertical-align: baseline;">Andelan Responsibilities:</strong><ul style="padding: 0px 0px 0px 32px; margin-top: 5px; margin-right: 0px; margin-left: 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Take ownership of our vision and help us innovate, grow, and thrive as a department and an organization</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Collaboratively and passionately deliver excellent work with integrity everyday</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Continuously level up your own skills and grow with the organization</li></ul><strong style="padding: 0px; margin: 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; vertical-align: baseline;">Qualifications:</strong><ul style="padding: 0px 0px 0px 32px; margin-top: 5px; margin-right: 0px; margin-left: 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">The ideal candidate for the role MUST have experience with the following:</li><ul style="padding: 0px 0px 0px 32px; margin: 5px 0px 10px 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style: disc;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Minimum 4 years working experience (or equivalent experience with multiple professional software development product teams) in Full-stack Software Development</li><ul style="padding: 0px 0px 0px 32px; margin: 5px 0px 10px 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style: disc;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">JS (Node/Angular/Meteor/React)</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Python (Flask/Django)</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Ruby (Rails)</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Mobile Development (Android/iOS)</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">PHP</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Go</li></ul><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Experience with Agile Software Development Techniques and Tools</li><ul style="padding: 0px 0px 0px 32px; margin: 5px 0px 10px 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style: disc;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">SCRUM/Kanban/Extreme Programming</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Trello/Pivotal Tracker/Zenhub</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Version Control (Github/Bitbucket)</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">TDD</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Continuous Integration</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Docker/Vagrant</li></ul><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Leading teams to build and deploy Professional Software Products</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Relational/Business/People/Soft Skills experience</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">EPIC Values alignment</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Demonstrable commitment to the learning &amp; development of people and technology</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">The ability to learn new things fast whilst delivering value on it simultaneously</li></ul></ul><ul style="padding: 0px 0px 0px 32px; margin-top: 5px; margin-right: 0px; margin-left: 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Other desirable skills that it would be nice for an ideal candidate to have experience in include:</li><ul style="padding: 0px 0px 0px 32px; margin: 5px 0px 10px 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style: disc;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Software Development Instructional Design</li><ul style="padding: 0px 0px 0px 32px; margin: 5px 0px 10px 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style: disc;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Curriculum design</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Program development</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Setup Workshops, Bootcamps, Developer Groups or Forums</li></ul><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Mentorship or Coaching in Software Engineering</li><ul style="padding: 0px 0px 0px 32px; margin: 5px 0px 10px 20px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style: disc;"><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Facilitated learning in a structured learning environment</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Mentored or coached upcoming developers in a structured or unstructured setting</li><li style="padding: 0px; margin: 12px 0px 5px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 22px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Spoke at Tech Forums or workshops</li></ul></ul></ul><strong style="padding: 0px; margin: 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; vertical-align: baseline;">Interested?</strong><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1em;">If the above sounds like an exciting role to you, please tell us why you believe youre a good fit and well be in touch.</div>', 1, '2017-08-25 17:26:41', '2018-10-09 00:00:00', 1, 2),
	(3, 'Finance Officer', '<div style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);"><strong style="padding: 0px; margin: 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; vertical-align: baseline;">Qatar Airways</strong>&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;">Welcome to a world where ambitions fly high&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;">From experienced pilots to dynamic professionals embarking on new careers, Qatar Airways is searching for talented individuals to join our award-winning team.&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;">We take pride in our people—a dynamic and culturally diverse workforce is essential to why we are one of the finest and fastest growing airlines in the world.&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;">We offer competitive compensation and benefit packages.</div><p><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"></p><div style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);">About Your Job:&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;">As a part of your Principle Accountabilities, you will assist in preparing schedules and reconciliations to ensure station trial balance is checked and major balance sheet accounts are reconciled, preparation of budgets, cash flows and audit reports and also assist in overseeing that company is in line with all government and internal statutory deductions and taxes. You will have to ensure that payment processing is in line with QR internal policies and strict adherence to credit terms and payment deadlines are followed, ensure receivable’s timely management, debtors aging is in line with acceptable aging buckets. You will also ensure that the financial statements are supported by comprehensive working sheets/ schedules/statements/aging analyses and provide relevant business support to other departments in the station</div><p><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"></p><div style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);">About You:&nbsp;<br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;"><br style="padding: 0px; margin: 0px; -webkit-font-smoothing: antialiased; line-height: 1.4em;">To be successful in this role you must have a Bachelor’s degree in Commerce, accounting, finance and any other related field, CPA, ACCA is an added advantage. You will need a minimum of 3 Years of job-related experience in airline accounting and a working knowledge of financial accounting. You should have experience in use of any accounting package, preferably Oracle ERP and a basic knowledge of either Passenger or Cargo Revenue accounting. You must be able to demonstrate the ability to analyse and make improvements to business functions and processes to achieve organisational goals as well as the ability to coordinate actions, activities and prioritise tasks. You should have Strong analytical, interpersonal and coordination skills.</div><p><br style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; color: rgb(85, 85, 85); font-size: 15px;"></p><div style="padding: 0px; margin: 0px; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; vertical-align: baseline; color: rgb(85, 85, 85);">Note: you will be required to attach the following:<ul style="padding: 0px 0px 0px 32px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;"><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Resume / CV</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Copy of Passport</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">NOC (Qatar Airways Group Employees Only)</li><li style="padding: 0px; margin: 12px 0px; font-family: inherit; -webkit-font-smoothing: antialiased; line-height: 1.4em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; vertical-align: baseline;">Copy of Highest Educational Certificate</li></ul></div>', 1, '2017-08-25 17:38:17', '2019-05-09 00:00:00', 1, 3);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.job_applications
CREATE TABLE IF NOT EXISTS `job_applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `other_names` varchar(60) DEFAULT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cover_letter` longtext,
  `attachment` varchar(200) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `date_applied` datetime DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  KEY `FK_jgx5cl43n4nf40s0yunb3s471` (`job_id`),
  KEY `FK_b62hhf1cisqog6gxxl80egn4w` (`status_id`),
  CONSTRAINT `FK_b62hhf1cisqog6gxxl80egn4w` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  CONSTRAINT `FK_jgx5cl43n4nf40s0yunb3s471` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.job_applications: ~1 rows (approximately)
/*!40000 ALTER TABLE `job_applications` DISABLE KEYS */;
REPLACE INTO `job_applications` (`application_id`, `job_id`, `surname`, `other_names`, `phone_number`, `email`, `cover_letter`, `attachment`, `status_id`, `date_applied`) VALUES
	(1, 1, 'Nyabwari', 'Felix Ogucha', '0723293349', 'fenicfelix@gmail.com', '<p>Dear hiring manager,</p><p>I have searched all over for a good code for uploading an mp3 or similar file to a php server and have tested over 10 samples but none has been successful so far. Most codes I have checked out are either full of bugs or use outdated libraries.</p><p>I would appreciate if anyone has a truly working code sample. Possibly one that uses volley or a similar library. Would appreciate any help or some code that points me in the right direction.</p><p>Thanks</p>', 'Form_34A_DALALEKUTUK.pdf', 1, '2017-08-26 00:09:44');
/*!40000 ALTER TABLE `job_applications` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.job_skills
CREATE TABLE IF NOT EXISTS `job_skills` (
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  KEY `FK_6w0fxq6pk4f5lu6skfk8uwvan` (`skill_id`),
  KEY `FK_m4p6swqq04b7pat58kr1sej52` (`job_id`),
  CONSTRAINT `FK_6w0fxq6pk4f5lu6skfk8uwvan` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  CONSTRAINT `FK_m4p6swqq04b7pat58kr1sej52` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.job_skills: ~7 rows (approximately)
/*!40000 ALTER TABLE `job_skills` DISABLE KEYS */;
REPLACE INTO `job_skills` (`job_id`, `skill_id`) VALUES
	(2, 3),
	(2, 1),
	(2, 2),
	(1, 4),
	(1, 6),
	(1, 7),
	(1, 5);
/*!40000 ALTER TABLE `job_skills` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.salary_ranges
CREATE TABLE IF NOT EXISTS `salary_ranges` (
  `sal_range_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `min_salary` double DEFAULT NULL,
  `max_salary` double DEFAULT NULL,
  PRIMARY KEY (`sal_range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.salary_ranges: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary_ranges` DISABLE KEYS */;
REPLACE INTO `salary_ranges` (`sal_range_id`, `title`, `min_salary`, `max_salary`) VALUES
	(1, 'Entry Level', 100000, 150000);
/*!40000 ALTER TABLE `salary_ranges` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.skills: ~7 rows (approximately)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
REPLACE INTO `skills` (`skill_id`, `name`) VALUES
	(1, 'MySQL'),
	(2, 'PHP'),
	(3, 'JAVA'),
	(4, 'CISCO'),
	(5, 'VPN'),
	(6, 'Switching and Routing'),
	(7, 'Ubuntu');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.status
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) NOT NULL,
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `UK_ikty98aye7nunxe4f25a39efl` (`status_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.status: ~3 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
REPLACE INTO `status` (`status_id`, `status_name`) VALUES
	(3, 'Interviewing'),
	(1, 'Received'),
	(2, 'Rejected');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `active`, `username`, `password`, `salt`, `created_on`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `ip_address`, `last_login`, `remember_code`) VALUES
	(1, 'Felix', 'Ogucha', 'fenicfelix@gmail.com', '0723293349', 1, 'fenicfelix@gmail.com', '$2y$08$BU775eDw8q9iuiem7FglmeJTVl3OUjgJCYOojNx9DNFJb79xXqvHG', NULL, 1486707742, NULL, NULL, NULL, '', 1503783785, NULL),
	(2, 'Busara', 'Center', 'busara@center.org', '0712345678', 1, 'busara@center.org', '$2y$08$BU775eDw8q9iuiem7FglmeJTVl3OUjgJCYOojNx9DNFJb79xXqvHG', NULL, 1486707742, NULL, NULL, NULL, '', 1503693489, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table db_myjobs.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  KEY `FK_jvdr41indxtprxfl9p7mkc1we` (`group_id`),
  KEY `FK_rha2nuvev321imtminyssypq` (`user_id`),
  CONSTRAINT `FK_jvdr41indxtprxfl9p7mkc1we` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `FK_rha2nuvev321imtminyssypq` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_myjobs.users_groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
REPLACE INTO `users_groups` (`user_id`, `group_id`) VALUES
	(1, 2),
	(2, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;


-- Dumping structure for view db_myjobs.view_all_jobs
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_all_jobs` (
	`job_id` INT(11) NOT NULL,
	`job_title` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`sal_range` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`min_salary` DOUBLE NULL,
	`max_salary` DOUBLE NULL,
	`date_posted` DATETIME NULL,
	`valid_through` DATETIME NULL,
	`type_name` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`category_id` INT(11) NULL,
	`category_name` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view db_myjobs.view_all_jobs
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_all_jobs`;
CREATE VIEW `view_all_jobs` AS select a.job_id, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, a.category_id, d.category_name
from jobs a
join salary_ranges b on (a.sal_range_id = b.sal_range_id)
join employments_types c on (a.type_id = c.type_id)
join categories d on (a.category_id = d.category_id) where a.valid_through > now() order by a.date_posted DESC ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
