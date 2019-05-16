<?php


namespace App\Verify;


class Result
{

    /**
     * @var bool
     */
    private $valid;

    /**
     * @var array
     */
    private $errors;

    /**
     * @var string
     */
    private $sid;

    /**
     * Result constructor.
     * @param mixed $value => string $sid | array $errors
     */
    public function __construct($value)
    {
        if(is_string($value)) {
            $this->sid = $value;
            $this->valid = true;
        } else if(is_array($value)){
            $this->errors = $value;
            $this->valid = false;
        } else {
            throw new InvalidArgumentException('Invalid argument: Only string or array allowed.');
        }
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function getSid(): string
    {
        return $this->sid;
    }

}