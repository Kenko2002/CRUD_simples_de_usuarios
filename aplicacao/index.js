$(document).ready(function() {
    // Sua inicialização de código aqui, se necessário


    function setTimeoutDanger() {
      setTimeout(function() {
          $(".alert-danger").remove();
      }, 5000); // 5000 milissegundos = 5 segundos
    }
  
    function setTimeoutSuccess() {
      setTimeout(function() {
          $(".alert-success").remove();
      }, 5000); // 5000 milissegundos = 5 segundos
    }


    //botao de pesquisa
    $(document).on("click", "#button", function() {
      $.ajax({
        type: 'POST',
        url: 'index_api.php',
        data: {
          pesquisar: 'S',
        },
        dataType: 'html',
        success: function(data) {
          $("#div-vazia").empty().html(data);
        },
        error: function(e) {
          console.log('Erro na requisição AJAX:', e);
        }
      });
    });

    //Deletar jogador
    $(document).on("click", ".deletar_registro", function() {
      var idDoBotao = $(this).attr("value");
      var div_registro=document.getElementById("registro "+idDoBotao);
      div_registro.remove(idDoBotao);
      
      console.log(idDoBotao);
      $.ajax({
        type: 'POST',
        url: 'index_api.php',
        data: {
          deletar_registro: 'S',
          id_a_remover: idDoBotao
        },
        dataType: 'html',
        success: function(data) {
          var successAlert='<div class="alert alert-success" role="alert">Operação bem-sucedida!</div>';
          $("#Box").prepend(successAlert);
          setTimeoutSuccess();
        },
        error: function(e) {
          var dangerAlert='<div class="alert alert-danger" role="alert">Operação mal-sucedida!</div>';
          $("#Box").prepend(dangerAlert);
          setTimeoutDanger();
          
        }
      });
    });

    //cadastrar jogador novo
    $(document).on("click", "#cadastrar", function() {
      var nome = document.getElementById("nome").value;
      var email = document.getElementById("email").value;
      var idade = document.getElementById("idade").value;
      var link = document.getElementById("link").value;
      //primeiro ajax pra inserir novo jogador no banco de dados
      $.ajax({
        type: 'POST',
        url: 'index_api.php',
        data: {
          cadastrar_nova_pessoa: 'S',
          nome:nome,
          idade:idade,
          email:email,
          link_foto:link
        },
        dataType: 'html',
        success: function(data) {
          var successAlert='<div class="alert alert-success" role="alert">Operação bem-sucedida!</div>';
          $("#Box2").prepend(successAlert);
          setTimeoutSuccess();
        },
        error: function(e) {
          var dangerAlert='<div class="alert alert-danger" role="alert">Operação mal-sucedida!</div>';
          $("#Box2").prepend(dangerAlert);
          setTimeoutDanger();
          
        }
      });
      //segundo ajax pra atualizar a lista de jogadores
      $.ajax({
        type: 'POST',
        url: 'index_api.php',
        data: {
          pesquisar: 'S',
        },
        dataType: 'html',
        success: function(data) {
          $("#div-vazia").empty().html(data);
        },
        error: function(e) {
          console.log('Erro na requisição AJAX:', e);
        }
      });

    });

  });
  
  
