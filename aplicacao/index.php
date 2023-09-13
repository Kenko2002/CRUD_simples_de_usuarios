<head>
    <?php include('configdb.php'); ?>
    <title>Exemplo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js"></script>
</head>


<body style="background-color: #192A56; ">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!--div pokedex-->
                <div class="card p-4 shadow" id="Box">
                    <h4> Lista de Usuários </h4>
                    <!-- Conteúdo da primeira coluna -->
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="input-pesquisa" id="input-pesquisa" class="form-control" placeholder="Digite o Nome ou ID do pokémon.">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" id="button">Pesquisar</button>
                        </div>
                    </div>
                    <h2 class="text-center mb-3"><!-- Titulo da Tabela --></h2>
                    <div id="div-vazia"></div>
                    <div class="row">
                        <!-- Conteúdo adicional -->
                    </div>
                </div><br>
            </div>

            <!--div cadastro pessoa-->
            <div class="col-md-6">
                <div class="card p-4 shadow" id="Box2">
                    <!-- Formulário para cadastrar uma nova pessoa -->
                    <h4> Cadastro </h4>
                        <!-- Campos do formulário -->
                        <input type="text" id="nome" class="form-control mb-3" placeholder="Nome">
                        <input type="text" id="email" class="form-control mb-3" placeholder="Email">
                        <input type="number" id="idade" class="form-control mb-3" placeholder="Idade">
                        <input type="text" id="link" class="form-control mb-3" placeholder="Link da sua Foto">
                        <!-- Outros campos do formulário -->

                        <button id="cadastrar" class="btn btn-success btn-block">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>



