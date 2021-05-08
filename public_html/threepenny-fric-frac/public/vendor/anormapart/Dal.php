<?php

/**
 * Created by ModernWays
 * User: Jef Inghelbrecht
 * Date: 10/04/2019
 * Revision: 8/04/2020
 * Time: 10:32
 */

namespace AnOrmApart;

class Dal
{
    /**
     * @var $connection The main connection to the database
     * @var $configLocation path to config file
     * @var $message feedback for the user of this class
     */
    protected static $connection;
    public static $configLocation = "../data/config.ini";
    protected static $message;

    public static function getMessage()
    {
        return self::$message;
    }

    /** ------------------ columnsCommaSeparated  --------------------------
     *
     * We cannot use explode to concatenate the items of an array in een comma
     * separated string because the items must be enclosed between backticks
     *
     * @lastmodified 26/01/2019
     * @param $columnSelectArray array with items to be concatenated
     * @return string
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    private static function columnsCommaSeparated($columnSelectArray)
    {
        $columns = '';
        if (isset($columnSelectArray)) {
            foreach ($columnSelectArray as $item) {
                $columns .= "`{$item}`, ";
            }
        } else {
            $columns = '*';
        }
        $columns = rtrim($columns, ", ");
        return $columns;
    }

    private static function getParameterType($value)
    {
        switch (gettype($value)) {
            case 'boolean' :
                $paramType = \PDO::PARAM_BOOL;
                break;
            case 'integer' :
                $paramType = \PDO::PARAM_INT;
                break;
            case 'NULL' :
                $paramType = \PDO::PARAM_STR;
                $value = '';
                break;
            default :
                $paramType = \PDO::PARAM_STR;
                break;
        }
        return $paramType;
    }

    /** ------------------ connect  --------------------------
     * @lastmodified 26/01/2019
     * @param $connectionName de naam van de sectie van het ini bestand
     * @return boolean if connected true, else false
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    public static function connect($connectionName = 'global')
    {
        $success = false;
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION && \PDO::ERRMODE_WARNING
        );
        if (self::$connection !== null) {
            self::$message = 'Connectie is al gemaakt.';
            $success = true;
        } else {
            // true want we willen secties inlezen
            // met dank aan Sam Wouters voor het idee om
            // een ini bestand te gebruiken!!!!!
            $config = parse_ini_file(self::$configLocation, true);
            try {
                $database = $config[$connectionName]['database'];
                $userName = $config[$connectionName]['username'];
                $password = $config[$connectionName]['password'];
                $driver = $config[$connectionName]['driver'];
                $host = $config[$connectionName]['host'];
                $port = $config[$connectionName]['port'];
                $dsn = "{$driver}:host={$host}:{$port};dbname={$database}";
                // echo $dsn;
                self::$connection = new \PDO($dsn, $userName, $password, $options);
                self::$message = "Connectie met $database is gemaakt.";
                $success = true;
            } catch (\PDOException $e) {
                self::$message = $e->getMessage();
            }
        }
        return $success;
    }


    /** ------------------ create  --------------------------
     * creates one or multiple rows in a table
     *
     * @lastmodified 27/01/2019
     * @param $tableName table name
     * @param $postArray the values used to insert one row in table is $postArray is an associative array,
     *        if it is an array with more than one associative array in it, multiple rows are inserted.
     * @param $columnForMessage the columnname to be used in the feedback for the user
     * @return int the number of inserted rows in the table
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    public static function create($tableName, $postArray, $columnForMessage = 'Name')
    {
        $success = 0;
        if (self::connect()) {
            // if $postArray is one row, thus an associative array
            if (\AnOrmApart\Helpers::isAssoc($postArray)) {
                $rows = [$postArray];
            } else {
                $rows = $postArray;
            }
            foreach ($rows as $item) {
                // schoon array op
                $row = Helpers::escapeArray($item);
                //echo '<pre>';
                //var_dump($row);
                //echo '</pre>';
                try {
                    // we kunnen hier niet implode gebruiken omdat de kolommen
                    // 'ontsnapt' moeten worden en tussen backticks geplaatst moeten worden.
                    $columns = self::columnsCommaSeparated(array_keys($row));
                    $sql = sprintf("INSERT INTO %s (%s) VALUES (:%s)", $tableName,
                        $columns,
                        implode(', :', array_keys($row)));
                    // echo $sql;
                    $statement = self::$connection->prepare($sql);
                    $success = $statement->execute($row);
                    if ($success == 0) {
                        self::$message = "{$row[$columnForMessage]} in tabel {$tableName} is niet toegevoegd.";
                    } else {
                        self::$message = "{$row[$columnForMessage]}  in tabel {$tableName} is toegevoegd.";
                    }
                } catch (\PDOException $exception) {
                    self::$message = "Rij is niet toegevoegd in {$tableName}!<br .>";
                    self::$message .= $exception->getMessage();
                }
            }
        }
        return $success;
    }

    /** ------------------ delete  --------------------------
     *
     * Deletes one row in a table
     *
     * @lastmodified 26/01/2019
     * @param $tableName table name
     * @param $value the value to be looked up in the WHERE clause
     * @param $columnName the columnname to be looked up in the WHERE clause; default is the Id column
     * @return boolean if row is deleted return true otherwise false
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    public static function delete($tableName, $value, $columnName = 'Id')
    {
        $success = 0;
        if (self::connect()) {
            try {
                $sql = "DELETE FROM $tableName WHERE $columnName = :$columnName";
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(":$columnName", $value);
                $statement->execute();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "De rij met $columnName $value is niet verwijderd uit $tableName!";
                } else {
                    self::$message = "De rij met $columnName $value is verwijderd uit $tableName!";

                }
            } catch (\PDOException $exception) {
                self::$message = "Fout: de rij met $columnName = $value is niet verwijderd uit $tableName!<br />{$exception->getMessage()}";
            }
        }
        return $success;
    }

    /** ------------------ readAll  --------------------------
     *
     * Reads all rows from a table
     *
     * @lastmodified 26/01/2019
     * @param $tableName table name
     * @param $value the value to be looked up in the WHERE clause
     * @param $orderBy the columnname to be sorted on; default is the Name column
     * @param $columnSelectArray array with columnnames to be selected from the table. Default is all (*).
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    public static function readAll($tableName, $orderBy = 'Name', $columnSelectArray = null)
    {
        $result = null;
        if (self::connect()) {
            try {
                $columns = self::columnsCommaSeparated($columnSelectArray);
                $sql = "SELECT {$columns} FROM {$tableName} ORDER BY $orderBy";
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                // An empty array is returned if there are zero results to fetch, or FALSE on failure
                if ($result === false) {
                    self::$message = "Er is iets foutgelopen bij het inlezen van $tableName.";
                } else {
                    if (isset($result)) {
                        $rowCount = $statement->rowCount();
                        self::$message = "{$rowCount} rij(en) van $tableName ingelezen.";
                    } else {
                        self::$message = "$tableName is leeg.";
                    }
                }
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
            }
        }
        return $result;
    }

    /** ------------------ readAllWhere  --------------------------
     *
     * Reads all rows from a table according to a where clause
     * PDO::FETCH_ASSOC removes all the numeric keys and only leaves with associated keys.
     *
     * @lastmodified 27/01/2019
     * @param $tableName table name
     * @param $value the value to be looked up in the WHERE clause
     * @param $columnName the columnname to be looked up in the WHERE clause; default is the Id column
     * @param $orderBy the columnname to be sorted on; default is the Name column
     * @param $columnSelectArray array with columnnames to be selected from the table. Default is all (*).
     * @return array selected rows from the table, colum as key-value pairs
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    public static function readAllWhere($tableName, $value, $columnName = 'Id',
                                        $orderBy = 'Name', $columnSelectArray = null)
    {
        $result = null;
        if (self::connect()) {
            try {
                $columns = self::columnsCommaSeparated($columnSelectArray);
                $sql = "SELECT {$columns} FROM {$tableName} WHERE {$columnName} = {$value} ORDER BY $orderBy";
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                self::$message = "Alle rijen van $tableName zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel $tableName is leeg.";
            }
        }
        return $result;
    }

    /** ------------------ readAllLikeX  --------------------------
     *
     * Reads all rows from a table according to a where clause.
     * Selects all rows with a ColumnName that have the given value in any position.
     * PDO::FETCH_ASSOC removes all the numeric keys and only leaves with associated keys.
     *
     * @lastmodified 27/01/2019
     * @param $tableName table name
     * @param $value the value to be looked up in the WHERE clause
     * @param $columnName the columnname to be looked up in the WHERE clause; default is the Id column
     * @param $columnSelectArray array with columnnames to be selected from the table. Default is all (*).
     * @return array selected rows from the table, colum as key-value pairs
     * @version 1.0
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     */
    public static function readAllLikeX($tableName, $value, $columnName = 'Name', $orderBy = 'Name', $columnSelectArray = null)
    {
        $result = null;
        if (self::connect()) {
            try {
                $columns = self::columnsCommaSeparated($columnSelectArray);
                $sql = "SELECT {$columns} FROM {$tableName} WHERE $columnName LIKE CONCAT('%', :$columnName, '%') ORDER BY $orderBy";
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(":{$columnName}", $value, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                self::$message = "Alle rijen van $tableName zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel $tableName is leeg.";
            }
        }
        return $result;
    }

    /** ------------------ readOne  --------------------------
     *
     * Reads one row from a table
     *
     * @lastmodified 26/01/2019
     * @param $tableName table name
     * @param $value the value to be looked up in the WHERE clause
     * @param $columnName the columnname to be looked up in the WHERE clause; default is the Id column
     * @param $columnSelectArray array with columnnames to be selected from the table. Default is all (*).
     * @return array dictionary, keys are columnames, values are the corresponding values
     * @version 1.0
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     */
    public static function readOne($tableName, $value, $byColumnName = 'Id',
                                   $columnSelectArray = null)
    {
        if (self::connect()) {
            $result = null;
            try {
                $columns = self::columnsCommaSeparated($columnSelectArray);
                // echo $columns;
                $sql = "SELECT {$columns} FROM {$tableName} WHERE {$byColumnName} = :{$byColumnName}";
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(":{$byColumnName}", $value, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetch(\PDO::FETCH_ASSOC);
                if ($result) {
                    self::$message = "De rij met de $byColumnName = $value is ingelezen uit de tabel $tableName.";
                } else {
                    self::$message = "De rij met de $byColumnName = $value is niet ingelezen uit de tabel $tableName.";
                }
            } catch (\PDOException $exception) {
                self::$message = "De rij met de $byColumnName = $value is niet ingelezen uit de tabel $tableName.<br {$exception->getMessage()}/>";
            }
        }
        return $result;
    }

    /** ------------------ update  --------------------------
     *
     * Update one row in a table
     *
     * @lastmodified 26/01/2019
     * @param $tableName table name
     * @param $postArray the values used to update row in table
     * @param $columnForMessage the columnname to be used ihe feedback for the user
     * @return int the number of updated rows in the table
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     */
    public static function update($tableName, $postArray, $columnForMessage = 'Name')
    {
        $success = 0;
        if (self::connect()) {
            $row = Helpers::escapeArray($postArray);
            try {
                // 'ontsnapt' moeten worden en tussen backticks geplaatst moeten worden.
                $sql = "UPDATE $tableName SET ";
                foreach ($row as $key => $value) {
                    if ($key !== 'Id') {
                        $sql .= "`{$key}` = :{$key}, ";
                    }
                }
                $sql = rtrim($sql, ", ");
                $sql .= ' WHERE Id = :Id';
                //echo '<pre>';
                //echo $sql;
                //var_dump($row);
                //echo '<pre>';
                $statement = self::$connection->prepare($sql);
                $statement->execute($row);
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "{$row[$columnForMessage]} in tabel {$tableName} is niet gevonden.";
                } else {
                    self::$message = "{$row[$columnForMessage]}  in tabel {$tableName} is geüpdated.";
                }
            } catch (\PDOException $exception) {
                self::$message = "{$row[$columnForMessage]} is in tabel {$tableName} niet geüpdated.<br /> Syntax error: {$exception->getMessage()}";
            }
        }
        return $success;
    }

    public function readX($tableName, $sqlString = null,
                          $whereString = null,
                          $isStoredProcedure = false)
    {
        $list = null;
        if (self::connect()) {
            try {
                if ($isStoredProcedure) {
                    $selectStatement = "CALL {$sqlString}(";
                    // parameterlist
                    if (!($whereString == null)) {
                        $whereString = str_replace(' ', '', $whereString);
                        $selectColumns = explode(',', $whereString);
                        foreach ($selectColumns as $column) {
                            $where = explode('=', $column);
                            $selectStatement .= " :p{$where[0]}, ";
                        }

                    }
                    $selectStatement = rtrim($selectStatement, ", ");
                    $selectStatement .= ')';// echo $selectStatement;
                } else {
                    $selectColumnsString = str_replace(' ', '', $sqlString);
                    $selectColumns = explode(',', $selectColumnsString);
                    $selectStatement = 'SELECT ';
                    foreach ($selectColumns as $column) {
                        $selectStatement .= ucfirst($column) . ', ';
                    }
                    $selectStatement = rtrim($selectStatement, ', ');
                    $selectStatement .= " FROM \"{$tableName}\"";
                    if (!($whereString == null)) {
                        $whereString = str_replace(' ', '', $whereString);
                        $where = explode('=', $whereString);

                        $selectStatement .= "WHERE {$where[0]} = :p{$where[0]}";

                    }
                }
                // Prepare stored procedure call
                $preparedStatement = self::$connection->prepare($selectStatement);
                if (!($whereString == null)) {
                    $whereString = str_replace(' ', '', $whereString);
                    $selectColumns = explode(',', $whereString);
                    foreach ($selectColumns as $column) {
                        $where = explode('=', $column);
                        $preparedStatement->bindValue(":p{$where[0]}", $where[1], self::getParameterType($where[1]));
                    }
                }
                $preparedStatement->execute();
                $this->rowCount = $preparedStatement->rowCount();
                $list = $preparedStatement->fetchAll();
                if ($list) {
                    self::$message = "Reading $tableName SELECT $sqlString error: {$preparedStatement->errorInfo()}";
                } else {
                    self::$message = "Reading $tableName SELECT $sqlString error: {$preparedStatement->errorInfo()}";
                }
            } catch (\PDOException $e) {
                self::$message = "Reading $tableName SELECT $sqlString error: $e";
            }
        } else {
            self::$message = 'Not connected!';
        }
        // var_dump($list);
        return $list;
    }
}