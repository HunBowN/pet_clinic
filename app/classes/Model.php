<?php
class Model
{
    public static $qb;
    public $tableName;

    public function __construct()
    {
        self::$qb = Database::getInstance();
        $this->conn = self::$qb->conn;
        $this->tableName = $this->getTable();
    }

    protected function singleQuery($query)
    {
        $result = $this->conn->query($query);
        if (!$result) {
            throw new Exception('SQL error', 200);
        }
        return mysqli_fetch_assoc($result);
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM $this->tableName WHERE `id` = $id LIMIT 1;";
        $this->singleQuery($query);
    }
    public function getById($id)
    {
        $query = "SELECT * FROM $this->tableName WHERE `id` = $id LIMIT 1;";
        return $this->singleQuery($query);
    }

    protected function multipleQuery($query)
    {
        $result = $this->conn->query($query);
        if (!$result) {
            throw new Exception('SQL error', 200);
        }
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
            ;
        return $data;
    }

    public function getAll()
    {
        return $this->multipleQuery("SELECT * FROM $this->tableName;");
    }
    public function getRowsCount()
    {
        $coutn = $this->singleQuery("SELECT count(*) FROM $this->tableName;");
        return intval($coutn['count(*)']);
    }

    public function insert($params)
    { {
            $sql = $params;

            array_walk(
                $sql,
                function (&$value, $key) {
                    if ($value === NULL || $value === 'NULL')
                        $value = sprintf('`%s` = NULL', $key);
                    else
                        $value = sprintf('`%s` = "%s"', $key, $this->conn->real_escape_string($value));
                }
            );

            $sql = implode(', ', $sql);

            $sql = sprintf('INSERT IGNORE INTO `%s` SET %s', $this->tableName, $sql);
            $this->conn->query($sql);

            // return $this->conn->insert_id;
            return mysqli_insert_id($this->conn);
        }
    }
    public function getTableParams()
    {
        $query = "SHOW COLUMNS FROM $this->tableName";
        $result = $this->conn->query($query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row['Field'])
            ;
        return $data;
    }

    public static function factory($name, $id = false)
    {
        $class = 'Model_' . ucfirst($name);
        return new $class($id);
    }

    protected function getTable()
    {
        return strtolower(
            str_replace('Model_', '', get_called_class()) . 's'
        );
    }

}