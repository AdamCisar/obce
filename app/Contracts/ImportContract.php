<?php
namespace App\Contracts;

interface ImportContract
{
    /**
     * Throws exception if import inherently fails
     * @throws \Exception
     */
    public function import(): void;
}
