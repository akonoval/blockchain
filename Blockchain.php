<?php

include "Block.php";

class Blockchain
{
    public array $blocks = [];

    // public function __construct()
    // {
    //     $this->blocks[] = new Block('', '', 0, '');
    // }

    public function addNewBlock(string $from, string $to, int $amount): void
    {
        $prevHash = $this->dataToHash(end($this->blocks));
        $block  = new Block($from, $to, $amount, $prevHash);
        $proof = $this->mineProofOfWork($block);
        $block->setProof($proof);
        $this->blocks[] = $block;
    }

    static public function dataToHash(mixed $data): string
    {
        $stringData = json_encode($data);
        $hash = md5($stringData);
        return mb_strcut($hash, 0, 10);
        
    }

    public function validate(): bool
    {
        $prevBlock = null;
        foreach ($this->blocks as $block) {
            if ($prevBlock !== null) {
                $actualHash = $this->dataToHash($prevBlock);
                if ($block->prevHash !== $actualHash) {
                    return false;
                }
            }
            $prevBlock = $block;
        }
        return true;
    }

    public function print(): void
    {
        $i = 1;
        foreach ($this->blocks as $block) {
            print( $i++ . ')'. $block->print());
        }
    }
    private function isValidHash($hash): bool
    {
        return str_starts_with($hash, '00000');
    }
  
    private function isValidProf(Block $block, int $proof): bool
    {
        $blockCopy = clone($block);
        $blockCopy->setProof($proof);
        $hash = $this->dataToHash($blockCopy);

        return $this->isValidHash($hash);
    }
  
    public function mineProofOfWork(Block $block):int
    {
        $proof = 0;
        while (!$this->isValidProf($block, $proof)) 
        {
            $proof += 1;
        }

        return $proof;

    }
    
}