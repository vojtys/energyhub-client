<?php
namespace EnergyHub;

class EnergyHubClientException extends \Exception
{
    private $errors;

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
