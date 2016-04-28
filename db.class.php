<?php

/**
 * Created by PhpStorm.
 * User: test
 * Date: 28.12.2015
 * Time: 11:19
 */
class DB_CLASS
{
    private $host = 'localhost';
    private $db_name = 'vseagenstva';
    private $db_user = 'root';
    private $db_pass = '';
	private $DB;

    public  function __construct() {
            $this->newConnection($this->host, $this->db_name, $this->db_user, $this->db_pass, array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    /**
     * Ï³äêëş÷åííÿ äî ÁÄ
     */
    public function newConnection($host, $db_name, $db_user, $db_pass, $options){
        try {
            $this->DB = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass, $options);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->DB->exec("SET CHARACTER SET utf8");
        }
        catch(PDOException $e) {
                    echo $e->getMessage();
        }
    }

    /**
     * Îòğèìóºìî îäèí ğÿäîê
     */
    public function getRows($query, $params = array()){
        try {
            $row = $this->DB->prepare($query);
            $row->execute($params);
            return $row->fetchAll( PDO::FETCH_ASSOC );
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Îòğèìóºìî äàí³ ïî âêàçàíîìó ïîë³
     * $select - ÿê³ ïîëÿ âèáèğàºìî (string)
     * $table - òàáëèöÿ ç ÿêî¿ âèáèğàºìî (string)
     * $column - ïî ÿêîìó ñòîâïöş âèáèğàºìî (string)
     * $data - çíà÷åííÿ (array)
     */
    public function getSelRows($select = '*', $table, $column, $data = 'null'){
        try {
            $in = str_repeat('?,', count($data) - 1) . '?';
            $sql = 'SELECT ' . $select . ' FROM ' . $table . ' WHERE ' . $column . ' IN (' . $in . ')';
            $stm = $this->DB->prepare($sql);
            $stm->execute($data);
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Çàïèñóºìî äàí³
     * $table - òàáëèöÿ â ÿêó çàïèñóºìî (string)
     * $values (array)
     */
    public function insertRow($table, $values = array())
    {
        try {
            foreach ($values as $field => $v)
                $ins[] = ':' . $field;

            $ins = implode(',', $ins);
            $fields = implode(',', array_keys($values));
            $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

            $stm = $this->DB->prepare($sql);
            foreach ($values as $f => $v) {
                $stm->bindValue(':' . $f, $v);
            }
            $stm->execute();
            return true;
            //return $this->lastId = $dbh->lastInsertId();
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Îáíîâëÿºìî äàí³
     * $table - òàáëèöÿ â ÿêó çàïèñóºìî (string)
     * $values (array)
     * $where (array or string)
     */
    public function updateRow($table, $values = array(), $where)
    {
        try {
            $WHERE = $SET = '';
            $j = $i = 0;
            foreach ($values as $field => $val){
                $i++;
                if (count($values) != $i)
                    $SET .= $field . "='" . $val . "', ";
                else
                    $SET .= $field . "='" . $val . "'";
            }
            if (is_array($where)) {
                foreach ($where as $field => $val) {
                    $j++;
                    if (count($where) != $j)
                        $WHERE .= $field . "='" . $val . "' AND ";
                    else
                        $WHERE .= $field . "='" . $val . "'";
                }
            } elseif (is_string($where)){
                $WHERE = $where;
            }
            $sql = "UPDATE $table SET $SET WHERE $WHERE";
            $stm = $this->DB->prepare($sql);
            foreach ($values as $f => $v) {
                $stm->bindValue(':' . $f, $v);
            }
            $stm->execute();
            return true;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}