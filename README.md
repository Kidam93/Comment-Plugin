# entrypoint

http://127.0.0.1:8000/src/Comment.php

# edit your database config in src/Config.php

const SERV_NAME = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DB_NAME = "Plugin";
const DB_TABLE = "Comment";
const PORT = "3308";

# use static methods for create and delete struct of database into src/Comment.php

Config::createDB();
<!-- Config::createTable(); -->
<!-- Config::dropTable(); -->
<!-- Config::dropDB(); -->
