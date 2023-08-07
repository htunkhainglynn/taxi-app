<?php
//class Ourlesson{
//    function user(){
//        return "Mg Mg";
//    }
//    function guest(){
//        return "Ko Ko";
//    }
//}
class Ourtraining{
    var $extra="7 AM";//variable,class->property/public and var are the same
    public $one=" I am public ";//can call any where
    private $two=" I am private ";//can call only internal class
    protected $three=" I am protected ";//can call internal and extend class
    function test(){
        return $this->one."and".$this->two." and ".$this->three;
    }
    function sat(){
        return "9AM to 12PM,Extra time is ".$this->extra;
    }
    function sun(){
        return "9AM to 12PM";
    }
    function oneWeek(){
        return "Saturday is : ".$this->sat()." and Sunday is : ".$this->sun();
    }
    function __destruct()
    {
        echo "I am destruct";
    }
    function __construct()
    {
        echo "I am construct";
    }
}
class Mawlaymyine extends Ourtraining{
    function test1(){
        return " Can show ".$this->one."and".$this->three;
    }
    function morning(){
        return $this->extra;
    }
}
//$u=new Ourlesson();
//echo $u->user();
//echo "<br>";
//echo $u->guest();

//$i=new Ourtraining();
//echo "<br>";
//echo $i->sun();
//echo $i->oneWeek();

//$a=new Mawlaymyine();
//echo $a->one;
//echo $this->extra;
//echo $this->one;
//echo $this->two;
//echo $this->three;

$i=new Ourtraining();
echo "Can show ".$i->one." and ".$i->test();