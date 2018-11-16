<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);

            * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

            body { 
                width: 100%;
                height:100%;
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
        <?php
        include './menu.php';
        include './conexao.php';

        /* Esse trecho de código é responsável por excluir um registro no BD.
         * Ele é o primeiro código para que seja feita a mudança na tabela automaticamente.
         */
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $sqlDeleta = "DELETE FROM cadastro WHERE id=:id";
            $deletaID = $db->prepare($sqlDeleta);
            $deletaID->bindValue(':id',$id,PDO::PARAM_INT);
            
            if($deletaID->execute()){
                echo "Registro deletado.";
            }else{
                echo "Erro ao tentar deletar o registro";
            }
        }
        
        /* Esse trecho de código é responsável por buscar as informações no BD vacês estão fazendo isso pela milésima vez.*/
        $sqlLerTudo = 'SELECT * FROM cadastro';
        $lerTudo = $db->prepare($sqlLerTudo);
        $lerTudo->execute();

        if ($lerTudo->rowCount() > 0) {
            echo "<table border=1>";
            while ($rs = $lerTudo->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>Id: " . $rs->id . "</td>";
                echo "<td>Nome: " . $rs->nome . "</td>";
                echo "<td>Email: " . $rs->email . "</td>";
                echo "<td>Data: " . date('d/m/Y', strtotime($rs->data)) . "</td>";
                echo "<td>Hora: " . date('H/i/s', strtotime($rs->hora)) . "</td>";
                if ($rs->rec_pub) {
                    echo "<td>Recebe publicidade</td>";
                } else {
                    echo '<td>Não recebe publicidade</td>';
                }
                echo "<td><a href='excluir.php?id=$rs->id'>Excluir</a></td>";
            }
            echo "</tr></table>";
        } else {
            echo "Nenhum registro encontrado";
        }
        ?>
    </body>
</html>