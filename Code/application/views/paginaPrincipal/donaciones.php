<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url() ?>extrasPrincipal/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs mb-2">
					<span class="mr-2">
						<a href="<?php echo site_url('usuario/principal'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a>
					</span>
					<span>Donaciones <i class="ion-ios-arrow-forward"></i></span>
				</p>
				<h1 class="mb-0 bread">Donaciones</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Donaciones</h2>
				<p>Ayúdanos a ayudar a quienes no tienen voz</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="donation-left text-center">
					<h3 class="mb-4">Donaciones Económicas</h3>
					<img src="<?php echo base_url() ?>extrasPrincipal/images/qr.jpg" alt="Código QR" class="img-fluid">
					<p class="mt-3">Escanea el QR para donar directamente</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact-wrap w-100 p-md-5 p-4">
					<h3 class="mb-4">Dona Materiales o Insumos</h3>
					<form id="donationForm" name="donationForm" class="contactForm" onsubmit="sendWhatsAppMessage(event)">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label" for="name">Nombre Completo</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Tu nombre" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="label" for="donation">Quisiera ayudar con una donación de:</label>
									<input type="text" class="form-control" name="donation" id="donation" placeholder="Ej. Alimentos, medicamentos, ropa" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="label" for="message">Mensaje</label>
									<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Detalles adicionales" required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Enviar Mensaje" class="btn btn-primary">
									<div class="submitting"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.donation-left {
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		padding: 20px;
	}

	.donation-left h3 {
		color: #00bd56;
		font-weight: bold;
	}

	.donation-left img {
		max-width: 200px;
		border: 2px solid #00bd56;
		border-radius: 10px;
	}

	.contact-wrap {
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
	}
</style>

<script>
	function sendWhatsAppMessage(event) {
		event.preventDefault();
		var name = document.getElementById("name").value;
		var email = document.getElementById("email").value;
		var donation = document.getElementById("donation").value;
		var message = document.getElementById("message").value;
		var phoneNumber = "78337108";
		var whatsappMessage = `Hola, mi nombre es: ${name}\nDonación: ${donation}\nMensaje: ${message}`;
		var whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(whatsappMessage)}`;

		window.open(whatsappURL, "_blank");
	}
</script>
