<?php
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
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);

            * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

            body { 
                width: 100%;
                
                font-family: 'Open Sans', sans-serif;
                background: #092756;
                background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
                background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
                background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
                background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
                background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
            }

            input, textarea { 
                margin-left: 10;
                margin-right: 10;

                margin-bottom: 10px; 
                background: rgba(0,0,0,0.3);
                border: none;
                outline: none;
                padding: 10px;
                font-size: 13px;
                color: #fff;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
                border: 1px solid rgba(0,0,0,0.3);
                border-radius: 4px;
                box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
                -webkit-transition: box-shadow .5s ease;
                -moz-transition: box-shadow .5s ease;
                -o-transition: box-shadow .5s ease;
                -ms-transition: box-shadow .5s ease;
                transition: box-shadow .5s ease;
            }
            input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
            legend{
                font-size: 30;
                color: whitesmoke;
            }
            label{
                color: darkgray;
            }
        </style>
    </head>
    <body>
        <form method="GET" action="cadastrar.php">
            
            <br><br>
            <div align="center">
                
                    <legend><strong>Cadastre-se</strong></legend>
                    <br>
                    <label>Data de cadastro:</label> <!-- colocar no banco e definir o 'name' -->
                    <input type="date" name="nome">
                    <br><br>
                    
                    <input type="text" name="nome" placeholder="Nome">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="RG">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome"placeholder="CPF">
                    <br><br>
                    <label>Sexo:</label> <!-- colocar no banco e definir o 'name' -->
                    <br>
                    <label>Masculino</label>
                    <input type="radio" name="sexo" value="m">
                    <label>Feminino</label>
                    <input type="radio" name="sexo" value="f">
                    <label>Outro</label>
                    <input type="radio" name="sexo" value="o">
                    
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
                    
                    <input type="email" name="email" placeholder="Email">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                     <input type="text" name="nome" placeholder="Profissão">
                    <br><br>
                    <label>Data de nascimento:</label>
                    <input type="date" name="data">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Endereço">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Número de residência">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Bairro">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="CEP">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Cidade">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="UF">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Celular">
                    <br><br>
                     <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Altura">
                    <br><br>
                    <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Peso">
                    <br><br>
                    <label>Dia(s) da semana de aula:</label> <!-- colocar no banco e definir o 'name' -->
                    <input type="date" name="nome">
                    <br><br>
                    <label>Horário de início:</label> <!-- colocar no banco e definir o 'name' -->
                    <input type="time" name="nome">
                    <br><br>
                    <label>Tempo de aula:</label>
                    <input type="time" name="hora">
                    <br><br>
                    <!-- colocar no banco e definir o 'name' -->
                    <input type="text" name="nome" placeholder="Mensalidade">
                    <br><br>
                    <label>Problemas de saúde:</label><br> <!-- colocar no banco e definir o 'name' -->
                    <textarea>
                
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
