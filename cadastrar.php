<?php
//oeeeee
//isere o menu na página cadastrar.php
include "./menu.php";
//realiza a conexão com o BD
include "./conexao.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <style>
            body{
                background-color: lightblue;
            }
            .botao{
                background-color: lightblue;
            }

            input[type=text], input[type=password], input[type=date]{
                width: 20%;
                padding: 15px 100px 8px 8px;
                border: none;
                background: #f1f1f1;
            }
            input[type=text]:focus, input[type=password]:focus, input[type=date]:focus{
                background-color: #ddd;
                outline: none;
            }
            .baaaaaaa{
                background-color: gray;
                color: #FFF;

                border-radius: 30px;
            }
            label{
                color: darkgray;
                font-size: 20;
            }

        </style>
    </head>
    <body>
        <form method="GET" action="cadastrar.php">
            <br><br>
            <div style="margin-right: 200; margin-left: 200;" align="center">
                <fieldset>
                    <legend><strong>Cadastre-se</strong></legend>
                    <br>
                    <label>Data de cadastro:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="date" name="nome">
                    <br><br>
                    <label>Nome:</label><br>
                    <input type="text" name="nome">
                    <br><br>
                    <label>RG:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>CPF:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Sexo:</label> <!-- colocar no banco e definir o 'name' -->
                    <br>
                    <label>Masculino</label>
                    <input type="radio" name="sexo" value="m">
                    <label>Feminino</label>
                    <input type="radio" name="sexo" value="f">
                    <label>Outro</label>
                    <input type="radio" name="sexo" value="o">
                    <?php
                    if ($_GET['sexo'] == 'o') {      // arrumar!!!!!!!!!!!
                        echo "<input type='text' name='outroSexo'>";
                    }
                    ?>
                    <br><br>
                    <label>Estado civil:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <select>
                        <option name='xxx'>xxx</option>
                        <option name='xxx'>xxx</option>
                        <option name='xxx'>xxx</option>
                    </select>
                    <br><br>
                    <label>Escolaridade:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <select>
                        <option name='xxx'>xxx</option>
                        <option name='xxx'>xxx</option>
                        <option name='xxx'>xxx</option>
                    </select>
                    <br><br>
                    <label>Email:</label><br>
                    <input type="email" name="email">
                    <br><br>
                    <label>Profissão:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Data de nascimento:</label><br>
                    <input type="date" name="data">
                    <br><br>
                    <label>Endereço:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Número de residência:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Bairro:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>CEP:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Cidade:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>UF:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Celular:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Altura:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Peso:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Dia(s) da semana de aula:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="date" name="nome">
                    <br><br>
                    <label>Horário de início:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="time" name="nome">
                    <br><br>
                    <label>Tempo de aula:</label><br>
                    <input type="time" name="hora">
                    <br><br>
                    <label>Mensalidade:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome">
                    <br><br>
                    <label>Problemas de saúde:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <textarea>
                Insira seus dados
                    </textarea>
                    <br><br>
                    <label>Receber Publicidade:</label> <!-- retirar do banco -->
                    <br>
                    <label>Sim</label>
                    <input type="radio" name="rec_pub" value="Sim">
                    <label>Não</label>
                    <!--No radio vai ser salvo no banco 1 para sim o 0 para não, pois o rec_pub boleano-->
                    <input type="radio" name="rec_pub" value="Não">
                    <br><br>
                    <input class="baaaaaaa" type="submit" value="Enviar">
                    <br>
                </fieldset>
            </div>
        </form>
        <?php
        if (isset($_GET["nome"])) {
            $nome = $_GET["nome"];
            $email = $_GET["email"];
            $data = $_GET["data"];
            $hora = $_GET["hora"];
            $rec_pub = $_GET["rec_pub"];
            /* indica o q vai ser feito no BD, no caso, inserção
             * cadastro é o nome da tabela que iremos inserir dados
             * os dados que vão no primeiro parenteses são os nomes dos atributos inseridos no BD e no segundo parensteses o nome dos identificadores dos inputs acompanhados de dois pontos (:)
             * (NÃO DEVE HAVER ESPAÇO ENTRE OS DOIS PONTOS E O NOME) */

            $sql = "INSERT INTO cadastro (nome, email, data, hora, rec_pub) VALUES (:nome, :email, :data, :hora, :rec_pub)";

            /* a variavel $enviarBanco vai ser responsavel pelo "contato" com o BD
             * a funçao prepare() prepara uma operação para ser enviada ao BD */
            $enviarBanco = $db->prepare($sql);

            /* a função bindValue associa um valor à um parâmetro quando a associação for feita a funçaõ retorna verdadeiro, se algo de errado acontecer, retorna falso. Exibe 3 parametros.
             * :identificador = parametro identificador, onde o valor será inserido (input)
             * PDO::PARAM_STR tipo de valor a ser inserido, muda dependendo do valor (PARAM_STR para texto, PARAM_INT para número, PARAM_BOOL para booleanos...) */
            $enviarBanco->bindValue(":nome", $nome, PDO::PARAM_STR);
            $enviarBanco->bindValue(":email", $email, PDO::PARAM_STR);
            $enviarBanco->bindValue(":data", $data, PDO::PARAM_STR);
            $enviarBanco->bindValue(":hora", $hora, PDO::PARAM_STR);
            $enviarBanco->bindValue(":rec_pub", $rec_pub, PDO::PARAM_BOOL);

            /* a funçao execute() executa a operação preparada pela função prepare() */
            if ($enviarBanco->execute()) {
                echo '<br><br><div style="margin-right: 750"><fieldset>' . "Registro efetuado com sucesso!<br>" . '</fieldset></div><br>';
            } else {
                echo '<br><br><div style="margin-right: 750"><fieldset>' . "Erro!<br>" . '</fieldset></div><br>';
            }

            /* aviso para o usuário saber qual o seu id no BD */
            $sqlRecuperaID = "SELECT * FROM cadastro "
                    . "WHERE nome=:nome";
            $recuperaID = $db->prepare($sqlRecuperaID);

            $recuperaID->bindValue(':nome', $nome, PDO::PARAM_STR);
            $recuperaID->execute();
            /* a funçao fetchObject() obtem a proxima linha do banco e retorna como um objeto */
            $rs = $recuperaID->fetchObject();
            echo "ID cadastrado: " . $rs->id . "<br>";
            $id = $rs->id;

            echo "Nome: $nome <br>Email: $email <br>Data: $data <br>Hora: $hora <br>Receber Publicidade: $rec_pub";
        }
        ?>
    </body>
</html>
