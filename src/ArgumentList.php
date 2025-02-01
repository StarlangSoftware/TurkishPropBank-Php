<?php

namespace olcaytaner\Propbank;

class ArgumentList
{
    private array $arguments;

    /**
     * Constructor of argument list from a string. The arguments for a word is a concatenated list of arguments
     * separated via '#' character.
     * @param $argumentList string String consisting of arguments separated with '#' character.
     */
    public function __construct(string $argumentList){
        $this->arguments = [];
        $items = preg_split( "#", $argumentList);
        foreach ($items as $item) {
            $this->arguments[] = new Argument($item);
        }
    }

    /**
     * Overloaded toString method to convert an argument list to a string. Concatenates the string forms of all
     * arguments with '#' character.
     * @return String form of the argument list.
     */
    public function __toString(): string{
        if (count($this->arguments) === 0) {
            return "NONE";
        } else {
            $result = $this->arguments[0]->__toString();
            for ($i = 1; $i < count($this->arguments); $i++) {
                $result .= "#" . $this->arguments[$i]->__toString();
            }
            return $result;
        }
    }

    /**
     * Replaces id's of predicates, which have previousId as synset id, with currentId.
     * @param $previousId string Previous id of the synset.
     * @param $currentId string Replacement id.
     */
    public function updateConnectedId(string $previousId, string $currentId): void{
        foreach ($this->arguments as $argument) {
            if ($argument->getId() == $previousId) {
                $argument->setId($currentId);
            }
        }
    }

    /**
     * Adds a predicate argument to the argument list of this word.
     * @param $predicateId string Synset id of this predicate.
     */
    public function addPredicate(string $predicateId): void{
        if (count($this->arguments) != 0 && $this->arguments[0]->getArgumentType() == "NONE") {
            array_splice($this->arguments, 0);
        }
        $this->arguments[] = new Argument("PREDICATE", $predicateId);
    }

    /**
     * Removes the predicate with the given predicate id.
     */
    public function removePredicate(): void{
        for ($i = 0; $i < count($this->arguments); $i++) {
            $argument = $this->arguments[$i];
            if ($argument->getArgumentType() == "PREDICATE") {
                array_splice($this->arguments, $i, 1);
                break;
            }
        }
    }

    /**
     * Checks if one of the arguments is a predicate.
     * @return True, if one of the arguments is predicate; false otherwise.
     */
    public function containsPredicate(): bool{
        foreach ($this->arguments as $argument) {
            if ($argument->getArgumentType() == "PREDICATE") {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if one of the arguments is a predicate with the given id.
     * @param $predicateId string Synset id to check.
     * @return True, if one of the arguments is predicate; false otherwise.
     */
    public function containsPredicateWithId(string $predicateId): bool{
        foreach ($this->arguments as $argument) {
            if ($argument->getArgumentType() == "PREDICATE" && $argument->getId() == $predicateId) {
                return true;
            }
        }
        return false;
    }

    /**
     * Returns the arguments as an array list of strings.
     * @return array Arguments as an array list of strings.
     */
    public function getArguments(): array{
        $result = [];
        foreach ($this->arguments as $argument) {
            $result[] = $argument->__toString();
        }
        return $result;
    }

    /**
     * Checks if the given argument with the given type and id exists or not.
     * @param $argumentType string Type of the argument to search for.
     * @param $id string Id of the argument to search for.
     * @return True if the argument exists, false otherwise.
     */
    public function containsArgument(string $argumentType, string $id): bool{
        foreach ($this->arguments as $argument) {
            if ($argument->getArgumentType() == $argumentType && $argument->getId() == $id) {
                return true;
            }
        }
        return false;
    }
}