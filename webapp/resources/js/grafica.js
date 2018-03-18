var ip = "10.1.103.226"; //IP del servidor web
var interval = 2000; //Tiempo de actualización

$(function() {
	recargarDatos();
	setInterval(recargarDatos, interval);
});

//Carga los gráficos de temperatura, humedad y luz
function cargarGraficos() {
	$.get( "http://"+ip+"/photon/api.php/getData", function( data ) {

		var ahora = ($.now()/1000).toFixed(0);
		var datos = JSON.parse(data);
		var nuevos_datos=[];

		//Limpiamos el div de las gráficas
		$(".showcase-img").empty();
		
		$.each(datos,function(i,v){
			var obj = {};
			obj["temperatura"] = v["temperatura"];
			obj["fecha"] = v["fecha"]*1000;

			nuevos_datos.push(obj);
		})

		new Morris.Line({
		  // ID of the element in which to draw the chart.
		  element: 'temperatura',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: nuevos_datos,
		  // The name of the data record attribute that contains x-values.
		  xkey: 'fecha',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['temperatura'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Temperatura'],

		  xLabelFormat: function(d) {
          		return d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear(); 
          	}
		});

		nuevos_datos=[];
		$.each(datos,function(i,v){
			var obj = {};
			obj["humedad"] = v["humedad"];

			obj["fecha"] = v["fecha"]*1000;

			nuevos_datos.push(obj);
		})

		new Morris.Line({
		  // ID of the element in which to draw the chart.
		  element: 'humedad',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: nuevos_datos,
		  // The name of the data record attribute that contains x-values.
		  xkey: 'fecha',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['humedad'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Humedad'],

		  xLabelFormat: function(d) {
          	return d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear(); 
          }
		});

		var nuevos_datos=[];
		$.each(datos,function(i,v){
			var obj = {};
			obj["luz"] = v["luz"];

			obj["fecha"] = v["fecha"]*1000;

			nuevos_datos.push(obj);
		})

		new Morris.Line({
		  // ID of the element in which to draw the chart.
		  element: 'luz',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: nuevos_datos,
		  // The name of the data record attribute that contains x-values.
		  xkey: 'fecha',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['luz'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Luz'],

		  xLabelFormat: function(d) {
          		return d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear(); 
          	}
		});
	});
};

//Carga la info de la última actualización
function cargarInfo() {
	$.get( "http://"+ip+"/photon/api.php/data?transform=1&order=id,desc&page=1,1", function( data ) {

		var datos = data.data;
		var fecha = timestampToDate(datos[0].fecha);

		$("#ultima_temperatura").html(datos[0].temperatura+ " ºC");
		$("#ultima_humedad").html(datos[0].humedad+" %");
		$("#ultima_luz").html(datos[0].luz+" %");
		$("#ultima_fecha").html( pad(fecha.getDate(),2) + '/'+ pad(fecha.getMonth()+1,2) +'/'+ fecha.getFullYear() + ' ' + pad(fecha.getHours(),2) +':'+ pad(fecha.getMinutes(),2) +":"+ pad(fecha.getSeconds(),2) );
	});
};

//Recarga los graficos + info de última actualización
function recargarDatos() {
	cargarGraficos();
	cargarInfo();
};

// Funcion para convertir timestamp a date
function timestampToDate(timestamp){
	return new Date(timestamp*1000);
};

//Función que añade ceros a la izquierda si son necesarios
function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}