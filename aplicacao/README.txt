oi paulinha!! aqui estao algumas orientações:

Instale o XAMPP, ele vai hostear seu servidor PHP.
Crie uma conta no Elephant SQL, ele vai hospedar o banco de dados da sua aplicação.

Com tudo isso pronto, cole os arquivos dessa pasta dentro da pasta htdocs do seu XAMPP,
Inicie seu servidor Apache
Faça as substituições das credenciais do banco de dados no arquivo configdb.php.

rode no Elephant SQL o seguinte script:

CREATE TABLE pessoa (
    id INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INT,
    email VARCHAR(255),
    link_foto VARCHAR(400)
);

digite localhost na barra de pesquisa do seu navegador e está tudo pronto para executar o programa.