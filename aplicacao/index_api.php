<?php
include('configdb.php');


if(isset($_POST["pesquisar"])){
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM "public"."pessoa"';
        $results = $pdo->query($query);

        foreach ($results as $row) {
    ?>
    <div class="user-card border rounded p-3 mb-3" id="registro <?php echo $row["id"]?>">
        <div class="user-info" style="float: left; margin-right: 10px; width: 50%;">
            <h4><?php echo $row["nome"]; ?></h4>
            <label>Email: <?php echo $row["email"]; ?></label><br>
            <label>Idade: <?php echo $row["idade"]; ?></label>
        </div>
        <div class="user-image" style="float: right;">
            <button style="float: right; margin:2px" value="<?php echo $row["id"] ?>" class="btn btn-danger deletar_registro">Apagar</button><br>
            <img style="border-radius:50%" src="<?php echo $row["link_foto"]; ?>" width="200" height="200" alt="User <?php echo $row["id"]; ?> picture">
        </div>
        <div style="clear: both;"></div> <!-- Limpar o float para que o conteúdo abaixo não seja afetado -->
    </div>

    <?php
        }

        // Closing connection
        $pdo = null;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

}

if(isset($_POST["deletar_registro"])){
    $id_a_remover=$_POST["id_a_remover"];
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'DELETE FROM "public"."pessoa" WHERE id = '.$id_a_remover;
        $results = $pdo->query($query);
    }catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

if(isset($_POST["cadastrar_nova_pessoa"])){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];
    $link = $_POST["link_foto"];

    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se já existe alguém com o mesmo nome no banco de dados
        $checkQuery = 'SELECT nome FROM "public"."pessoa" WHERE nome = :nome';
        $checkStatement = $pdo->prepare($checkQuery);
        $checkStatement->bindParam(':nome', $nome);
        $checkStatement->execute();
        $existingPerson = $checkStatement->fetch();

        if ($existingPerson) {
            echo "Já existe alguém com o nome fornecido no banco de dados.";
            http_response_code(500);
        } else {
            // Inserir o novo registro se o nome não existir
            $insertQuery = 'INSERT INTO "public"."pessoa" (nome, idade, email, link_foto)
                            VALUES (:nome, :idade, :email, :link)';
            $insertStatement = $pdo->prepare($insertQuery);
            $insertStatement->bindParam(':nome', $nome);
            $insertStatement->bindParam(':idade', $idade);
            $insertStatement->bindParam(':email', $email);
            $insertStatement->bindParam(':link', $link);
            $insertStatement->execute();

            $lastInsertId = $pdo->lastInsertId();
            echo "ID do último registro inserido: " . $lastInsertId;
        }

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}




?>
