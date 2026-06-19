<?php
    namespace MODEL; 

    Class chefes{
        private ?int $id; 
        private ?string $nome; 
        private ?string $ramo; 
        private ?int $telefone; 
        private ?string $status;
        private ?int $id_usuario;

        public function __construct()
        {
            
        }

        public function getId(){
           return $this->id; 
        }

        public function setId(int $id){
            $this->id = $id; 
        }

        public function getNome(){
           return $this->nome; 
        }

        public function setNome(string $nome){
            $this->nome = $nome; 
        }
        
        public function getRamo(){
           return $this->ramo; 
        }

        public function setRamo(string $ramo){
            $this->ramo = $ramo; 
        }

        public function getTelefone(){
           return $this->telefone; 
        }

        public function setTelefone(int $telefone){
            $this->telefone = $telefone; 
        }

        public function getStatus(){
           return $this->status; 
        }

        public function setStatus(string $status){
            $this->status = $status; 
        }

        public function getIdUsuario(){
           return $this->id_usuario; 
        }

        public function setIdUsuario(int $id_usuario){
            $this->id_usuario = $id_usuario; 
        }
        
    }
?>