<html>
    <head>
        <meta charset="UTF-8">
        <title>Buscar</title>
        <style>
            body{
                background-color: aqua;
            }
        </style>
    </head>
    <body>
        <?php
        include "./menu.php";
        include "./conexao.php";

        $sqlLerTudo = "SELECT * FROM cadastro";
        $lerTudo = $db->prepare($sqlLerTudo);
        $lerTudo->execute();

        /* a função rowCOunt retorna o numero de linhas afetadas pela consulta */
        if ($lerTudo->rowCount() > 0) {
            echo "<table border=1>";
            /* define a forma no qual os dados serão retornados e armazena na variavel $rs
             * trata ca linha da consulta como um objeto, transformando os campos que foram retornados em atributos do objeto */
            while ($rs = $lerTudo->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>ID: " . $rs->id . "</td>";
                echo "<td>Nome: " . $rs->nome . "</td>";
                echo "<td>Email: " . $rs->email . "</td>";
                echo "<td>Data: " . date("d/m/Y", strtotime($rs->data)) . "</td>";
                echo "<td>Hora: " . date("H/i/s", strtotime($rs->hora)) . "</td>";
                if ($rs->rec_pub == 1) {
                    echo "<td>Recebe publicidade</td>";
                } else {
                    echo "<td>Não recebe publicidade</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum registro encontrado";
        }
        ?>
    </body>
</html>
