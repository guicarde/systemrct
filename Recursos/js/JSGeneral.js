function calcular_duracion_tsm(){
    var inicio = document.getElementById('inicio_tsm').value;
    var fin = document.getElementById('fin_tsm').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_tsm').value= duracion;
}

function calcular_duracion_dia(){
    var inicio = document.getElementById('inicio_dia').value;
    var fin = document.getElementById('fin_dia').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_dia').value= duracion;
}

function calcular_duracion_desa(){
    var inicio = document.getElementById('inicio_desa').value;
    var fin = document.getElementById('fin_desa').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_desa').value= duracion;
}

function calcular_duracion_cond(){
    var inicio = document.getElementById('inicio_cond').value;
    var fin = document.getElementById('fin_cond').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_cond').value= duracion;
}

function calcular_duracion_comi(){
    var inicio = document.getElementById('inicio_comi').value;
    var fin = document.getElementById('fin_comi').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion_comi').value= duracion;
}
function calcular_duracion(){
    var inicio = document.getElementById('inicio').value;
    var fin = document.getElementById('fin').value;
    if (inicio < fin ){
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = finMinutos - inicioMinutos;
    var transcurridoHoras = finHoras - inicioHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    
    }else{
    var inicioMinutos = parseInt(inicio.substr(3,2));
    var inicioHoras = parseInt(inicio.substr(0,2));

    var finMinutos = parseInt(fin.substr(3,2));
    var finHoras = parseInt(fin.substr(0,2));

    var transcurridoMinutos = 00 - inicioMinutos+finMinutos;
    var transcurridoHoras = 24 - inicioHoras + finHoras;

    if (transcurridoMinutos < 0) {
      transcurridoHoras--;
      transcurridoMinutos = 60 + transcurridoMinutos;
    }

    var horas = transcurridoHoras.toString();
    var minutos = transcurridoMinutos.toString();

    if (horas.length < 2) {
      horas = "0"+horas;
    }

    if (horas.length < 2) {
      horas = "0"+horas;
    }
    if(minutos < 10){
    var duracion = horas+":0"+minutos;   
    }else{
    var duracion = horas+":"+minutos;     
    }
    }
    
    document.getElementById('duracion').value= duracion;
}

function cerrarSchedule(){
    
//    alert('pruebame');
//   exit();
    document.getElementById('hiddenschedule').value = 'guardarscheduleope';
    document.getElementById('form_cerrar_schedule').submit();
}

function iniciarTarea(id_schedule)
{  
    
//    alert('LEGGAS? SIME Q SI');
//    exit();
    var idschedule = document.getElementById('id_schedule_act'+id_schedule).value;
    var accion = document.getElementById('hidden_schedule').value;
             
        $("#inicio_tar"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : accion,
              id_schedule_act: idschedule
            }, function(){
            }
            );    
    
        
        $("#div_finalizar_tarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'habilitar_finalizar',
              id_schedule_act: idschedule
            }, function(){
            }
            );   
    
}


function SapOK(id_reporte_soa)
{  

    var idreportesoa = document.getElementById('id_reporte_soa'+id_reporte_soa).value;
    var accion = document.getElementById('hidden_reporte'+id_reporte_soa).value;
   
   
        $("#estado_sap"+idreportesoa).load("../Controles/Registro/CReporte.php", 
            {
              hidden_reporte : accion,
              id_reporte_soa: idreportesoa
            }, function(){
            }
            );    
    
       
}

function comentario_Tarea(id_schedule)
{
    $("#div_comentario_tarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'insertar_comentario',
              txt_comentario: document.getElementById('txt_comentario'+id_schedule).value,
              horainicio: document.getElementById('horainicio'+id_schedule).value,
              horafinal: document.getElementById('horafinal'+id_schedule).value,
              c_estado_tar: document.getElementById('c_estado_tar'+id_schedule).value,
              id_schedule_act: id_schedule
            }, function(){
            }
            );  
}


function finalizar_Tarea(id_schedule)
{
        $("#div_finalizatarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'finalizar_tarea',
              id_schedule_act: id_schedule
            }, function(){
            }
            ); 
    
    
    setTimeout(function(){
    
  
     $("#div_comentario_tarea"+id_schedule).load("../Controles/Registro/CSchedule.php", 
            {
              hidden_schedule : 'habilitar_comentario_tarea',
              id_schedule_act: id_schedule,
              hora_inicio : document.getElementById("id_marcado_hora_inicio"+id_schedule).value,
              hora_fin : document.getElementById("id_marcado_hora_fin"+id_schedule).value              
            }, function(){
            }
            ); 
    
    },1000);
    
    
}

function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(!checkPassword(form.pwd1.value)) {
        alert("The password you have entered is not valid!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }
    return true;
  }
  function cancelar(){
window.location.replace("index.php");
}
function generar_turno_8()
{  
       
    if(confirm('¿Estas seguro de continuar?'))
	{
		document.getElementById("form_8hrs").submit();
	}
	else
	{
		return false;
	}	
}
function generar_turno_12()
{  
       
    if(confirm('¿Estas seguro de continuar?'))
	{
		document.getElementById("form_12hrs").submit();
	}
	else
	{
		return false;
	}	
}



