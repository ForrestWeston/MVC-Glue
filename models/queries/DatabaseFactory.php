<?php
class DatabaseFactory
{
    /**
     * 
     * @return \PDO
     */
    public static function getDefaultPdoObject()
    {
        $connection_string = sprintf('%s:host=%s;dbname=%s', 
                                     'mysql',
                                     '127.0.0.1', ///needs to be 127.0.0.1 on MAC and localhost on Linux
                                     'sakila'
                                     );
        $db = new PDO($connection_string, 'root', '');
        return $db;
    }
    
    public static function getPdoObject($db_config)
    {
         $connection_string = sprintf('%s:host=%s;dbname=%s', 
                                     $db_config->dbType,
                                     $db_config->dbHost,
                                     $db_config->dbName
                                     );
        $db = new PDO($connection_string, $db_config->dbUser, $db_config->dbPass);
        return $db;
    }
}
?>
