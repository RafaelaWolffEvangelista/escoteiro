<?php

 namespace MODEL;
 
class Escoteiro {
    private ?int $id_escoteiro;
    private string $nome;
    private string $data_nascimento;
    private string $nome_responsavel;
    private string $telefone_responsavel;
    private int $bolsa_familia;
    private string $status;

    public function __construct(?int $id_escoteiro = null, string $nome = "", string $data_nascimento = "", string $nome_responsavel = "", string $telefone_responsavel = "", int $bolsa_familia = 0, string $status = "") {
        $this->id_escoteiro = $id_escoteiro;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->nome_responsavel = $nome_responsavel;
        $this->telefone_responsavel = $telefone_responsavel;
        $this->bolsa_familia = $bolsa_familia;
        $this->status = $status;
    }

    public function getIdEscoteiro(): ?int { 
        return $this->id_escoteiro; 
        }
    public function setIdEscoteiro(?int $id): void {
         $this->id_escoteiro = $id; 
        }

    public function getNome(): string { 
        return $this->nome;
        }
    public function setNome(string $nome): void {
         $this->nome = $nome; 
        }

    public function getDataNascimento(): string { 
        return $this->data_nascimento; 
        }
    public function setDataNascimento(string $data): void {
         $this->data_nascimento = $data; 
        }

    public function getNomeResponsavel(): string { 
        return $this->nome_responsavel;
        }
    public function setNomeResponsavel(string $nome): void {
         $this->nome_responsavel = $nome;
        }

    public function getTelefoneResponsavel(): string {
         return $this->telefone_responsavel; 
        }
    public function setTelefoneResponsavel(string $tel): void {
         $this->telefone_responsavel = $tel;
        }

    public function getBolsaFamilia(): int {
         return $this->bolsa_familia;
        }
    public function setBolsaFamilia(int $bf): void {
         $this->bolsa_familia = $bf; 
        }

    public function getStatus(): string {
         return $this->status;
        }
    public function setStatus(string $status): void {
         $this->status = $status; 
        }
}
?>