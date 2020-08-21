<?php

/**
 * 
 */
interface  AnotherClass{

	const foot = '骨头';//定义一个食物常量

    public function eat();//定义一个吃的方法这里注意不能加大括号 
}

class ClassName implements AnotherClass{
	
	function __construct()
	{
		echo self::foot;
		echo $this->eat();
	}
	 
	public function name()
	{

	}

	public function __unset($key){

	}
	public function __get($key)
	{
		
	}
}
