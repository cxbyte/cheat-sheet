<?php
class IndependentDeveloper1
{
    public function calc($a, $b) {
        return $a + $b;
    }
}

class IndependentDeveloper2
{
    public function nameIsVeryLongAndUncomfortable($a, $b) {
        return $a + $b;
    }
}

interface IAdapter
{
    public function sum($a, $b);
}

class ConcreteAdapter1 implements IAdapter
{
    protected $object;

    public function __construct() {
        $this->object = new IndependentDeveloper1();
    }
    public function sum($a, $b) {
        return $this->object->calc($a, $b);
    }
}

class ConcreteAdapter2 implements IAdapter
{
    protected $object;

    public function __construct() {
        $this->object = new IndependentDeveloper2();
    }
    public function sum($a, $b) {
        return $this->object->nameIsVeryLongAndUncomfortable($a, $b);
    }
}
//в одном месте мы создаем конкретный адаптер а потом пользуемся интерфейсом
$adapter1 = new ConcreteAdapter1();
$adapter2 = new ConcreteAdapter2();

/**
 * Везде в коде мы не используем классы напрямую а через интерфейс
 * этой функции нет разницы какой класс мы используем, так как мы опираемся на интерфейс
 *
 * @param IAdapter $adapter
 */
function sum(IAdapter $adapter) {
    echo $adapter->sum(2, 2);
}

sum($adapter1);
sum($adapter2);
