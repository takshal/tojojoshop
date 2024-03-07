<?php
require 'db.php';


$dropTable = "DROP TABLE IF EXISTS at0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table at0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `at0x01` (
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `OTP` varchar(100) NOT NULL
) ";

$insert = "INSERT INTO `at0x01` (`username`, `password`, `email`, `OTP`) VALUES
('test', 'test', 'test@test.com', '1444'),
('tojojo', 'tojojo', 'tojojo@gmail.com', '5769'),
('tojojo1212', 'Admin@123', 'a@a.com', '8296')";


if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table at0x01  created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

########################################################################
$dropTable = "DROP TABLE IF EXISTS at0x02";

if ($conn->query($dropTable) === TRUE) {
    echo "Table at0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `at0x02` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
)";

$insert = "INSERT INTO `at0x02` (`username`, `password`, `email`, `link`) VALUES
('Admin', 'sdlfj', 'lfdjglkdfj@a.com', 'QWRtaW4=')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table at0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

############################################################################
$dropTable = "DROP TABLE IF EXISTS at0x02";

if ($conn->query($dropTable) === TRUE) {
    echo "Table at0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `auth0x02` (
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mfa` varchar(10) NOT NULL
)";

$insert = "INSERT INTO `auth0x02` (`username`, `password`, `mfa`) VALUES
('tojojo', 'Hacker', '156359'),
('tapori', '66c53f8b7a7cab26545e81375726e189', '')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table auth0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

###########################################################
$dropTable = "DROP TABLE IF EXISTS auth0x03";

if ($conn->query($dropTable) === TRUE) {
    echo "Table auth0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `auth0x03` (
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `lockout_count` int(11) NOT NULL DEFAULT 0
)";

$insert = "INSERT INTO `auth0x03` (`username`, `password`, `lockout_count`) VALUES
('tojojo', '1q2w3e4r5t6y7u8i9o0p', 0),
('dhakkan', 'q1w2e3r4t5y6u7i8o9p0', 0),
('admin', 'letmein', 0),
('root', 'zmxncbvgftr', 0),
('alex', 'alexwashere', 0),
('raj', 'password123', 0),
('takeshi', 'onigiriotebetai', 0),
('hiro', 'roosterCarsSunset5', 0),
('heath', 'thecybermentor', 0),
('user1', 'user1', 0),
('teamaster', 'idrinklotsoftea', 0),
('operator', 'alskdjfhg', 0),
('bob', '123456', 0),
('alice', 'password', 0),
('administrator', 'cheese', 0)";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table auth0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

#######################################################

$dropTable = "DROP TABLE IF EXISTS auth0x04";

if ($conn->query($dropTable) === TRUE) {
    echo "Table auth0x04 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `auth0x04` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
)";

$insert = "INSERT INTO `auth0x04` (`username`, `password`) VALUES
('admin', '1q2w3e4r5t6y7u8i9o0p')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table auth0x04 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

#############################################################

$dropTable = "DROP TABLE IF EXISTS auth0x05";

if ($conn->query($dropTable) === TRUE) {
    echo "Table auth0x05 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `auth0x05` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
)";

$insert = "INSERT INTO `auth0x05` (`id`, `username`, `password`, `email`) VALUES
(1110, 'tojojo', 'tojojo', 'tojojo@example.com'),
(1112, 'rootme', 'rootme', 'rootme@example.com'),
(1113, 'alex', 'alex', 'alex@example.com'),
(1114, 'test', 'password3', 'test@example.com')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table auth0x05 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

###############################################################

$dropTable = "DROP TABLE IF EXISTS books";

if ($conn->query($dropTable) === TRUE) {
    echo "Table books dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
)";

$insert = "INSERT INTO `books` (`id`, `title`, `author`) VALUES
(1, 'xcv', 'xcv'),
(2, 'test', 'test'),
(3, 'tojojo', 'tojojo')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table books created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

#############################################

$dropTable = "DROP TABLE IF EXISTS chats0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table chats0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `chats0x01` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `chat` text NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
)";

$insert = "INSERT INTO `chats0x01` (`id`, `username`, `chat`, `approved`) VALUES
(3, 'test', 'this is tojojo', 1),
(4, 'test', 'this is tojojo', 1),
(5, 'hacker', 'hi this is hacker notes', 0)";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table chats0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

###################################################

$dropTable = "DROP TABLE IF EXISTS csrf0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table csrf0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `csrf0x01` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
)";

$insert = "INSERT INTO `csrf0x01` (`username`, `email`) VALUES
('tojojo', 'tojojo@gmail.com'),
('dhakkan', 'dhakkan@gmail.com')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table csrf0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

############################################################

$dropTable = "DROP TABLE IF EXISTS csrf0x03";

if ($conn->query($dropTable) === TRUE) {
    echo "Table csrf0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `csrf0x03` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `session` varchar(6000) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `status` int(1) NOT NULL
)";

$insert = "INSERT INTO `csrf0x03` (`username`, `password`, `session`, `bio`, `status`) VALUES
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'this is nice bio', 1)";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table csrf0x03 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

#######################################################

$dropTable = "DROP TABLE IF EXISTS graph0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table graph0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `graph0x01` (
  `id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
)";

$insert = "INSERT INTO `graph0x01` (`id`, `username`, `password`) VALUES
(3, 'tojojo', 'tojojo'),
(4, 'admin', 'password123')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table graph0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

########################################

$dropTable = "DROP TABLE IF EXISTS injection0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `injection0x01` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `des` mediumtext NOT NULL
)";

$insert = "INSERT INTO `injection0x01` (`id`, `title`, `des`) VALUES
(1, 'What is Lorem Ipsum?\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(2, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.'),
(3, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')
";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table injection0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

################################################

$dropTable = "DROP TABLE IF EXISTS injection0x02";

if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x02 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `injection0x02` (
  `id` int(10) NOT NULL,
  `Lnum` int(10) NOT NULL
)";

$insert = "INSERT INTO `injection0x02` (`id`, `Lnum`) VALUES
(1, 1234),
(2, 1000),
(3, 1122),
(4, 1212)
";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table injection0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


########################################

$dropTable = "DROP TABLE IF EXISTS injection0x03";

if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `injection0x03` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL
)";

$insert = "INSERT INTO `injection0x03` (`username`, `password`, `email`, `session`) VALUES
('tojojo', 'hacker', 'jeremy@example.com', '85d88fbe1f305d2af284646b28db9bb9'),
('bug', '1234', 'jessamy@example.com', 'ae0e4bdad7b5f67141743366026d2ea5')
";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table injection0x03 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

###################################################

$dropTable = "DROP TABLE IF EXISTS injection0x04";

if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x04 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `injection0x04` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bio` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL
)";

$insert = "INSERT INTO `injection0x04` (`username`, `password`, `bio`, `session`) VALUES
('tojojo', 'hacker', 'tojojo is a great hacker hahah:)', '85d88fbe1f305d2af284646b28db9bb9'),
('buger', 'cheesecake', 'buger likes dogs.', 'd708ec9b7d3a23b4f1f117e85f81788c'),
('tojojo', 'tojojo', NULL, '85d88fbe1f305d2af284646b28db9bb9')
";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table injection0x04 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


$dropTable = "DROP TABLE IF EXISTS notes0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table notes0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `notes0x01` (
  `id` int(10) NOT NULL,
  `userId` int(200) NOT NULL,
  `content` varchar(200) NOT NULL
)";

$insert = "INSERT INTO `notes0x01` (`id`, `userId`, `content`) VALUES
(1, 1, 'tojojo'),
(2, 3, 'tojojo')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table notes0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


$dropTable = "DROP TABLE IF EXISTS pe0x01";

if ($conn->query($dropTable) === TRUE) {
    echo "Table pe0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `pe0x01` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
)";

$insert = "INSERT INTO `pe0x01` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'tojojo', 'tojojo', 1),
(2, 'test', 'test', 0),
(3, 'hacker', 'hacker', 0),
(4, 'test123', 'test123', 0)";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table notes0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


$dropTable = "DROP TABLE IF EXISTS xss0x02";

if ($conn->query($dropTable) === TRUE) {
    echo "Table xss0x02 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `xss0x02` (
  `name` varchar(30) NOT NULL,
  `comment` varchar(500) NOT NULL
)";

$insert = "INSERT INTO `xss0x02` (`name`, `comment`) VALUES
('guest', 'tojojo')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table xss0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


$dropTable = "DROP TABLE IF EXISTS xss0x03";

if ($conn->query($dropTable) === TRUE) {
    echo "Table xss0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `xss0x03` (
  `name` varchar(30) NOT NULL,
  `comment` varchar(500) NOT NULL
)";

$insert = "INSERT INTO `xss0x03` (`name`, `comment`) VALUES
('guest', 'tojojo')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table xss0x03 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


$dropTable = "DROP TABLE IF EXISTS xss0x04";

if ($conn->query($dropTable) === TRUE) {
    echo "Table xss0x04 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}
$createTable = "CREATE TABLE `xss0x04` (
  `name` varchar(30) NOT NULL,
  `comment` varchar(500) NOT NULL
)";

$insert = "INSERT INTO `xss0x04` (`name`, `comment`) VALUES
('hacker', 'xss is easy')";

if ($conn->query($createTable) === TRUE && $conn->query($insert)) {
    echo "Table xss0x04 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$sql = "ALTER TABLE `at0x01`
  ADD UNIQUE KEY `username` (`username`) USING HASH";

if ($conn->query($sql) === TRUE) {
  echo "Table at0x01 created successfully\n";
}

$sql = "ALTER TABLE `at0x02`
  ADD UNIQUE KEY `username` (`username`)";

if ($conn->query($sql) === TRUE) {
  echo "Table at0x02 created successfully\n";
}


$sql = "ALTER TABLE `auth0x04`
  ADD UNIQUE KEY `username` (`username`)";

if ($conn->query($sql) === TRUE) {
  echo "Table auth0x04 created successfully\n";
}

$sql = "ALTER TABLE `auth0x05`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table auth0x05 created successfully\n";
}

$sql = "ALTER TABLE `books`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table books created successfully\n";
}

$sql = "ALTER TABLE `chats0x01`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table chats0x01 created successfully\n";
}

$sql = "ALTER TABLE `csrf0x03`
  ADD UNIQUE KEY `username` (`username`)";

if ($conn->query($sql) === TRUE) {
  echo "Table csrf0x03 created successfully\n";
}


$sql = "ALTER TABLE `csrf0x04`
  ADD UNIQUE KEY `username` (`username`)";

if ($conn->query($sql) === TRUE) {
  echo "Table csrf0x04 created successfully\n";
}


$sql = "ALTER TABLE `graph0x01`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table graph0x01 created successfully\n";
}

$sql = "ALTER TABLE `injection0x01`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table injection0x01 created successfully\n";
}


$sql = "ALTER TABLE `injection0x02`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table injection0x02 created successfully\n";
}


$sql = "ALTER TABLE `notes0x01`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table notes0x01 created successfully\n";
}


$sql = "ALTER TABLE `pe0x01`
  ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) {
  echo "Table pe0x01 created successfully\n";
}

$sql = "ALTER TABLE `auth0x05`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1116";

if ($conn->query($sql) === TRUE) {
  echo "Table auth0x05 created successfully\n";
}


$sql = "ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

if ($conn->query($sql) === TRUE) {
  echo "Table books created successfully\n";
}


$sql = "ALTER TABLE `chats0x01`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10";

if ($conn->query($sql) === TRUE) {
  echo "Table chats0x01 created successfully\n";
}

$sql = "ALTER TABLE `graph0x01`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";

if ($conn->query($sql) === TRUE) {
  echo "Table graph0x01 created successfully\n";
}

$sql = "ALTER TABLE `injection0x01`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7";

if ($conn->query($sql) === TRUE) {
  echo "Table injection0x01 created successfully\n";
}

$sql = "ALTER TABLE `injection0x02`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";

if ($conn->query($sql) === TRUE) {
  echo "Table injection0x02 created successfully\n";
}

$sql = "ALTER TABLE `notes0x01`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3";

if ($conn->query($sql) === TRUE) {
  echo "Table notes0x01 created successfully\n";
}


$sql = "ALTER TABLE `pe0x01`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT";

if ($conn->query($sql) === TRUE) {
  echo "Table pe0x01 created successfully\n";
}

