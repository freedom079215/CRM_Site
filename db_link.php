<?php
class db
{
   protected $host;
   protected $user;
   protected $db;
   protected $pass;
   public $sql_result;

   public function __construct($user,$pass,$db,$host)
    {
    $this->user = $user;
    $this->pass = $pass;
    $this->db = $db;
    $this->host = $host;
    //$this->process();
    }
    public function tag_query($tag_nm, $tag_desc)
    {
      if($tag_nm == null){
        $sql="SELECT `tag_cd`,`tag_nm` FROM  `tag_info`";        
      }
      else
      {
        $sql="SELECT `tag_cd`,`tag_nm` FROM  `tag_info` WHERE `tag_nm` = '$tag_nm'";        
      }
    	$dsn = "mysql:host=$this->host;dbname=$this->db";
    	$dbh = new PDO($dsn, $this->user, $this->pass);
    	//$sql="SELECT `tag_cd`,`tag_nm` FROM  `tag_info`";
    	$sth = $dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    	if($sth = $dbh->query($sql))
    	{
        	return $result;
    	}
    	$count=$sth->fetchColumn();
    	$dbh = NULL;
    }

    public function data_query($arr)
    {
      //echo $arr."q22";
      $dsn = "mysql:host=$this->host;dbname=$this->db";
      $dbh = new PDO($dsn, $this->user, $this->pass);
      $sql="SELECT `tag_cd`,`tag_nm` FROM  `tag_info` WHERE `tag_cd` IN (".implode(',', $arr).")";
      $sth = $dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      if($sth = $dbh->query($sql))
      {
          return $result;
      }
      $count=$sth->fetchColumn();
      $dbh = NULL;
    }
}
?>

