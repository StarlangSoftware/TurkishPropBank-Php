<?php

namespace olcaytaner\Propbank;

class FramesetArgument
{
    private string $argumentType;
    private string $function;
    private string $definition;

    /**
     * A constructor of {@link FramesetArgument} class which takes argumentType and definition as input and initializes corresponding attributes
     *
     * @param string $argumentType  ArgumentType of the frameset argument
     * @param string $definition  Definition of the frameset argument
     * @param string $function  Function of the frameset argument
     */
    public function __construct(string $argumentType, string $definition, string $function){
        $this->argumentType = $argumentType;
        $this->function = $function;
        $this->definition = $definition;
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
     * Accessor for function.
     *
     * @return string function.
     */
    public function getFunction(): string
    {
        return $this->function;
    }

    /**
     * Accessor for definition.
     *
     * @return string definition.
     */
    public function getDefinition(): string
    {
        return $this->definition;
    }

    /**
     * Mutator for definition.
     *
     * @param string $definition to set.
     */
    public function setDefinition(string $definition): void
    {
        $this->definition = $definition;
    }

    /**
     * Mutator for function.
     *
     * @param string $function to set.
     */
    public function setFunction(string $function): void
    {
        $this->function = $function;
    }

    /**
     * toString converts an {@link FramesetArgument} to a string. It returns argument string which is in the form of
     * argumentType:definition
     *
     * @return string form of frameset argument
     */
    public function __toString(): string{
        return $this->argumentType . ":" . $this->definition;
    }
}