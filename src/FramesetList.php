<?php

namespace olcaytaner\Propbank;

use olcaytaner\XmlParser\XmlDocument;

class FramesetList
{
    private array $frames;

    /**
     * A constructor of {@link FramesetList} class which reads all frameset files inside the files.txt file. For each
     * filename inside that file, the constructor creates a Frameset and puts in inside the frames {@link Array}.
     */
    public function __construct(){
        $this->frames = [];
        $xmlDocument = new XmlDocument("../turkish-propbank.xml");
        $xmlDocument->parse();
        $framesNode = $xmlDocument->getFirstChild();
        $frameSetNode = $framesNode->getFirstChild();
        while ($frameSetNode != null){
            $this->frames[] = new Frameset($frameSetNode);
            $frameSetNode = $frameSetNode->getNextSibling();
        }
    }

    /**
     * frameExists method checks if there is a {@link Frameset} with the given synSet id.
     *
     * @param string $synSetId  Id of the searched {@link Frameset}
     * @return bool true if the {@link Frameset} with the given id exists, false otherwise.
     */
    public function frameExists(string $synSetId): bool{
        foreach ($this->frames as $frame){
            if ($frame instanceOf Frameset && $frame->getId() == $synSetId){
                return true;
            }
        }
        return false;
    }

    /**
     * getFrameSet method returns the {@link Frameset} with the given synSet id.
     *
     * @param mixed $synSetId Id of the searched {@link Frameset}
     * @return Frameset|null {@link Frameset} which has the given id.
     */
    public function getFrameSet(mixed $synSetId): ?Frameset
    {
        if (is_numeric($synSetId)){
            return $this->frames[$synSetId];
        } else {
            foreach ($this->frames as $frame){
                if ($frame instanceOf Frameset && $frame->getId() == $synSetId){
                    return $frame;
                }
            }
        }
        return null;
    }

    /**
     * The addFrameset method takes a {@link Frameset} as input and adds it to the frames {@link ArrayList}.
     *
     * @param Frameset $frameset Frameset to be added
     */
    public function addFrameset(Frameset $frameset): void
    {
        $this->frames[] = $frameset;
    }

    /**
     * The size method returns the size of the frames {@link Array}.
     *
     * @return int the size of the frames {@link Array}.
     */
    public function size(): int{
        return count($this->frames);
    }
}