<?php
namespace App\Contracts;

interface ImportContract
{
    /**
     * Returns true if import was successful otherwise false
     * @return bool
     * Throws exception if import inherently fails
     * @throws \Exception
     */
    public function import(): bool;
}
