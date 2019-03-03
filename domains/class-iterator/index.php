<?php 
class myClass implements Iterator, ArrayAccess { 
private $index = 0; 
private $array; 
public function __construct($array) 
{ 
$this->array = $array; 
} 

public function key() 
{ 
return $this->index; 
} 
public function next() 
{ 
$this->index++; 
} 
public function current() 
{ 
return $this->array[$this->index]; 
} 
public function rewind() 
{ 
$this->index = 0; 
} 
public function valid () 
{ 
return isset($this->array[$this->index]); 
} 
	public function offsetExists($index) {
            return isset($this->array[$index]);
        }
        
        public function offsetGet($index) {
            return $this->array[$index];
        }
        
        public function offsetSet($index, $value) {
            $this->array[$index] = $value;
			
        }
        
        public function offsetUnset($index) {
            unset($this->array[$index]);
        }
} 
$arr = ['Max','Igor','Fedor','Mikhail','Juliya']; 
$list = new myClass($arr); 
//print_r($arr).'<br>';

foreach ($list as $key => $value){ 
echo $key.' => '.$value.'<br>'; 
} 

$list['5'] = 'Nina';
echo '<br';
echo $list['5'].'<br>';
echo '<pre>';
print_r($list).'<br>';
echo '</pre>';
foreach ($list as $k => $val){ 
echo $k.' => '.$val.'<br>'; 
} 

?>