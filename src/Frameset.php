<?php

namespace olcaytaner\Propbank;

use olcaytaner\XmlParser\XmlElement;

class Frameset
{
    private array $framesetArguments;
    private string $id;

    /**
     * Another constructor of {@link Frameset} class which takes XmlDocument as input and reads the frameset
     *
     * @param mixed $framesetNode  inputStream to read frameset
     */
    public function __construct(mixed $framesetNode)
    {
        $this->framesetArguments = [];
        if ($framesetNode instanceof XmlElement) {
            $this->id = $framesetNode->getAttributeValue("id");
            $argument = $framesetNode->getFirstChild();
            while ($argument != null) {
                $framesetArgument = new FramesetArgument($argument->getAttributeValue("name"), $argument->getPcData(), $argument->getAttributeValue("function"));
                $this->framesetArguments[] = $framesetArgument;
                $argument = $argument->getNextSibling();
            }
        } else {
            $this->id = $framesetNode;
        }
    }

    /**
     * containsArgument method which checks if there is an {@link Argument} of the given argumentType.
     *
     * @param ArgumentType $argumentType  ArgumentType of the searched {@link Argument}
     * @return bool true if the {@link Argument} with the given argumentType exists, false otherwise.
     */
    public function containsArgument(ArgumentType $argumentType): bool{
        foreach ($this->framesetArguments as $framesetArgument) {
            if ($framesetArgument instanceof FramesetArgument && ArgumentTypeStatic::getArguments($framesetArgument->getArgumentType()) == $argumentType){
                return true;
            }
        }
        return false;
    }

    /**
     * The addArgument method takes a type and a definition of a {@link FramesetArgument} as input, then it creates a
     * new FramesetArgument from these inputs and adds it to the framesetArguments {@link Array}.
     *
     * @param string $type  Type of the new {@link FramesetArgument}
     * @param string $definition Definition of the new {@link FramesetArgument}
     * @param string $function Function of the new {@link FramesetArgument}
     */
    public function addArgument(string $type, string $definition, string $function): void{
        $check = false;
        foreach ($this->framesetArguments as $framesetArgument) {
            if ($framesetArgument instanceof FramesetArgument && $framesetArgument->getArgumentType() == $type) {
                $framesetArgument->setDefinition($definition);
                $check = true;
                break;
            }
        }
        if (!$check) {
            $arg = new FramesetArgument($type, $definition, $function);
            $this->framesetArguments[] = $arg;
        }
    }

    /**
     * The deleteArgument method takes a type and a definition of a {@link FramesetArgument} as input, then it searches for the FramesetArgument with these type and
     * definition, and if it finds removes it from the framesetArguments {@link ArrayList}.
     *
     * @param string $type  Type of the to be deleted {@link FramesetArgument}
     * @param string $definition Definition of the to be deleted {@link FramesetArgument}
     */
    public function deleteArgument(string $type, string $definition): void{
        $index = 0;
        foreach ($this->framesetArguments as $framesetArgument) {
            if ($framesetArgument instanceof FramesetArgument && $framesetArgument->getArgumentType() == $type && $framesetArgument->getDefinition() == $definition) {
                array_splice($this->framesetArguments, $index, 1);
                break;
            }
            $index++;
        }
    }

    /**
     * Accessor for framesetArguments.
     *
     * @return array framesetArguments.
     */
    public function getFramesetArguments(): array
    {
        return $this->framesetArguments;
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
     * Mutator for id.
     *
     * @param string $id id to set.
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}