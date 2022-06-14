<?php

namespace App\Entity\Helpers;

use App\Entity\DTO\ValidationErrorDTO;

class ValidationErrorManager
{
    /**
     * this will get the error message and make a good DTO for that
     * @param \Symfony\Component\Validator\ConstraintViolationList $errors
     * @return ValidationErrorDTO
     */
    public static function getNiceOutput(\Symfony\Component\Validator\ConstraintViolationList $errors): ValidationErrorDTO
    {
        $result = array();
        foreach ($errors as $error) {
            $result[] = $error->getMessage();
        }
        $message = implode(", ", $result);

        // now, make a good DTO for this object
        return new ValidationErrorDTO($message);
    }
}