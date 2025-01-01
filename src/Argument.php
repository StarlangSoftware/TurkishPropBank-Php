<?php

namespace olcaytaner\Propbank;

class Argument
{
    private string $argumentType;
    private string $id;

    /**
     * A constructor of {@link Argument} class which takes argument string which is in the form of argumentType$id
     * and parses this string into argumentType and id. If the argument string does not contain '$' then the
     * constructor return a NONE type argument.
     *
     * @param string $argumentType Argument string containing the argumentType and id
     * @param string|null $id Id of the argument
     */
    public function __construct(string $argumentType, string $id = null){
        if ($id == null) {
            if (str_contains($argumentType, '$')) {
                $this->argumentType = substr($argumentType, 0, strpos($argumentType, '$'));
                $this->id = substr($argumentType, strpos($argumentType, '$') + 1);
            } else {
                $this->argumentType = "NONE";
            }
        } else {
            $this->argumentType = $argumentType;
            $this->id = $id;
        }
    }

    /**
     * Accessor for argumentType.
     *
     * @return string argumentType.
     */
    public function getArgumentType(): string
    {
        return $this->argumentType;
    }

    /**
     * Accessor for id.
     *
     * @return string id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * toString converts an {@link Argument} to a string. If the argumentType is "NONE" returns only "NONE", otherwise
     * it returns argument string which is in the form of argumentType$id
     *
     * @return string string form of argument
     */
    public function __toString(): string{
        if ($this->argumentType == "NONE") {
            return $this->argumentType;
        } else {
            return $this->argumentType . "$" . $this->id;
        }
    }
}