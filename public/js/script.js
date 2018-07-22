$(document).ready(function(){

 // var _container = new Objetc();
  var _fileReader = new FileReader();

  _container = {
  	formulario :$('[data-container-upload="formulario"]'),
  	inputfile : $('[data-container-upload="inputfile"]'),
  	inputbtn : $('[data-container-upload="inputbtn"]'),
  	miniatura :$('[data-container-upload="miniatura"]')
  };
  //console.log(_container);
  function inputAlterado(callback){
  	_container.inputfile.on("change", function(){
  		callback();

  	});
  }

  function pegarquivo(){
  	return _container.inputfile.prop('files');
  }
 
  inputAlterado(function(){
    
    var _imagem = pegarquivo();
    if (_imagem.length > 0) {};



  });


});