<!DOCTYPE html>
<html>
  <head>
    <title>UTOPIA FM</title>
    <meta charset="utf-8">
    <?php
 date_default_timezone_set('America/Montevideo');

 $hora=date("H");
 $minuto=date("i");
 $segundo=date("s");
 
   ?>



 <script>

function play()
        {
            audio.play();
            document.getElementById("play").style.display = "none";
            document.getElementById("pause").style.display = "inline-block";
        }
        
        function pause()
        {
            audio.pause();
            document.getElementById("play").style.display ="inline-block" ;
            document.getElementById("pause").style.display = "none";
        }
        function actualizo_hora()
        {
          document.getElementById("reloj").value =agrego_cero(h)+":"+agrego_cero(m)+":"+agrego_cero(s);
          s=s+1;
    if(s>59)
    {
        m=m+1;
        s=0;
    }
    if(m>59)
    {
        m=0;
        h=h+1;
    }
    if(h>24)
     {
      h=0;
     }

    setTimeout("actualizo_hora()",1000);
          
        }
        function agrego_cero(num)
        {
          if(num<10)
           return "0"+num;
          else 
          return num;
        }

function obtengo_hora(){
  h=<?php echo $hora;?>;
  m=<?php echo $minuto;?>;
  s=<?php echo $segundo;?>;
  
 actualizo_hora();
}

function dia_semana(num)
{
  if(num ==0)
  return "DOMINGO";
  if(num ==1)
  return "LUNES";
  if(num ==2)
  return "MARTES";
  if(num ==3)
  return "MIERCOLES";
  if(num ==4)
  return "JUEVES";
  if(num ==5)
  return "VIERNES";
  if(num ==6)
  return "SABADO";
}
function MES(num)
{
  if(num ==0)
  return "ENERO";
  if(num ==1)
  return "FEBRERO";
  if(num ==2)
  return "MARZO";
  if(num ==3)
  return "ABRIL";
  if(num ==4)
  return "MAYO";
  if(num ==5)
  return "JUNIO";
  if(num ==6)
  return "JULIO";
  if(num ==7)
  return "AGOSTO";
  if(num ==8)
  return "SEPTIEMBRE";
  if(num ==9)
  return "OCTUBRE";
  if(num ==10)
  return "NOVIEMBRE";
  if(num ==11)
  return "DICIEMBRE";
}
  function cargar() {

    let fecha=new Date();
   dia=dia_semana(fecha.getDay());
   num_dia=fecha.getDate();
   mes=fecha.getMonth();
   ano=fecha.getFullYear();
    var audio = document.getElementById("audio");
  audio.volume = document.getElementById("volume").value;
  document.getElementById("play").style.display = "inline-block";
   document.getElementById("pause").style.display = "none";
   
   document.getElementById("FechaInp").value=dia+" "+num_dia+ " de "+MES(mes)+" del "+ano;
   obtengo_hora();
   

  }
  
  function cambia_vol()// QUE PASA CUENDO MUEVO LA BARRA DEL VOLUMEN
  {
    audio.volume=document.getElementById("volume").value;
  
  }
  
  
  
 
 
 </script>

   
    <link href="css/estiloscss.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="initial-scale=1">
  </head>
  <body onload="cargar()">
  
  <div class="contenedor">
     <div class="recuadro"><!-- RECUADRO CENTRAL -->
         <div class="logo"><img src="img/logo.jpg" alt="" class="loguito">
        </div><!-- CIERRA LOGO -->
             <div class="reproductor"><!-- REPRODUCTOR -->
            
                <button onclick="play()"  class="boton" id="play">►</button>
                 <button onclick="pause()" class="boton" id="pause">ll</button>
                  Volumen: <input type="range" id="volume" step=".1" min="0" max="1" value="1" onchange="cambia_vol()">
                
  <div class="Cont_reloj"><!-- RELOJ -->
  <input type="text" id="reloj" readonly="true">

  <div id="fecha"><!-- FECHA -->
  <input type="text" id="FechaInp" readonly="true">
  </div><!--CIERRA FECHA -->
  </div><!-- CIERRA RELOJ -->
  </div><!-- CIERRA REPRODUCTOR -->
  <div class="pie"><div class="textopie">© 2021, UTOPIAFM</br>
Designed by Treintaytres.net</div>
<div class="redes">
    <img src="img/facebook.gif" alt="" class="logoredes">
    <img src="img/equalizer.webp" alt="" class="logoredes">

</div>
</div><!--CIERRA EL PIE -->

</div><!--CIERRA RECUEDRO CENTRAL -->
</div><!--CIERRA CONTENEDOR -->
  <audio id="audio">
 <source src="https://stream.zenolive.com/161up1rgqm0uv.aac" type="audio/mpeg">
 Tu navegador no es compatible
  </audio>
  
  </body>
</html>