<?php

//difference way to work with database
class DB {
    private static $_instance = null;
    private $_pdo,//new pdo that store obj
            $_query,//last query that's executed
            $_error = false,//is there an error or not?
            $_results,//stores results sets Ex: Select * FROM name = Stac
            $_count = 0; //have any results been returned?

    //connects to database
    private function __construct() {
        try {
            //look at init.php array to remember
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        //*dealing with static use 'self'
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    /* ex of what public function query is doing:
     DB::getInstance()->query("SELECT username FROM user WHERE username = ? OR username", array(
     'susie',
     'lucy'
   ));
     */
    public function query($sql, $params = array()) {
        //reset error bck to false
        $this->_error = false;
        //prepare query ex: DB::getInstance()-> query("a");
        if($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if(count($params)) {
                //bind parameter ex: DB::getInstance()->query("SELECT username FROM users WHERE username = ?," array('alex,', 'billy'));
                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            //executing query
            if($this->_query->execute()) {
                //store results and fetchAll
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                //will need to create an error function below
                $this->_error = true;
            }
        }
        return $this;
    }
    //basically focus on the WHERE
    public function action($action, $table, $where = array()) {
        if(count($where) === 3) {
            //allows certain operators to be in here ex: $user = DB::getInstance()->get('users', array('username', '=', 'susie'))
            $operators = array('=', '>', '<', '>=', '<=');
            //ex: username
            $field = $where[0];
            //ex: = > <
            $operator = $where[1];
            //ex: name, id, etc
            $value = $where[2];
            if(in_array($operator, $operators)) {
                //SELECT * FROM users WHERE username = '' ";
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }
    public function insert($table, $fields = array()) {
        $keys = array_keys($fields);
        $values = null;
        $x = 1;
        foreach($fields as $field) {
            $values .= '?';
            if ($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        }
        $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
        if(!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }
    //update makes use of action function
    public function update($table, $id, $fields) {
        $set = '';
        $x = 1;
        foreach($fields as $name => $value) {
            $set .= "{$name} = ?";
            if($x < count ($fields)) {
                $set .= ', ';
            }
            $x++;
        }
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
        if(!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }
    //delete makes use of action function
    public function delete($table, $where) {
        return $this->action('DELETE ', $table, $where);
    }
    //get makes use of action function
    public function get($table, $where) {
        return $this->action('SELECT *', $table, $where);
    }
    public function results() {
        return $this->_results;
    }
    public function first() {
        $data = $this->results();
        return $data[0];
    }
    public function count() {
        return $this->_count;
    }
    //error function that we needed to create
    public function error() {
        return $this->_error;
    }
}