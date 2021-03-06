SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

CREATE TABLE `auth_assignment` (

  `item_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,

  `user_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,

  `created_at` int(11) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `auth_item` (

  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,

  `type` smallint(6) NOT NULL,

  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,

  `rule_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,

  `data` blob DEFAULT NULL,

  `created_at` int(11) DEFAULT NULL,

  `updated_at` int(11) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES

('Access db', 2, 'Access db', NULL, NULL, 1577737693, 1577737693),

('Access db1', 2, 'Access db1', NULL, NULL, 1577737634, 1577737634),

('Access db2', 2, 'Access db2', NULL, NULL, 1578741528, 1578741528),

('Access db3', 2, 'Access db3', NULL, NULL, 1581581742, 1581581762),

('Access db4', 2, 'Access db4', NULL, NULL, 1581667052, 1581667052),

('Access db5', 2, 'Access db5', NULL, NULL, 1584401458, 1584401458),

('Access db6', 2, 'Access db6', NULL, NULL, 1584401458, 1584401458),

('Access db7', 2, 'Access db7', NULL, NULL, 1579035389, 1579035389),

('Access db8', 2, 'Access db8', NULL, NULL, 1579035389, 1579035389),

('Access db9', 2, 'Access db9', NULL, NULL, 1579035389, 1579035389),

('Access db10', 2, 'Access db10', NULL, NULL, 1579035389, 1579035389),

('Access paypalagreement', 2, 'Access the Paypal Agreement', NULL, NULL, 1577804284, 1577804284),

('Access Session', 2, 'Access Session', NULL, NULL, 1565127671, 1565209503),

('Access Sessiondetail', 2, 'Access Sessiondetail', NULL, NULL, 1565127753, 1565127753),

('admin', 1, 'Administrator of the first database  which serves to record all user data of the site. Users that are allowed to signup are designated a Manager role manually. ', NULL, NULL, 1577666562, 1584471479),

('Create Carousal', 2, 'Create Carousal', NULL, NULL, 1544661317, 1544661317),

('Create Company', 2, 'Create Company', NULL, NULL, 1512856530, 1549635086),

('Create Daily Clean', 2, 'Create Daily Clean', NULL, NULL, 1512856530, 1512856530),

('Create Daily Job Sheet', 2, 'Create Daily Job Sheet', NULL, NULL, 1512856530, 1512856530),

('Create Employee', 2, 'Create Employee', NULL, NULL, 1512856530, 1549631754),

('Create Gocardlesscustomer', 2, 'Create Gocardlesscustomer', NULL, NULL, 1564057944, 1564057944),

('Create House', 2, 'Create House', NULL, NULL, 1512856530, 1549631786),

('Create Instruction', 2, 'Create Instruction', NULL, NULL, 1549631630, 1549635056),

('Create Legal', 2, 'Create Legal', NULL, NULL, 1563032629, 1563032629),

('Create Mandate', 2, 'Create Mandate', NULL, NULL, 1564647598, 1564647598),

('Create Messagelog', 2, 'Create Messagelog', NULL, NULL, 1544660727, 1544660727),

('Create Messaging', 2, 'Create Messaging', NULL, NULL, 1544659806, 1544659991),

('Create Postalcode', 2, 'Create Postalcode', NULL, NULL, 1512856531, 1549634117),

('Create Street', 2, 'Create Street', NULL, NULL, 1512856530, 1512856530),

('Create Tax', 2, 'Create Tax', NULL, NULL, 1544662943, 1544662943),

('createItem', 2, 'Create item', NULL, NULL, 1577666562, 1577666562),

('Delete Carousal', 2, 'Delete Carousal', NULL, NULL, 1544661364, 1544661364),

('Delete Company', 2, 'Delete Company', NULL, NULL, 1512856530, 1512856530),

('Delete Daily Clean', 2, 'Delete Daily Clean', NULL, NULL, 1512856530, 1512856530),

('Delete Daily Job Sheet', 2, 'Delete Daily Job Sheet', NULL, NULL, 1512856530, 1512856530),

('Delete Employee', 2, 'Delete Employee', NULL, NULL, 1512856530, 1512856530),

('Delete House', 2, 'Delete House', NULL, NULL, 1512856530, 1512856530),

('Delete Instruction', 2, 'Delete Instruction', NULL, NULL, 1549634229, 1549634229),

('Delete Mandate', 2, 'Delete Mandate', NULL, NULL, 1564647708, 1564647708),

('Delete Messagelog', 2, 'Delete Messagelog', NULL, NULL, 1544660767, 1544660767),

('Delete Messaging', 2, 'Delete Messaging', NULL, NULL, 1544660079, 1544660079),

('Delete Postalcode', 2, 'Delete Postalcode', NULL, NULL, 1512856531, 1512856531),

('Delete Street', 2, 'Delete Street', NULL, NULL, 1512856531, 1549633538),

('Delete Tax', 2, 'Delete Tax', NULL, NULL, 1544662983, 1544662983),

('deleteItem', 2, 'Delete item', NULL, NULL, 1577666562, 1577666562),

('demo', 1, 'demo', NULL, NULL, 1584405564, 1584889800),

('Import Houses', 2, 'Import Houses', NULL, NULL, 1573842472, 1573842472),

('Manage Admin', 2, 'Manage Admin', NULL, NULL, 1577744346, 1577744346),

('Manage Basic', 2, 'Perform Basic Tasks', NULL, NULL, 1578419959, 1578419959),

('Manage Money', 2, 'Manage Money', NULL, NULL, 1546700864, 1546700864),

('manageRoles', 2, 'Manage Roles and Permissions', NULL, NULL, 1577666562, 1577666562),

('manageUsers', 2, 'Manage Users', NULL, NULL, 1577666562, 1577666562),

('Mdb0', 1, 'Manager of db', NULL, NULL, 1577738006, 1583578098),

('Mdb1', 1, 'Manager of db1', NULL, NULL, 1577738006, 1583578098),

('Mdb2', 1, 'Manager of db2', NULL, NULL, 1578741488, 1584409353),

('Mdb3', 1, 'Manager of db3', NULL, NULL, 1581581720, 1581666851),

('Mdb4', 1, 'Manager of db4', NULL, NULL, 1581666990, 1583577278),

('Mdb5', 1, 'Manager of db5', NULL, NULL, 1584401245, 1584471624),

('Mdb6', 1, 'Manager of db6', NULL, NULL, 1584401245, 1584471624),

('Mdb7', 1, 'Manager of db7', NULL, NULL, 1579035344, 1584471378),

('Mdb8', 1, 'Manager of db8', NULL, NULL, 1579035344, 1584471378),

('Mdb9', 1, 'Manager of db9', NULL, NULL, 1579035344, 1584471378),

('Mdb10', 1, 'Manager of db10', NULL, NULL, 1579035344, 1584471378),

('See Prices', 2, 'See Prices', NULL, NULL, 1583610917, 1583610917),

('Subscription Free Privilege', 2, 'A Paypal Subscription is Not Necessary For This User', NULL, NULL, 1580914633, 1580914876),

('support', 1, 'Create, update, delete all company specific data specific to designated company database. Mdb roles subservient to support role. ', NULL, NULL, 1577666562, 1584883604),

('Udb0', 1, 'Subcontractor of db', NULL, NULL, 1583583080, 1583583080),

('Udb1', 1, 'Subcontractor of db1', NULL, NULL, 1583583080, 1583583080),

('Udb2', 1, 'Subcontractor of db2', NULL, NULL, 1583583080, 1583583080),

('Udb3', 1, 'Subcontractor of db3', NULL, NULL, 1583578326, 1583580986),

('Udb4', 1, 'Subcontractor of db4', NULL, NULL, 1583577262, 1583581014),

('Udb5', 1, 'Subcontractor of db5', NULL, NULL, 1584402344, 1584471662),

('Udb6', 1, 'Subcontractor of db6', NULL, NULL, 1584402344, 1584471662),

('Udb7', 1, 'Subcontractor of db7', NULL, NULL, 1584402344, 1584471662),

('Udb8', 1, 'Subcontractor of db8', NULL, NULL, 1584402344, 1584471662),

('Udb9', 1, 'Subcontractor of db9', NULL, NULL, 1584402344, 1584471662),

('Udb10', 1, 'Subcontractor of db10', NULL, NULL, 1584402344, 1584471662),

('Update Carousal', 2, 'Update Carousal', NULL, NULL, 1544661341, 1544661341),

('Update Company', 2, 'Update Company', NULL, NULL, 1512856530, 1512856530),

('Update Daily Clean', 2, 'Update Daily Clean', NULL, NULL, 1512856530, 1512856530),

('Update Daily Job Sheet', 2, 'Update Daily Job Sheet', NULL, NULL, 1512856530, 1512856530),

('Update Employee', 2, 'Update Employee', NULL, NULL, 1512856530, 1512856530),

('Update House', 2, 'Update House', NULL, NULL, 1512856530, 1512856530),

('Update Instruction', 2, 'Update Instruction', NULL, NULL, 1549634253, 1549634253),

('Update Mandate', 2, 'Update Mandate', NULL, NULL, 1564647635, 1564647635),

('Update Messagelog', 2, 'Update Messagelog', NULL, NULL, 1544660748, 1544660748),

('Update Messaging', 2, 'Update Messaging', NULL, NULL, 1544660035, 1544660035),

('Update Postalcode', 2, 'Update Postalcode', NULL, NULL, 1512856531, 1512856531),

('Update Street', 2, 'Update Street', NULL, NULL, 1512856531, 1512856531),

('Update Tax', 2, 'Update Tax', NULL, NULL, 1544662962, 1544662962),

('updateCommonUser', 2, 'Update user data, but not those of \'admin\'', NULL, NULL, 1577666562, 1577666562),

('updateCreatedItem', 2, 'Update own item', NULL, NULL, 1577666562, 1577666562),

('updateItem', 2, 'Update item', NULL, NULL, 1577666562, 1577666562),

('updateUser', 2, 'Update user data', NULL, NULL, 1577666562, 1577666562),

('View Bulletin Board', 2, 'View Bulletin Board', NULL, NULL, 1563826631, 1563826631),

('View Carousal', 2, 'View Carousal', NULL, NULL, 1558795525, 1558795525),

('View Company', 2, 'View Company', NULL, NULL, 1512856530, 1512856530),

('View Daily Clean', 2, 'View Daily Clean', NULL, NULL, 1546702743, 1546702743),

('View House', 2, 'View House', NULL, NULL, 1583581575, 1583581575),

('View Instruction', 2, 'View Instruction', NULL, NULL, 1549634202, 1549635005),

('View Mandate', 2, 'View Mandate', NULL, NULL, 1564647670, 1564647670),

('View Revenue Reports', 2, 'View Revenue Reports', NULL, NULL, 1564039903, 1564039903);



ALTER TABLE `auth_item`

  ADD PRIMARY KEY (`name`),

  ADD KEY `rule_name` (`rule_name`),

  ADD KEY `idx-auth_item-type` (`type`);

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



START TRANSACTION;



SET time_zone = "+00:00";



CREATE TABLE `auth_item_child` (



  `parent` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,



  `child` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL



) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `auth_item_child` (`parent`, `child`) VALUES



('admin', 'Access db'),



('admin', 'Access paypalagreement'),



('admin', 'Access Session'),



('admin', 'Access Sessiondetail'),



('admin', 'Create Carousal'),



('admin', 'Create Company'),



('admin', 'Create Daily Clean'),



('admin', 'Create Daily Job Sheet'),



('admin', 'Create Employee'),



('admin', 'Create Gocardlesscustomer'),



('admin', 'Create House'),



('admin', 'Create Instruction'),



('admin', 'Create Legal'),



('admin', 'Create Mandate'),



('admin', 'Create Messagelog'),



('admin', 'Create Messaging'),



('admin', 'Create Postalcode'),



('admin', 'Create Street'),



('admin', 'Create Tax'),



('admin', 'createItem'),



('admin', 'Delete Carousal'),



('admin', 'Delete Company'),



('admin', 'Delete Daily Clean'),



('admin', 'Delete Daily Job Sheet'),



('admin', 'Delete Employee'),



('admin', 'Delete House'),



('admin', 'Delete Instruction'),



('admin', 'Delete Mandate'),



('admin', 'Delete Messagelog'),



('admin', 'Delete Messaging'),



('admin', 'Delete Postalcode'),



('admin', 'Delete Street'),



('admin', 'Delete Tax'),



('admin', 'deleteItem'),



('admin', 'Import Houses'),



('admin', 'Manage Admin'),



('admin', 'Manage Basic'),



('admin', 'Manage Money'),



('admin', 'manageRoles'),



('admin', 'manageUsers'),



('admin', 'See Prices'),



('admin', 'Subscription Free Privilege'),



('admin', 'Update Carousal'),



('admin', 'Update Company'),



('admin', 'Update Daily Clean'),



('admin', 'Update Daily Job Sheet'),



('admin', 'Update Employee'),



('admin', 'Update House'),



('admin', 'Update Instruction'),



('admin', 'Update Mandate'),



('admin', 'Update Messagelog'),



('admin', 'Update Messaging'),



('admin', 'Update Postalcode'),



('admin', 'Update Street'),



('admin', 'Update Tax'),



('admin', 'updateCreatedItem'),



('admin', 'updateItem'),



('admin', 'updateUser'),



('admin', 'View Bulletin Board'),



('admin', 'View Carousal'),



('admin', 'View Company'),



('admin', 'View Daily Clean'),



('admin', 'View House'),



('admin', 'View Instruction'),



('admin', 'View Mandate'),



('admin', 'View Revenue Reports'),







('demo', 'Create Carousal'),



('demo', 'Create Daily Clean'),



('demo', 'Create Daily Job Sheet'),



('demo', 'Create Employee'),



('demo', 'Create Gocardlesscustomer'),



('demo', 'Create House'),



('demo', 'Create Instruction'),



('demo', 'Create Mandate'),



('demo', 'Create Messagelog'),



('demo', 'Create Messaging'),



('demo', 'Create Postalcode'),



('demo', 'Create Street'),



('demo', 'Create Tax'),



('demo', 'Delete Carousal'),



('demo', 'Delete Daily Clean'),



('demo', 'Delete Daily Job Sheet'),



('demo', 'Delete Employee'),



('demo', 'Delete House'),



('demo', 'Delete Instruction'),



('demo', 'Delete Mandate'),



('demo', 'Delete Messagelog'),



('demo', 'Delete Messaging'),



('demo', 'Delete Postalcode'),



('demo', 'Delete Street'),



('demo', 'Delete Tax'),



('demo', 'Import Houses'),



('demo', 'Manage Basic'),



('demo', 'Manage Money'),



('demo', 'manageUsers'),



('demo', 'See Prices'),



('demo', 'Update Carousal'),



('demo', 'Update Daily Clean'),



('demo', 'Update Daily Job Sheet'),



('demo', 'Update Employee'),



('demo', 'Update House'),



('demo', 'Update Instruction'),



('demo', 'Update Mandate'),



('demo', 'Update Messagelog'),



('demo', 'Update Messaging'),



('demo', 'Update Postalcode'),



('demo', 'Update Street'),



('demo', 'Update Tax'),



('demo', 'View Carousal'),



('demo', 'View Company'),



('demo', 'View Daily Clean'),



('demo', 'View House'),



('demo', 'View Instruction'),



('demo', 'View Revenue Reports'),







('employee', 'Manage Basic'),







('Mdb0', 'Access db'),



('Mdb0', 'manageUsers'),



('Mdb0', 'Subscription Free Privilege'),



('Mdb0', 'support'),







('Mdb1', 'Access db1'),



('Mdb1', 'Subscription Free Privilege'),



('Mdb1', 'support'),







('Mdb2', 'Access db2'),



('Mdb2', 'Subscription Free Privilege'),



('Mdb2', 'support'),







('Mdb3', 'Access db3'),



('Mdb3', 'Subscription Free Privilege'),



('Mdb3', 'support'),







('Mdb4', 'Access db4'),



('Mdb4', 'Subscription Free Privilege'),



('Mdb4', 'support'),







('Mdb5', 'Access db5'),



('Mdb5', 'Subscription Free Privilege'),



('Mdb5', 'support'),







('Mdb6', 'Access db6'),



('Mdb6', 'Subscription Free Privilege'),



('Mdb6', 'support'),







('Mdb7', 'Access db7'),



('Mdb7', 'Subscription Free Privilege'),



('Mdb7', 'support'),







('Mdb8', 'Access db8'),



('Mdb8', 'Subscription Free Privilege'),



('Mdb8', 'support'),







('Mdb9', 'Access db9'),



('Mdb9', 'Subscription Free Privilege'),



('Mdb9', 'support'),







('Mdb10', 'Access db10'),



('Mdb10', 'Subscription Free Privilege'),



('Mdb10', 'support'),







('support', 'Create Carousal'),



('support', 'Create Daily Clean'),



('support', 'Create Daily Job Sheet'),



('support', 'Create Employee'),



('support', 'Create Gocardlesscustomer'),



('support', 'Create House'),



('support', 'Create Instruction'),



('support', 'Create Mandate'),



('support', 'Create Messagelog'),



('support', 'Create Messaging'),



('support', 'Create Postalcode'),



('support', 'Create Street'),



('support', 'Create Tax'),



('support', 'Delete Carousal'),



('support', 'Delete Daily Clean'),



('support', 'Delete Daily Job Sheet'),



('support', 'Delete Employee'),



('support', 'Delete House'),



('support', 'Delete Instruction'),



('support', 'Delete Mandate'),



('support', 'Delete Messagelog'),



('support', 'Delete Messaging'),



('support', 'Delete Postalcode'),



('support', 'Delete Street'),



('support', 'Delete Tax'),



('support', 'Import Houses'),



('support', 'Manage Basic'),



('support', 'Manage Admin'),



('support', 'Manage Money'),



('support', 'manageUsers'),



('support', 'See Prices'),



('support', 'Update Carousal'),



('support', 'Update Company'),



('support', 'Update Daily Clean'),



('support', 'Update Daily Job Sheet'),



('support', 'Update Employee'),



('support', 'Update House'),



('support', 'Update Instruction'),



('support', 'Update Mandate'),



('support', 'Update Messagelog'),



('support', 'Update Messaging'),



('support', 'Update Postalcode'),



('support', 'Update Street'),



('support', 'Update Tax'),



('support', 'updateCommonUser'),



('support', 'View Bulletin Board'),



('support', 'View Carousal'),



('support', 'View Company'),



('support', 'View Daily Clean'),



('support', 'View House'),



('support', 'View Instruction'),



('support', 'View Mandate'),



('support', 'View Revenue Reports'),







('Udb0', 'Access db'),



('Udb0', 'Subscription Free Privilege'),



('Udb0', 'View Daily Clean'),



('Udb0', 'employee'),







('Udb1', 'Access db1'),



('Udb1', 'Subscription Free Privilege'),



('Udb1', 'View Daily Clean'),



('Udb1', 'employee'),







('Udb2', 'Access db2'),



('Udb2', 'Subscription Free Privilege'),



('Udb2', 'View Daily Clean'),



('Udb2', 'employee'),







('Udb3', 'Access db3'),



('Udb3', 'Subscription Free Privilege'),



('Udb3', 'View Daily Clean'),



('Udb3', 'employee'),







('Udb4', 'Access db4'),



('Udb4', 'Subscription Free Privilege'),



('Udb4', 'View Daily Clean'),



('Udb4', 'employee'),







('Udb5', 'Access db5'),



('Udb5', 'Subscription Free Privilege'),



('Udb5', 'View Daily Clean'),



('Udb5', 'employee'),







('Udb6', 'Access db6'),



('Udb6', 'Subscription Free Privilege'),



('Udb6', 'View Daily Clean'),



('Udb6', 'employee'),







('Udb7', 'Access db7'),



('Udb7', 'Subscription Free Privilege'),



('Udb7', 'View Daily Clean'),



('Udb7', 'employee'),







('Udb8', 'Access db8'),



('Udb8', 'Subscription Free Privilege'),



('Udb8', 'View Daily Clean'),



('Udb8', 'employee'),







('Udb9', 'Access db9'),



('Udb9', 'Subscription Free Privilege'),



('Udb9', 'View Daily Clean'),



('Udb9', 'employee'),







('Udb10', 'Access db10'),



('Udb10', 'Subscription Free Privilege'),



('Udb10', 'View Daily Clean'),



('Udb10', 'employee'),







('updateCommonUser', 'updateUser'),



('updateCreatedItem', 'updateItem');







ALTER TABLE `auth_item_child`



  ADD PRIMARY KEY (`parent`,`child`),



  ADD KEY `child` (`child`);

  

 CREATE TABLE `auth_rule` (

  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,

  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,

  `created_at` int(11) DEFAULT NULL,

  `updated_at` int(11) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES

('hasNotRole', 'O:29:\"sjaakp\\pluto\\rbac\\NotRoleRule\":3:{s:4:\"name\";s:10:\"hasNotRole\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}', 1577666562, 1577666562),

('hasRole', 'O:26:\"sjaakp\\pluto\\rbac\\RoleRule\":3:{s:4:\"name\";s:7:\"hasRole\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}', 1577666562, 1577666562),

('isCreator', 'O:29:\"sjaakp\\pluto\\rbac\\CreatorRule\":3:{s:4:\"name\";s:9:\"isCreator\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}', 1577666562, 1577666562),

('isCreatorOrUpdater', 'O:38:\"sjaakp\\pluto\\rbac\\CreatorOrUpdaterRule\":3:{s:4:\"name\";s:18:\"isCreatorOrUpdater\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}', 1577666562, 1577666562),

('isUpdater', 'O:29:\"sjaakp\\pluto\\rbac\\UpdaterRule\":3:{s:4:\"name\";s:9:\"isUpdater\";s:9:\"createdAt\";i:1577666562;s:9:\"updatedAt\";i:1577666562;}', 1577666562, 1577666562);





COMMIT;
