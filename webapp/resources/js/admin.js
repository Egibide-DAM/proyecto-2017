var ip = "10.1.103.226"; //IP del servidor web
var slider; //Slider temperatura

$(function(){
	inicializarSlider();
});

//Request para cambiar el intervalo de temperatura para que se encienda el interruptor
function cambiarTemperatura() {
	var valores = slider.slider("getValue");
	var json = '{"temperatura_min":'+valores[0]+', "temperatura_max":'+valores[1]+'}';

	$.ajax({
	    url: 'http://'+ip+'/photon/api.php/updateTemperatura',
	    type: 'POST',
	    data: {data:json},
	    success: function(result) {
	        noty('success', 'Temperatura modificada.')
	   	}
	});
};

//Request a photon para cambiar su estado entre on/off para la recogida de datos
function cambiarEstado(e) {
	$.ajax({
	    url: 'https://api.particle.io/v1/devices/4c0024000151353532373238/estado?access_token=246877a51d8ccb5c298eeee01af53c3bf65e474f',
	    type: 'POST',
	    data: {args: e},
	    success: function(result) {
	    	if (e == "on")
	    		noty('success', 'Photon encendido.')
	    	else
	    		noty('error', 'Photon apagado.')
	    }
	});
};

//Inicializa el slider
function inicializarSlider() {
	$.get('http://'+ip+'/photon/api.php/config?transform=1&filter=clave,sw,temperatura', function(data) {
		slider = $("#temperatura").slider({ 
			id: "temperatura", 
			min: 10,
			max: 30, 
			range: true, 
			value: [parseInt(data.config[0].valor), parseInt(data.config[1].valor)], 
			tooltip: 'always',
			formatter: function(value) {
				return value;
			} 
		});

		slider.slider().on('slideStop', function(event) {
			cambiarTemperatura();
		});
	});
};

//Crea una alerta noty
function noty(type, msg) {
	new Noty({
	    type: type,
	    layout: 'topRight',
	    text: msg,
	    theme: 'metroui',
	    progressBar: true,
	    timeout: 3000
	}).show();
};