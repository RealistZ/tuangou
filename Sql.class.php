<?php
  /**
   * 封装mysqli 的操作类
   */
  class Sql
  {
      // 链接数据库参数
      private $host;
      private $port;
      private $user;
      private $pass;
      private $dbname;
      private $charset;
      //设定错误记录
      private $error;
      private $errno;

      public $link;

      public function __construct(array $arr = [])
      {
         $this->host = $arr['host']  ?? '127.0.0.1';
         $this->port = $arr['port']  ?? '3306';
         $this->user = $arr['user']  ?? 'root';
         $this->pass = $arr['pass']  ?? 'root';
         $this->dbname = $arr['dbname']  ?? 'laravel';
         $this->charset = $arr['charset']  ?? 'utf8';

         if(!$this->connect()) return;
         $this->charset();
      }

      //链接认证
      private function connect()
      {
          $this->link = @mysqli_connect($this->host,$this->user,$this->pass,$this->dbname,$this->port);
          if(!$this->link)
          {
              $this->errno = mysqli_connect_errno();
              $this->error = mysqli_connect_error();
              return false;
          }
          return true;
      }
      //设置字符集
      private function charset()
      {
          $rs = mysqli_set_charset($this->link,$this->charset);

          if(!$rs)
          {
              $this->error = mysqli_error();
              $this->errno = mysqli_errno();
              return false;
          }
      }
      //SQL 执行检查
      private function check($sql)
      {
          $rs = mysqli_query($this->link,$sql);
          if(!$rs)
          {
              $this->error = mysqli_error($this->link);
              $this->errno = mysqli_errno($this->link);
              return false;
          }
          return $rs;
      }
      //写操作
      public function write($sql)
      {
          $rs = $this->check($sql);
          return $rs ? mysqli_affected_rows($this->link) : false;
      }
      //获取自增id
      public function insert_id()
      {
          return mysqli_insert_id($this_liunk);
      }
      //读操作 一条记录
      public $columns = 0;
      public function red_one($sql)
      {
          $rs = $this->check($sql);
          $this->columms = @mysqli_field_count($this->Link);
          return  $rs ? mysqli_fetch_assoc($rs) :  false;
      }
      public $rows = 0;
      //读取多条记录
      public function red_all($sql)
      {
          $rs = $this->check($sql);

          if(!$rs) return false;

          $this->rows = @mysqli_num_rows($rs);

          $list = [];

          while ($row = @mysqli_fetch_assoc($rs)) $list = $row;

          return $list;
      }
      public static $name = 'Sql';
      public static function ShowName()
      {
          echo self::$name;
          echo static::$name;
      }
  }
  $s1 = new Sql();
  $rs = $s1->red_all('desc users');
  // var_dump($rs);
  /**
   * 继承，除了私有方法和私有成员其他都可以被继承
   *      __construct __destruct也可以被继承
   *      php 只能单继承
   *      final 表时 最终类即不能再被继承，可以保护类机构
   * override 重写 子类可以重写父类任意成员
   *          属性：之恶杰覆盖 私有除外。
   *          方法：同时存在
   * parentt::访问父类方法/重写的静态成员
   */
  class Mysql extends Sql
  {
    #静态延迟绑定 static::静态成员
    public static $name = 'Mysql';

  }
  Sql::ShowName();//输出 Sql Sql self 只绑定当前类$name，与被谁继承无关
  Mysql::ShowName(); //输出 Sql Mysql 因为重写后访问的类是Mysql 的$name






?>
