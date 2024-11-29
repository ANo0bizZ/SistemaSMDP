<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url() ?>extrasPrincipal/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url('usuario/principal'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Contactos <i class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-0 bread">Contactos</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section" id="rescate-section">Rescate de Animales</h2>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-md-8">
				<div class="alert-rescue p-4">
					<h3 class="rescue-title mb-3">¿Encontraste un animal que necesita ayuda?</h3>
					<p class="rescue-text mb-3">Si has encontrado un animal en situación de calle, maltrato o que necesite atención urgente, por favor utiliza el siguiente formulario para proporcionarnos toda la información posible. Tu ayuda es fundamental para poder rescatar y ayudar a estos animalitos.</p>
					<ul class="rescue-tips">
						<li>Incluye la ubicación exacta donde se encuentra el animal</li>
						<li>Si es posible, adjunta fotos de la situación</li>
						<li>Describe el estado del animal y la urgencia del caso</li>
						<li>Deja tus datos de contacto para poder comunicarnos contigo</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="contact-wrap w-100 p-md-5 p-4">
					<h3 class="mb-4">Contáctanos</h3>
					<form id="contactForm" name="contactForm" class="contactForm" onsubmit="sendWhatsAppMessage(event)">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label" for="name">Nombre Completo</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Tu nombre" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="label" for="email">Correo Electrónico</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Tu correo" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="label" for="subject">Asunto</label>
									<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="label" for="message">Mensaje</label>
									<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Tu mensaje" required></textarea>
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

		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Redes Sociales</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="wrapper">
					<div class="row mb-5">
						<div class="col-md-3">
							<div class="dbox w-100 text-center">
								<a href="https://wa.link/bc9i3x" class="social-icon">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fab fa-whatsapp"></span>
									</div>
								</a>
								<div class="text">
									<p><span class="social-text">Whatsapp</span></p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="dbox w-100 text-center">
								<a href="https://www.facebook.com/CentroDeAdopcionesSanMartinDePorres" class="social-icon" target="_blank" rel="noopener noreferrer">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fab fa-facebook"></span>
									</div>
								</a>
								<div class="text">
									<p><span class="social-text">Facebook</span></p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="dbox w-100 text-center">
								<a href="https://www.instagram.com/refugiosanmartindeporres" class="social-icon">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fab fa-instagram"></span>
									</div>
								</a>
								<div class="text">
									<p><span class="social-text">Instagram</span></p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="dbox w-100 text-center">
								<a href="mailto:centrodeadopcionessmdp@gmail.com?subject=Consulta%20Centro%20de%20Adopciones%20San%20Martin%20de%20Porres&body=Hola,%20me%20gustar%C3%ADa%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre..." class="social-icon">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fas fa-envelope"></span>
									</div>
								</a>
								<div class="text">
									<p><span class="social-text">Correo</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.dbox {
		position: relative;
		margin-bottom: 30px;
	}

	.icon {
		width: 60px;
		height: 60px;
		border-radius: 50%;
		background: #00bd56;
		margin: 0 auto 20px auto;
		transition: all 0.3s ease;
	}

	.social-icon {
		text-decoration: none;
		color: white;
		display: inline-block;
	}

	.social-icon:hover .icon {
		background: #009945;
		transform: scale(1.1);
	}

	.text {
		margin-top: 15px;
	}

	.social-text {
		color: #000;
		transition: color 0.3s ease;
	}

	.social-text:hover {
		color: #00bd56;
	}

	.contact-wrap {
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
	}

	.btn-primary {
		background: #00bd56;
		border-color: #00bd56;
	}

	.btn-primary:hover {
		background: #009945;
		border-color: #009945;
	}

	.alert-rescue {
		background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
		border-left: 5px solid #00bd56;
		border-radius: 8px;
		box-shadow: 0 4px 15px rgba(0, 189, 86, 0.1);
		transition: transform 0.3s ease, box-shadow 0.3s ease;
	}

	.alert-rescue:hover {
		transform: translateY(-5px);
		box-shadow: 0 6px 20px rgba(0, 189, 86, 0.15);
	}

	.rescue-title {
		color: #00bd56;
		font-weight: 600;
		font-size: 1.5rem;
	}

	.rescue-text {
		color: #4a4a4a;
		line-height: 1.6;
	}

	.rescue-tips {
		list-style: none;
		padding-left: 0;
		margin-bottom: 0;
	}

	.rescue-tips li {
		position: relative;
		padding-left: 25px;
		margin-bottom: 10px;
		color: #666;
	}

	.rescue-tips li:before {
		content: "•";
		color: #00bd56;
		font-size: 1.5em;
		position: absolute;
		left: 5px;
		top: -5px;
	}

	@media (max-width: 768px) {
		.alert-rescue {
			margin: 0 15px;
		}
	}

	.dbox {
		position: relative;
		margin-bottom: 30px;
	}

	.icon {
		width: 60px;
		height: 60px;
		border-radius: 50%;
		background: #00bd56;
		margin: 0 auto 20px auto;
		transition: all 0.3s ease;
	}

	.social-icon {
		text-decoration: none;
		color: white;
		display: inline-block;
	}

	.social-icon:hover .icon {
		background: #009945;
		transform: scale(1.1);
	}

	.text {
		margin-top: 15px;
	}

	.social-text {
		color: #000;
		transition: color 0.3s ease;
	}

	.social-text:hover {
		color: #00bd56;
	}

	.contact-wrap {
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
	}

	.btn-primary {
		background: #00bd56;
		border-color: #00bd56;
	}

	.btn-primary:hover {
		background: #009945;
		border-color: #009945;
	}

	.contact-wrap {
		margin: 0 auto;
	}
</style>
<script>
	function sendWhatsAppMessage(event) {
		event.preventDefault();
		var name = document.getElementById("name").value;
		var email = document.getElementById("email").value;
		var subject = document.getElementById("subject").value;
		var message = document.getElementById("message").value;
		var phoneNumber = "78337108";
		var whatsappMessage = `Hola, mi nombre es: ${name}\nle escribo por el siguiente motivo: ${subject}\npodría ayudarme con: ${message}`;
		var whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(whatsappMessage)}`;

		window.open(whatsappURL, "_blank");
	}
</script>