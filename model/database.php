<?php
class database{
    var $_dbh= '';
    var $_sql= '';
    var $_cursor= NULL;



    public function database($_sql = 'set names "utf8"'){
        $this->_dbh = new PDO('mysql:host=localhost:3306; dbname=qlcsv','root','');
        $this->_dbh->query('set names "utf8"');
        $this->setQuery($_sql);
    }

	/**
	 * database constructor.
	 * @param string $_sql
	 */

	public function setQuery($sql){
        $this->_sql=$sql;
    }
    public function execute($options=array()){
        $this->_cursor=$this->_dbh->prepare($this->_sql);
        if($options){
            for($i=0;$i<count($options);$i++){
                $this->_cursor->bindParam($i+1,$options[$i]);
            }
        }
        $this->_cursor->execute();
        return $this->_cursor;

    }
    public function loadAllRows($options=array()){
        if(!$options){
            if(!$result=$this->execute())
            return false;
        }
        else{
            if(!$result=$this->execute($options))
            return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function loadRow($option=array()){
        if(!$option){
            if(!$result=$this->execute())
            return false;
        }
        else{
            if(!$result=$this->execute($option))
            return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public static function loadAllRowsStatic($sql = 'set names "utf8"'){
		$db = new database($sql);
		$allRow = $db->loadAllRows();
		if (count($allRow)>0){
			return $allRow;
		}else{
			return null;
		}
	}
}
?>