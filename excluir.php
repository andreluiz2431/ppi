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