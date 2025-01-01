<?php

namespace olcaytaner\Propbank;

class Role
{
    private string $description;
    private string $f;
    private string $n;

    /**
     * A constructor of {@link Role} class which takes description, f, and n as inputs and initializes corresponding with these inputs.
     *
     * @param string $description  Description of the role
     * @param string $f Argument Type of the role
     * @param string $n  Number of the role
     */
    public function __construct(string $description, string $f, string $n){
        $this->description = $description;
        $this->f = $f;
        $this->n = $n;
    }

    /**
     * Accessor for description.
     *
     * @return string description.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Accessor for f.
     *
     * @return string f.
     */
    public function getF(): string
    {
        return $this->f;
    }

    /**
     * Accessor for n.
     *
     * @return string n.
     */
    public function getN(): string
    {
        return $this->n;
    }

    /**
     * Constructs and returns the argument type for this role.
     *
     * @return ArgumentType Argument type for this role.
     */
    public function getArgumentType(): ArgumentType{
        return ArgumentTypeStatic::getArguments("ARG" . strtoupper($this->f));
    }

}