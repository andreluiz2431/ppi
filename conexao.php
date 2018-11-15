<?php
/*variavel $con guarda o endereço do banco de dados e o nome da base de dados
 *mysql:host=localhost = endereço/local do banco utilizado
 *dbname=aula = nome da base de dados (aula)  */
  $con = "mysql:host=localhost;dbname=aula";
  try{
      /* $db = tenta conectar com o banco de dados através da função PDO
       * PDO fornece uma camada de abstração entre o PHP e a conexão. Facilita pois o código é mesmo independente do banco utilizado
       * new PDO($con, "root", "");
       * $con contem o BD e a base de dados root é o meu usuário do BD, se tiver usuário no banco muda
       * "" as aspas vazias são o local para a senha do banco, como não temos senha deixamos vazio, porém deve aparecer no código */
      $db = new PDO($con, "root", "");
      echo '<br><br><div style="margin-right: 1170"><fieldset>'."Conexão realizada!<br>".'</fieldset></div>';
  } catch (PDOException $e) {
      echo '<br><br><div style="margin-right: 1170"><fieldset>'."Conexão falhou!".'</fieldset></div>';
      echo $e->getMessage();
  }
?>
    
