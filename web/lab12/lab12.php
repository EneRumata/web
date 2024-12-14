<?php
	class BaseClass {
		public $name;
		public $className = 'BaseClass';
		
		function __construct($name) {
			$this->name = $name;
			echo "Вызов конструктора базового класса для объекта {$this->name} <br>";
		}
		
		function __destruct() {
			echo "Вызов деструктора базового класса для объекта {$this->name} <br>";
		}
		
		function __toString() {
			return "Объект класса {$this->className} с именем {$this->name}";
		}
		
		function __get($prop) {
			if(!isset($this->prop)) {
				echo "Нет свойства с именем {$prop}<br>";
			} else return $this->prop;
		}
		
		function __set($prop, $value) {
			if(!isset($this->prop)) {
				echo "Нельзя присвоить свойству {$prop} значение {$value}<br>";
			} else $this->prop = $value;
		}
		
		function __call($method, $args) {
			echo "Нельзя вызвать метод {$method} с аргументами ".implode(', ', $args)."<br>";
			return 'Ошибка!';
		}
		
		function __clone() {
			$this->name = 'x'.$this->name;
		}
		
		function __sleep() {
			return array('name');
		}
		
		function __wakeup() {
			$this->className = 'BaseClass';
		}
	}
	
	class SubClass extends BaseClass {	
		
		function __construct($name) {
			echo "Вызов конструктора дочернего класса для объекта {$name} <br>";
			parent::__construct($name);
		}
		
		function __destruct() {
			echo "Вызов деструктора дочернего класса для объекта {$this->name} <br>";
		}
		
		function __toString() {
			return "Объект класса SubClass с именем {$this->name}";
		}
	}
	
	$obj = new BaseClass("Объект1");
	echo $obj . "<br>";
	$obj = null;
	
	echo "<br>";
	
	$obj = new SubClass("Объект2");
	echo $obj . "<br>";
	$obj = null;
	
	echo "<br>";
	
	$obj = new BaseClass("Объект3");
	echo $obj . "<br>";
	$obj = null;
	
	echo "<br>";
	
	$obj = new BaseClass("Объект4");
	echo "---".$obj->nonExistingProp."+++<br>"; // В данном случае выведется соответсвующее сообщение, а в строке между плюсами и минусами ничего не будет, так как свойсто не задано
	// Также, после добавления функции __set в класс добавится вывод сообщения о невозможности установить значение свойству
	$obj->nonExistingProp = "existingProp"; // Устанавливаем свойство
	echo "---".$obj->nonExistingProp."+++<br>"; // В данном случае между плюсами и минусами будет значение свойства, так как оно уже задано. После добавления функции
	// __set свойство не будет выведено, так как не будет установлено
	
	// Попробуем вызвать несуществующий метод объекта. Возникнет ошибка. После добавления в класс метода __call вместо ошибки будет выводиться соответствующее
	// сообщение
	$obj->missingMethod(1, 2);
	
	echo "<br>";
	
	$obj1 = clone $obj;
	echo "obj1 = ".$obj1."<br>";
	$obj2 = clone $obj1;
	echo "obj2 = ".$obj2."<br>";
	
	echo "<br>";
	
	$tmp = serialize($obj2);
	echo "Резульат сериализации: ".$tmp."<br>";
	echo "После десериализации: ".unserialize($tmp)."<br>";
?>