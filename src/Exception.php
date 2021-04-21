<?php
namespace EnergyHub\ApiClient;

class Exception extends \Exception
{
    private array $errors;

    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }
}
