<?php

namespace olcaytaner\Propbank;

use olcaytaner\XmlParser\XmlDocument;

class PredicateList
{
    private array $list;

    /**
     * A constructor of {@link PredicateList} class which reads all predicate files inside the 'Frames' folder. For each
     * file inside that folder, the constructor creates a Predicate and puts in inside the list Map.
     */
    public function __construct(){
        $this->list = [];
        $xmlDocument = new XmlDocument("../english-propbank.xml");
        $xmlDocument->parse();
        $framesNode = $xmlDocument->getFirstChild();
        $frameSetNode = $framesNode->getFirstChild();
        while ($frameSetNode != null){
            $predicateNode = $frameSetNode->getFirstChild();
            while ($predicateNode != null){
                if ($predicateNode->hasAttributes()){
                    $lemma = $predicateNode->getAttributeValue("lemma");
                    $newPredicate = new Predicate($lemma);
                    $roleSetNode = $predicateNode->getFirstChild();
                    while ($roleSetNode != null){
                        if ($roleSetNode->hasAttributes()){
                            $id = $roleSetNode->getAttributeValue("id");
                            $name = $roleSetNode->getAttributeValue("name");
                            $newRoleSet  = new RoleSet($id, $name);
                            $rolesNode = $roleSetNode->getFirstChild();
                            if ($rolesNode != null){
                                $roleNode = $rolesNode->getFirstChild();
                                while ($roleNode != null){
                                    if ($roleNode->hasAttributes()){
                                        $description = $roleNode->getAttributeValue("description");
                                        $f = $roleNode->getAttributeValue("f");
                                        $n = $roleNode->getAttributeValue("n");
                                        $newRoleSet->addRole(new Role($description, $f, $n));
                                    }
                                    $roleNode = $roleNode->getNextSibling();
                                }
                            }
                            $newPredicate->addRoleSet($newRoleSet);
                        }
                        $roleSetNode = $roleSetNode->getNextSibling();
                    }
                    $this->list[$newPredicate->getLemma()] = $newPredicate;
                }
                $predicateNode = $predicateNode->getNextSibling();
            }
            $frameSetNode = $frameSetNode->getNextSibling();
        }
    }

    /**
     * The size method returns the number of predicates inside the list.
     *
     * @return int the size of the list {@link Map}.
     */
    public function size(): int{
        return count($this->list);
    }

    /**
     * getPredicate method returns the {@link Predicate} with the given lemma.
     *
     * @param string $lemma  Lemma of the searched predicate
     * @return Predicate {@link Predicate} which has the given lemma.
     */
    public function getPredicate(string $lemma): Predicate{
        return $this->list[$lemma];
    }

    /**
     * The method returns all lemma in the predicate list.
     * @return array All lemma in the predicate list.
     */
    public function getLemmaList(): array{
        return array_keys($this->list);
    }
}