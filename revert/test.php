<?php

namespace Tests;

use Revert\Revert;

class revertTest
{
    /**
     * @param string $data
     * @param string $expect
     * @return string[]
     */
    public function try(string $data, string $expect): array
    {
        $result = Revert::revertCharacters($data);
        if ($result === $expect) {
            return [
                'STATUS' => 'success',
                'MESSAGE' => 'Returned: ' . $result . ', expected: ' . $expect
            ];
        }
        else return [
            'STATUS' => 'failure',
            'MESSAGE' => 'Returned: ' . $result . ', expected: ' . $expect
        ];
    }
}