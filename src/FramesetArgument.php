<?php

namespace olcaytaner\Propbank;

class FramesetArgument
{
    private string $argumentType;
    private string $function;
    private string $definition;
    private string $grammaticalCase;

    /**
     * A constructor of {@link FramesetArgument} class which takes argumentType and definition as input and initializes corresponding attributes
     *
     * @param string $argumentType  ArgumentType of the frameset argument
     * @param string $definition  Definition of the frameset argument
     * @param string $function  Function of the frameset argument
     * @param string $grammaticalCase Grammatical case of the frameset argument
     */
    public function __construct(string $argumentType, string $definition, string $function, string $grammaticalCase){
        $this->argumentType = $argumentType;
        $this->function = $function;
        $this->definition = $definition;
        $this->grammaticalCase = $grammaticalCase;
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
     * Accessor for grammaticalCase.
     *
     * @return string grammatical case.
     */
    public function getGrammaticalCase(): string
    {
        return $this->grammaticalCase;
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
     * Mutator for grammaticalCase.
     *
     * @param string $grammaticalCase to set.
     */
    public function setGrammaticalCase(string $grammaticalCase): void
    {
        $this->grammaticalCase = $grammaticalCase;
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