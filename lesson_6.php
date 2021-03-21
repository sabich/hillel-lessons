<?php
interface Animal
{
    public function getType():string;
    public function getColor():string;
    public function getEat():string;
}

interface Area
{
    public function getArea():string;
}

class Alligator implements Animal,Area
{
    protected string $type = 'pretator';
    protected string $color = 'green';
    protected string $eat = 'meat';
    protected string $area = 'water';

    public function getType(): string
    {
        return $this->type;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getEat(): string
    {
        return $this->eat;
    }

    public function getArea(): string
    {
        return $this->area;
    }
}

class Pig implements Animal
{
    protected string $type = 'herbivorous';
    protected string $color = 'pink';
    protected string $eat = 'meat';

    public function getType(): string
    {
        return $this->type;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getEat(): string
    {
        return $this->eat;
    }
}

class Peggy extends Pig implements Area
{

    protected string $area = 'earth';

    public function getArea(): string
    {
        return $this->area;
    }
}

trait Test
{
    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }

    public function percent(int $a, int $b): int
    {
        return ($a/$b)*100;
    }
}

class Math
{
    use Test;
    public function __call($name, $arguments)
    {
        var_dump('function name: ' .$name);
        var_dump($arguments);
    }
}

$obj = new Math();
$obj->sum(2,5);
$obj->test = 10;
$obj->test('test');
var_export($obj->test);