<?php

namespace App;

class MultiException extends \App\Exceptions\Core implements \ArrayAccess, \Iterator
{

    use TCollection;

    public function getMessagesFromMultiexceptionToString()
    {
        $messagesMultiexceptions = '';
        foreach ($this as $k => $v) {
            $messagesMultiexceptions .= $v->getMessage() . PHP_EOL;
        }
        return $messagesMultiexceptions;
    }

    public function getDataForEditingFromPost()
    {
        return $this->getTrace()[0]['args'][0];

    }
}
