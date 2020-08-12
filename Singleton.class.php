<?php
  /**
   *  单例模式
   *      最多只会产生一个对象的设计思想（一次运行中）
   *      三私一共
   *          私有化构造方法，不让类在外部产生多个对象
   *          私有化clone 方法
   *          私有化静态对象 保存已经产生的对象
   *          公有化静态方法，运行进入类内部产生对象
   */
  class Singleton
  {
      private $obj = NULL;
      private function __construct(){}
      private function __clone(){}
      public static function getInstance()
      {
          #判断对象是否产生
          #instanceof  作用：（1）判断一个对象是否是某个类的实例，（2）判断一个对象是否实现了某个接口。

          if(!self::$obj instanceof self)
          {
              self::$obj = new self();
          }
          return self::$obj;
      }
  }
  //无论如何调用都只生成一个对象
  $s1 = Singleton::getInstance();
  $s2 = Singleton::getInstance();

?>
