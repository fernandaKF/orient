<?php

class Pessoa {
    private $nome;
    private $sobrenome;
    private $idade;

    //To String
    public function __toString() {
        return sprintf("%s %s, %d anos\n",
            $this->nome, $this->sobrenome, $this->idade);
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome): self
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade): self
    {
        $this->idade = $idade;

        return $this;
    }
}

//Programa principal com o menu
$opcao = 0;

$pessoas = array();

do {
    echo "\n-----------MENU-----------\n";
    echo "0- SAIR\n";
    echo "1- Cadastrar\n";
    echo "2- Listar\n";
    echo "3- Excluir\n";
    $opcao = readline("Escolha a opção: ");
    
    switch($opcao) {
        case 0:
            echo "Programa encerrado!\n";
            break;
        
        case 1:
            echo "\n";
            $pessoa = new Pessoa();
            $pessoa->setNome(readline("Informe o nome: "));
            $pessoa->setSobrenome(readline("Informe o sobrenome: "));
            $pessoa->setIdade(readline("Informe a idade: "));
            array_push($pessoas, $pessoa);

            break;

        case 2:
            if(count($pessoas) > 0) {
                echo "\nPessoas cadastradas:\n";
                foreach($pessoas as $p)
                    echo $p;
            } else
                echo "\nNão há pessoas cadastradas!\n";
            
            break;
        case 3: 
            //lista dos que foram cadastrados
            echo "\nPessoas disponíveis:\n";
            $i = 1;
            foreach($pessoas as $p) {
                echo $i . ": " . $p;
                $i++;
            }

            //pessoa deve ser excluída
            $idx = readline("Informe qual pessoa deve ser excluída: ");
            $idx--;

            //excluir pessoa do array
            if($idx >= 0 && $idx < count($pessoas)){
                //excluir
                array_splice($pessoas, $idx, 1);
                echo "Pessoa excluída com sucesso.\n";
            }else 
                echo "A pessoa escolhida não existe.\n";
            break;

        default:
            echo "Opção INVÁLIDA!\n";
    }
} while($opcao != 0);
