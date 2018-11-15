<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <style>
            body{
                background-color: aqua;
            }
        </style>
    </head>
    <body>
        <?php
        include './menu.php';
        include 'conexao.php';

        if (!empty($_GET['alterou'])) {
            /* O "alterou" é um input invisível que vai ser criado quando o formulário for criado. 
             * Esse é o trecho de código que irá atualizar os dados no banco,
             * ele é o primeiro trecho para que a tabela de busca seja atualizada automaticamente.*/
            $id = $_GET['id'];
            $novoNome = $_GET['nome'];
            $novoEmail = $_GET['email'];
            $novoData = $_GET['data'];
            $novoHora = $_GET['hora'];
            $novoPubli = $_GET['publi'];

            /*  A variável sqlAtualizar é responsável pela string que manipula o BD
             *  o valor antes do = é o nome do atributo no BD enquanto o valor com os dois
             *  pontos é o nome do input que recebe a informação.
             * OBS.: NÃO PODE HAVER ESPAÇO ENTRE OS DOIS PONTOS E NO NOME DO INPUT.
             */
            $sqlAtualizar = "UPDATE cadastro SET nome=:nome,"
                    . "email=:email, data=:data, hora=:hora,"
                    . "rec_pub=:publi WHERE id=:id";
            
             /*A função bindValue () é utilizada APENAS quando iremos enviar informações para o banco.
             * Necessista de 3 parametos SEMPRE   
             * Dica: se der erro no bindValue normalmente, é porque, é porque as informações não são iguais .           */
            $atualizarId = $db->prepare($sqlAtualizar);
            
            /*  A função execute() é responsável por executar a ação que o prepare preparou.
             *  Dica: se der erro no prepare, normalmente, é algo nos bindValue.
             */
            $atualizarId->bindValue(':id', $id, PDO::PARAM_STR);
            $atualizarId->bindValue(':nome', $novoNome, PDO::PARAM_STR);
            $atualizarId->bindValue(':email', $novoEmail, PDO::PARAM_STR);
            $atualizarId->bindValue(':data', $novoData, PDO::PARAM_STR);
            $atualizarId->bindValue(':hora', $novoHora, PDO::PARAM_STR);
            $atualizarId->bindValue(':publi', $novoPubli, PDO::PARAM_BOOL);

             /*a função execute() é responsavel por executar a ação que prepare preparou
             * DICA: se der erro no prepare, normalmente, é algo nos bindValue.             
             */
            
            if ($atualizarId->execute()) {
                echo 'Atualização realizada com sucesso!';
            } else {
                echo "Erro na atualização.";
            }
        }
        
        /*  A função listarTodos é uma função criado por nós, com o objetivo de buscar as informações no BD
         *  e mostrar na tela dentro de uma tabela. Lembre-se que funções só funcionam quando chamamos.
         *  É praticamente a mesma coisa que tem no buscar.php, porém aqui tem m link que permite capturar
         *  o id ao qual queremos alterar.
         *  O link só funciona quando utilizamos o método GET no formulário, pois ele cria a URL necessária
         *  para acessar o id. COM O POST NÃO FUNCIONA.        
         */
        
        function listarTodos() {
            include './conexao.php';
            /* precisa ter um include conexão dentro da funçaõ, pois ela não "vê" nada que tem fora dela*/
            $sqlLerTudo = "SELECT * FROM cadastro";
            $lerTudo = $db->prepare($sqlLerTudo);
            $lerTudo->execute();

            if ($lerTudo->rowCount() > 0) {
                echo "<table border=1>";
                while ($rs = $lerTudo->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td> ID: " . $rs->id . "</td>";
                    echo "<td> Nome: " . $rs->nome . "</td>";
                    echo "<td> Data: " .
                    date('d/m/Y', strtotime($rs->data)) .
                    "</td>";
                    echo "<td> Hora;" .
                    date('H:i:s', strtotime($rs->hora)) .
                    "</td>";
                    if ($rs->rec_pub) {
                        echo "<td> Recebe publicidade</td>";
                    } else {
                        echo "<td> Não recebe publicidade</td>";
                    }
                    echo "<td><a href='editar.php?id=$rs->id'>"
                    . "Alterar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum resultado encontrado!";
            }
        }

        listarTodos();

        /* Esse trecho de código é responsável por buscar as informações "velhas" do BD, salvar as informações em
         * variáveis e colocar dentro do formulário para serem atualizadas.
         * O if funciona a parir do id capturado quando clicamos no link "Alterar".
         */
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sqlLerID = "SELECT * FROM cadastro WHERE id=:id";
            $lerID = $db->prepare($sqlLerID);
            $lerID->bindValue(':id', $id, PDO::PARAM_INT);
            $lerID->execute();

            /* Esse if é responsável por ver se tem registro no BD, pegar essas informações e salvar em variáveis.*/
            if ($lerID->rowCount() > 0) {
                $rs = $lerID->fetch(PDO::FETCH_OBJ);
                $nome = $rs->nome;
                $email = $rs->email;
                $data = $rs->data;
                $hora = $rs->hora;
                $rec_pub = $rs->rec_pub;
            } else {
                echo "Nenhum dado encntrado";
            }
            ?>
        <!--O formulário vai vir preechido devido ao value, pois pegamos as informações que salvamos nas variáveis
        e chamamos dentro do value.-->
            <form action="editar.php" method="GET">
                <br>
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo $nome ?>">
                <br><br>
                <label>E-mail:</label>
                <input type="email" name="email" value="<?php echo $email ?>">
                <br><br>
                <label>Data:</label>
                <input type="date" name="data" value="<?php echo $data ?>">
                <br><br>
                <label>Hora:</label>
                <input type="time" name="hora" value="<?php echo $hora ?>">
                <br><br>
                <label>Recebe publicidade:</label>
                <?php
                if ($rec_pub == 1) {
                    echo "<input type='radio' name='publi' value='1'"
                    . "checked='true'>Sim";
                    echo "<input type='radio' name='publi' value='0'>Não";
                } else {
                    echo "<input type='radio' name='publi' value='1'>Sim";
                    echo "<input type='radio' name='publi' value='0' checked='true'>Não";
                }
                ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="alterou" value="true">
                <br>
                <input type="submit" value="Alterar">
            </form>
            <?php
        }
        
        ?>
    </body>
</html>
