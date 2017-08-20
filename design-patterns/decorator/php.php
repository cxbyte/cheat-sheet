<?php

interface IResult
{
    public function getResult(): array;
}

class Result implements IResult
{
    public function getResult(): array
    {
        return [
            [
                'id' => 1,
                'isActive' => true
            ],
            [
                'id' => 2,
                'isActive' => false
            ],
        ];
    }
}

class DecoratorShouldActive implements IResult
{
    protected $object;

    public function __construct(IResult $result)
    {
        $this->object = $result;
    }

    public function getResult(): array
    {
        return array_filter($this->object->getResult(), function ($res){
            return $res['isActive'] ?? false;
        });
    }
}

/**
 * @var $decorator IResult
 */
foreach ([new Result(), new DecoratorShouldActive(new Result())] as $decorator) {
    var_dump($decorator->getResult());
}