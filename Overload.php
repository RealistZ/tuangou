<?php
  /**
   *  php重载
   */
  #属性重载
  class Man
  {
      private $age = 10;
      //读取重载 处理
      public function __get($key)
      {
          echo __METHOD__.'() '.$key.':属性不能访问';
          //还可以定义一个允许访问列表，如果在类表内就可以返回,否则返回false
          $allow  = array('age');
          if(in_array($key,$allow))
          {
              return $this->$key;
          }

      }
      //写入重载
      public function __set($key,$value)
      {
          echo $key.':'.$value;
      }
      //检查是否存在
      public function __isset($key)
      {
          echo $key,__METHOD__,'<BR/>';
      }
      //删除重载
      public function __unset($key)
      {
          echo $key,__METHOD__,'<BR/>';
      }
  }
  $m = new Man();
  #读重载
  // $m->age;//输出：Man::__get() age:属性不能访问
  #写重载
  // $m->age = 12;//输出 age:12
  #检查是否存在
  isset($m->age);//ageMan::__isset
  unset($m->age);//ageMan::__unset

  //方法重载
  /**
   *
   */
  class Man
  {
      //普通方法
      #name 访问受限的方法名字
      #args 访问参数
      function __call($name,$args)
      {
        //还可以定义一个允许访问列表，如果在类表内就可以返回,否则返回false
          $allow  = array('age');
          if(in_array($name,$allow))
          {
              return $this->$name(implode($args,','));
          }
      }
      //静态方法
      function __callstatic($name,$args)
      {
        // code...
      }
  }

?>
