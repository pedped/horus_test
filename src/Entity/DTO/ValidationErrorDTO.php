<?php

namespace App\Entity\DTO;

/**
 * this class will be used for validation
 */
class ValidationErrorDTO
{

    public string $errorMessage;

    public function __construct(string $errorMessage)
    {

        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }
}