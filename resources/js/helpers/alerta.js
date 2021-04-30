const $swal = require('sweetalert2');
const axios = require('axios').default;
export const alerta = {
	showAlert,
};

function showAlert(tipo, mensaje, item = null, url = null) {
	switch (tipo) {
		case "error":
			$swal.fire({
				allowOutsideClick: false,
				icon: 'error',
				title: 'Error',
				text: mensaje,
			});
			break;
		case "éxito":
			$swal.fire({
				icon: 'success',
				title: 'Éxito',
				text: mensaje,
			});
			break;
		case "advertencia":
			$swal.fire({
				icon: 'warning',
				title: 'Advertencia',
				text: mensaje,
			});
			break;
		case "información":
			$swal.fire({
				icon: 'info',
				title: 'Información',
				text: mensaje,
			});
		case "esperar_post":
			var exito;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading()
					exito = axios.post(url, item)
						.then((respuesta) => {
							$swal.close();
							$swal.fire({
								type: 'success',
								title: 'Éxito',
								text: mensaje==''?"Se ha enviado la información de manera exitosa":mensaje,
							});
							return exito = true;
						}).catch((error) => {
							$swal.close();
							$swal.fire({
								type: 'error',
								title: 'Error',
								text: "Ocurrió un error, vuelve a intentarlo",
							});
							return exito = false;
						})
				},
			});
			return exito;
			break;
		case "esperar_post_backend":
			var exito;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading()
					exito = axios.post(url, item)
						.then((respuesta) => {
							$swal.close();
							$swal.fire({
								icon: 'success',
								title: 'Éxito',
								text: respuesta.data,
							});
							return exito = true;
						}).catch((error) => {
							$swal.close();
							$swal.fire({
								icon: 'error',
								title: 'Error',
								text: "Ocurrió un error, vuelve a intentarlo",
							});
							return exito = false;
						})
				},
			});
			return exito;
			break;
		case "esperar_archivos":
			var exito;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading()
					exito = axios.post(url, item,{ headers: { 'content-type': 'multipart/form-data' }})
						.then((respuesta) => {
							$swal.close();
							$swal.fire({
								icon: 'success',
								title: 'Éxito',
								text: "Se ha enviado la información de manera exitosa",
							});
							return exito = true;
						}).catch((error) => {
							$swal.close();
							$swal.fire({
								icon: 'error',
								title: 'Error',
								text: "Ocurrió un error, vuelve a intentarlo",
							});
							return exito = false;
						})
				},
			});
			return exito;
			break;
		case "esperar":
			var exito;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading()
					exito = axios.post(url, item)
						.then((respuesta) => {
							$swal.close();
							return exito = true;
						}).catch((error) => {
							$swal.close();
							return exito = false;
						})
				},
			});
			return exito;
			break;
		case "esperar_get":
			var data;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading();
					data = axios.get(url, {
						params: item
					}).then((respuesta) => {
						$swal.close();
						return data = respuesta.data;
					}).catch((error) => {
						$swal.close();
						return data = null;
					})
				},
			});
			return data;
			break;
			case "esperar_post_respuesta":
			var data;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading();
					data = axios.post(url,item).then((respuesta) => {
						$swal.close();
						return data = respuesta.data;
					}).catch((error) => {
						$swal.close();
						return data = null;
					})
				},
			});
			return data;
			break;
			case "esperar_post_sin_mensaje":
			var data;
			$swal.fire({
				title: 'Espera por favor',
				onBeforeOpen: function() {
					$swal.showLoading();
					data = axios.post(url, 
						item
					).then((respuesta) => {
						$swal.close();
						return data = respuesta.data;
					}).catch((error) => {
						$swal.close();
						return data = null;
					})
				},
			});
			return data;
			break;
	}

};