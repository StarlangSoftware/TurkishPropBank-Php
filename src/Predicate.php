<?php

namespace olcaytaner\Propbank;

class Predicate
{
    private string $lemma;
    private array $roleSets;

    /**
     * A constructor of {@link Predicate} class which takes lemma as input and initializes lemma with this input.
     * The constructor also initializes the roleSets array.
     *
     * @param string $lemma  Lemma of the predicate
     */
    public function __construct(string $lemma){
        $this->lemma = $lemma;
        $this->roleSets = [];
    }

    /**
     * Accessor for lemma.
     *
     * @return string lemma.
     */
    public function getLemma(): string
    {
        return $this->lemma;
    }

    /**
     * The addRoleSet method takes a {@link RoleSet} as input and adds it to the roleSets {@link ArrayList}.
     *
     * @param roleSet $roleSet RoleSet to be added
     */
    public function addRoleSet(RoleSet $roleSet): void{
        $this->roleSets[] = $roleSet;
    }

    /**
     * The size method returns the size of the roleSets {@link Array}.
     *
     * @return int the size of the roleSets {@link Array}.
     */
    public function size(): int{
        return count($this->roleSets);
    }

    /**
     * The getRoleSet method returns the roleSet at the given index.
     *
     * @param mixed $index  Index of the roleSet
     * @return RoleSet|null {@link RoleSet} at the given index.
     */
    public function getRoleSet(mixed $index): ?RoleSet{
        if (is_numeric($index)) {
            return $this->roleSets[$index];
        } else {
            foreach ($this->roleSets as $roleSet) {
                if ($roleSet instanceof RoleSet && $roleSet->getId() === $index) {
                    return $roleSet;
                }
            }
            return null;
        }
    }
}