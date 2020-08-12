<?php
   // 工厂模式
   /**
    *
    */
   class Woman
   {

       public function display()
       {
            echo '这是女人';
       }
   }
   class Man
   {

       public function display()
       {
            echo '这是男人';
       }
   }

   //产生工厂类
   class HumanFactory{
      public function getInstance($classname)
      {
          return new $classname();
      }
   }
   $h = new HumanFactory();
   $m = $h->getInstance('Man');
   $m->display();//输出 这是男人

   #静态工厂
   class HumanFactory2
   {
        public static function getInstance($classname)
        {
            if(!class_exists($classname)) return false;
            return new $classname();
        }
   }
   $m = HumanFactory2::getInstance('Man');
   $m->display();
   //静态
?>
