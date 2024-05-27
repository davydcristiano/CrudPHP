<?php
    class Contato {
        //importando a biblioteca pdo!
        private $pdo;
        
        //Construindo o construtor e ligando o banco de dados.
        public function __construct() {
            $this->pdo = new PDO("mysql:dbname=crudphp;host=localhost","root","");
        //echo "Fez a conexão - Ao banco de dados MySQL ->";
        }

        //Funcionalidade C -> Criador de contatos
        public function adicionar($email, $nome = '') {
            //inserir novos contatos
            // 1 Passo = verificar se o email já existe no sistema
            // 2 Passo = adicionar

            //metodo auxiliar if
            if($this->existeEmail($email) == false) {
                $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();
    
                return true;
            } else {
                return false;
            }
        }

        /*//Funcionalidade R -> READ
        public function getNome($email) {
            $sql = "SELECT nome FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            //verificar se acha alguma coisa
            if($sql->rowCount() > 0){
                //pegando a informacion
                $info = $sql->fetch();
                //retorna la informacion
                return $info['nome'];

            } else {
                return '';
            }
            //apagado pois na 4 aula não vai ser utilizado
        }*/

        public function getInfo($idContato) {
            //o restante do processo é similar ao getAll
            $sql = "SELECT * FROM contatos WHERE idContato = :idContato"; // a diferença é o WHERE idContato = :idContato
            $sql = $this->pdo->prepare($sql);//não tem mais a query e sim um prepare
            $sql->bindValue(':idContato', $idContato);
            $sql->execute();

            //verificando todos os contatos
            if ($sql->rowCount() > 0) {
                  return $sql->fetch();//não é fetchall é só fetch, pois tem só um dado
            } else {
            return array();
            }
        }

        //2 passo da Funcionalidade R -> SEGUNDO PASSO pegar todos os dados
        public function getAll() {
            $sql = "SELECT * FROM contatos";
            $sql = $this->pdo->query($sql);

            //verificando todos os contatos
            if ($sql->rowCount() > 0) {
                  return $sql->fetchAll();
            } else {
            return array();
        }
      }  
        //Finalizando a Funcionalidade R -> SEGUNDO PASSO

        //criando o update - editar
        /*public function editar($nome, $email) {
            //validando o email.
            if($this->existeEmail($email)) {
                $sql = "UPDATE contatos SET nome = :nome WHERE email = :email";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();
    
                return true;
            } else {
                return false;
            }
        }*/

        public function editar($nome, $email, $idContato) {
            //validando o email.
                $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE idContato = :idContato";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':idContato', $idContato);
                $sql->execute();
        }

        //criando o exluir - DELETE
        /*public function excluir($email) {
            //verificação de email
            if ($this->existeEmail($email)) {
                $sql = "DELETE FROM contatos WHERE email = :email";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':email',$email);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        }*/
        //atualização de fazer a exclusão pelo id
        public function excluirId($idContato) {
                $sql = "DELETE FROM contatos WHERE idContato = :idContato";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':idContato', $idContato);
                $sql->execute();
        }

        private function existeEmail($email){
            $sql = "SELECT * FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();
    
            if($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
    }

    }
?>