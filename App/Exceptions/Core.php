<?php

namespace App\Exceptions;

class Core
    extends \Exception
{
    public function getSqlAndParamsFromTrace()
    {
        $params = 'Отсутствуют';
        if (!empty($this->getTrace()[0]['args'][2])) {
            $params = '';
            foreach ($this->getTrace()[0]['args'][2] as $k => $v) {
                $params .= $k . ' = ' . $v;
            }
        }
        $sql = $this->getTrace()[0]['args'][0];
        return $sql . ' Параметры ' . $params;
    }
}