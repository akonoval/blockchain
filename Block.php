<?php

class Block
{
    
    public string $from = '';
    public string $to = '';
    public int $amount = 0;
    public string $prevHash = '';
    public int $proof = 0; // mit dir Zahl unsere Hash werder valid, werde haben 2 oder mer Null an anfang

    public function __construct(string $from, string $to, int $amount, string $prevHash)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
        $this->prevHash = $prevHash;
    }
    public function print(): string
    {
        $output = '_______________________________' . '</br>';
        $output .= $this->from .  ' === ( ' .  $this->amount .  ' ) ==> ' . $this->to . '</br>';
        $output .= 'Prev hash: ' . $this->prevHash . '</br>';
        $output .= 'Proof: ' . $this->proof . '</br>';

        return $output;
    }

    public function setProof(int $proof): void
    {
        $this->proof = $proof;
    }

}