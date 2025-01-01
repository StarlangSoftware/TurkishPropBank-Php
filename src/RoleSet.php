<?php

namespace olcaytaner\Propbank;

class RoleSet
{
    private string $id;
    private string $name;
    private array $roles;

    /**
     * A constructor of {@link RoleSet} class which takes id and name as inputs and initializes corresponding attributes
     * with these inputs.
     *
     * @param string $id  Id of the roleSet
     * @param string $name Name of the roleSet
     */
    public function __construct(string $id, string $name){
        $this->id = $id;
        $this->name = $name;
        $this->roles = [];
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
     * Accessor for name.
     *
     * @return string name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The addRole method takes a {@link Role} as input and adds it to the roles {@link ArrayList}.
     *
     * @param Role $role  Role to be added
     */
    public function addRole(Role $role): void{
        $this->roles[] = $role;
    }

    /**
     * The getRole method returns the role at the given index.
     *
     * @param int $index  Index of the role
     * @return Role {@link Role} at the given index.
     */
    public function getRole(int $index): Role{
        return $this->roles[$index];
    }

    /**
     * Finds and returns the role with the given argument number n. For example, if n == 0, the method returns
     * the argument ARG0.
     * @param string $n Argument number
     * @return Role|null The role with the given argument number n.
     */
    public function getRoleWithArgument(string $n): ?Role{
        foreach($this->roles as $role){
            if ($role->getN() === $n){
                return $role;
            }
        }
        return null;
    }

    /**
     * The size method returns the size of the roles {@link Array}.
     *
     * @return int the size of the roles {@link Array}.
     */
    public function size(): int{
        return count($this->roles);
    }
}