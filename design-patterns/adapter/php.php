<?php

interface IResult
{
    public function getResult(): array;
}

class ResultFile
{
    public function getResultFromFile(): array
    {
        return ['result' => 'file'];
    }
}

class ResultDB
{
    public function getResultFromDB(): array
    {
        return ['result' => 'db'];
    }
}

class FileAdapter implements IResult
{
    protected $object;

    public function __construct()
    {
        $this->object = new ResultFile();
    }

    public function getResult(): array
    {
        return $this->object->getResultFromFile();
    }
}

class DBAdapter implements IResult
{
    protected $object;

    public function __construct()
    {
        $this->object = new ResultDB();
    }

    public function getResult(): array
    {
        return $this->object->getResultFromDB();
    }
}

/**
 * @var $adapter IResult
 */
foreach ([new FileAdapter(), new DBAdapter()] as $adapter) {
    var_dump($adapter->getResult());
}