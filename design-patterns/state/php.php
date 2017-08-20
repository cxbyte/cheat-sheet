<?php

abstract class AbstractState
{
    public function opened()
    {
        throw new \Exception('Тикет не может быть открыт');
    }

    public function processing()
    {
        throw new \Exception('Тикет не может быть обработан');
    }

    public function closed()
    {
        throw new \Exception('Тикет не может быть закрыт');
    }
}

class OpenedState extends AbstractState
{
    public function processing()
    {
        return 'Тикет в обработке';
    }
}

class ProcessingState extends AbstractState
{
    public function closed()
    {
        return 'Тикет закрыт';
    }
}

class ClosedState extends AbstractState
{
}

$inOpenedStatus = new OpenedState();

foreach (['opened', 'processing', 'closed'] as $method) {
    try {
        var_dump(call_user_func(array($inOpenedStatus, $method)));
    } catch (\Exception $e) {
        var_dump($e->getMessage());
    }
}
