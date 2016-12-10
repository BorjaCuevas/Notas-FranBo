(function(){
    
$(document).ready(function(){
    var val = $('#grupopantalla option:selected').val();
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('value', val);
    input.setAttribute('name', 'idgrupo')
    document.getElementById('textAreaEscribir').parentNode.append(input);
});

document.getElementById( "fotoPerfil" ).addEventListener( "click",invisibleDesplegable);
document.getElementById("desplegableEditar").addEventListener("click",invisibleEditar);
document.getElementById("salirEditar").addEventListener("click",invisibleEditar);
document.getElementById("salirGrupo").addEventListener("click",invisibleGrupo);
document.getElementById("enlaceCrearGrupo").addEventListener("click",invisibleGrupo);   
document.getElementById("agregarUsuario").addEventListener("click",crearInputUsuario);   
document.getElementById("plusNota").addEventListener("click",invisibleNota);
document.getElementById("salirNota").addEventListener("click",invisibleNota);    
document.getElementById("grupopantalla").addEventListener("change", montarGrupo);

function crearInputUsuario(e){
   var input = '<input type="text" name="invitarUsuario" placeholder="Correo del Usuario">';
   $("#agregarUsuario").append(input);
    
}  
function invisibleNota(){
     var target=document.getElementById("modalNota");
     invisibleOk(target);
}    
function invisibleDesplegable(){
     var target=document.getElementById("desplegableDerecho");
     invisibleOk(target);
}
function invisibleEditar(){ 
     var target=document.getElementById("editarPerfil");
     invisibleOk(target);
}
function invisibleGrupo(){ 
     var target=document.getElementById("crearGrupo");
     invisibleOk(target);

}    
function invisibleOk(objetivo){
       if(objetivo.className==='oculto')
            {
              objetivo.className='mostrar';
           
            }else{
              objetivo.className='oculto';
            } 
            
 }
$("#accordian h3").click(function(){
		//slide up all the link lists
		$("#accordian div").slideUp();
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	})
	
	
function montarGrupo(){
    var id = $('#grupopantalla option:selected').val();
    location.replace('index.php?grupo='+id);
}

$('#aceptarinvitacion').on('click', function(event){
    var idgrupo = $('#idgrupoinvitacion').val();
    location.replace('index.php?ruta=gestiongrupogrupousuario&accion=responderinvitacion&idgrupoinvitacion='+idgrupo+'&respuesta=0');
});

$('#rechazarinvitacion').on('click', function(event){
    var idgrupo = $('#idgrupoinvitacion').val();
    location.replace('index.php?ruta=gestiongrupogrupousuario&accion=responderinvitacion&idgrupoinvitacion='+idgrupo+'&respuesta=-1');
});

$('#rechazarinvitacion').on('click', function(event){
    var idgrupo = $('#idgrupoinvitacion').val();
    location.replace('index.php?ruta=gestiongrupogrupousuario&accion=responderinvitacion&idgrupoinvitacion='+idgrupo+'&respuesta=-1');
});

})();