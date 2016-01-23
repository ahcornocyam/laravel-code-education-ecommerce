$(document).ready(function(){

  /*
    função que faz a busca das cidades e estados do brasil via ajax
  */
  function cidadesEstados(){
    var cidades = null,
    estados = null;

    // requisição de estados
    $.ajax(
      {
        url     : '/build/js/cidadesEstados/Estados.json',
        type    : 'GET',
        async   : false,
        dataType  : 'json',
        success : function(response){
          estados = Loop( 0 ,response );

        }
      }
    );
    //requisição de cidades
    $.ajax(
      {
        url     : '/build/js/cidadesEstados/Cidades.json',
        type    : 'GET',
        async   : false,
        dataType  : 'json',
        success : function(response){
          cidades = Loop( 0 ,response );
        }
      }
    );
    return {
      todosEstados : estados,
      todasCidades : cidades
    };
  }

  var estados  = cidadesEstados().todosEstados;
  var cidades  = cidadesEstados().todasCidades;
  /*
    Função que controla o select dos estados
  */
  function selectEstados(){

      for (var i = 0; i < estados.length; i++) {
        var option =  $("<option></option>").appendTo( '#estados' );
        option.attr('value', estados[i].Sigla );
        option.attr('data-id',estados[i].ID );
        option.text(estados[i].Nome);
      }
      //clicar no estados, insere as cidades pertencentes a aqueles estados
      $('#estados').on('click',function(){
          items = [];
          a  = $('option:selected',this).attr('data-id');
          items = Loop( a, cidades );
          selectCidades(items);
      });

  }
  /*Função para fazer o laço de repetições*/
  function Loop(id, data){
    var items = [];
      if(id === undefined || id === 0 ){
        for (var i = 0; i < data.length; i++) {
          items.push(data[i]);
          }
      }
      for (var j = 0; j < data.length; j++) {
        if(data[j].Estado == id){
            items.push(data[j]);
        }
      }

      return items;
  }
  /*
    Função que controla o select das cidades
  */
  function selectCidades(cidades){
      $('#cidades').html('');
      for (var i = 0; i < cidades.length; i++) {
        var option =  $("<option></option>").appendTo( '#cidades' );
        option.attr('value', cidades[i].Sigla );
        option.attr('data-id',cidades[i].ID );
        option.text(cidades[i].Nome);
      }
  }

  //chama a função selectEstados
  selectEstados();

  $('#cep').mask('99.999-999');
  $('#fone').mask('(99)9999-9999');
  $('#cpf').mask('999.999.999-99');  
});

//# sourceMappingURL=cidadesEstados.js.map
