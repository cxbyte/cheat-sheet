<?php

interface IResultStrategy
{
    public function getResult(array $data);
}

class JsonStrategy implements IResultStrategy
{
    public function getResult(array $data)
    {
        return json_encode($data);
    }
}

class ArrayStrategy implements IResultStrategy
{
    public function getResult(array $data)
    {
        return $data;
    }
}

class Context
{
    protected $resultStrategy;

    public function __construct(IResultStrategy $strategy)
    {
        $this->resultStrategy = $strategy;
    }

    public function execute()
    {
        $result = [
            'id' => 1,
            'isActive' => true
        ];

        return $this->resultStrategy->getResult($result);
    }
}

/** @var Context $context */
foreach ([new Context(new JsonStrategy()), new Context(new ArrayStrategy())] as $context) {
    var_dump($context->execute());
}