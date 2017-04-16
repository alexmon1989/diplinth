<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ App::getLocale() }}" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="{{ App::getLocale() }}" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="{{ App::getLocale() }}"> <!--<![endif]-->
<head>
	<title>{{ Memory::get('site.title_' . App::getLocale()) }}</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="keywords" content="{{ Memory::get('site.keywords_' . App::getLocale()) }}">
	<meta name="description" content="{{ Memory::get('site.description_' . App::getLocale()) }}">

	@foreach(['ru', 'uk', 'en', 'pl'] as $lang)
        @if($lang != App::getLocale())
            <link rel="alternate" href="{{LaravelLocalization::getLocalizedURL($lang) }}" hreflang="{{ $lang }}" />
        @endif
    @endforeach

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.png">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="unify/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="unify/css/one.style.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="unify/plugins/animate.css">
	<link rel="stylesheet" href="unify/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="unify/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="unify/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="unify/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	<!--[if lt IE 9]><link rel="stylesheet" href="unify/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->
	<link rel="stylesheet" href="unify/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="unify/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
	<link rel="stylesheet" href="unify/plugins/revolution-slider/rs-plugin/css/settings.css" type="text/css" media="screen">
	<!--[if lt IE 9]><link rel="stylesheet" href="unify/plugins/revolution-slider/rs-plugin/css/settings-ie8.css" type="text/css" media="screen"><![endif]-->
	<link rel="stylesheet" href="unify/plugins/lightbox2/css/lightbox.min.css">

	<!-- CSS Footer -->
	<link rel="stylesheet" href="unify/css/footers/footer-v7.css">

	<!-- Styles for tel btn -->
	<link rel="stylesheet" href="unify/css/tel-btn.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="css/custom.css">
</head>

<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery">
	<a href="tel:{{ $contactsSectionProperties->tel_1 }}" id="popup__toggle"><div class="circlephone" style="transform-origin: center;"></div><div class="circle-fill" style="transform-origin: center;"></div><div class="img-circle" style="transform-origin: center;"><div class="img-circleblock" style="transform-origin: center;"></div></div></a>

	<!--=== Header ===-->
	@include('marketing._partial.header')
	<!--=== End Header ===-->

	<!-- Main Section -->
	@include('marketing._partial.main')
	<!-- End Main Section -->

	<!--  About Section -->
	@include('marketing._partial.about')
	<!--  About Section -->

	<!-- Portfolio Section -->
	@include('marketing._partial.products')
	<!-- End Portfolio Section -->

	<!-- Contact Section -->
	@include('marketing._partial.contacts')
	<!-- End Contact Section -->

	<!-- Collaboration Modal -->
	@include('marketing._partial.collaboration')
	<!-- End Collaboration Modal -->


	<!-- JS Global Compulsory -->
	<script src="unify/plugins/jquery/jquery.min.js"></script>
	<script src="unify/plugins/jquery/jquery-migrate.min.js"></script>
	<script src="unify/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script src="unify/plugins/smoothScroll.js"></script>
	<script src="unify/plugins/jquery.parallax.js"></script>
	<script src="unify/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
	<script src="unify/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
	<script src="unify/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="unify/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.js"></script>
	<script src="unify/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="unify/plugins/lightbox2/js/lightbox.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>
	<script src="unify/js/plugins/gmaps-ini.js"></script>
	<!-- JS Page Level-->
	<script src="unify/js/one.app.js"></script>
	<script src="unify/js/forms/contact.js"></script>
	<script src="unify/js/plugins/revolution-slider.js"></script>
	<script src="unify/js/plugins/cube-portfolio/cube-portfolio-lightbox.js"></script>

	<script>
		jQuery(document).ready(function() {
			App.init();
			App.initParallaxBg();
			ContactForm.initContactForm();
			RevolutionSlider.initRSfullScreen();
			initMap($("#map").data('lat'), $("#map").data('lng'));
		});
	</script>
	<!--[if lt IE 9]>
    <script src="unify/plugins/respond.js"></script>
    <script src="unify/plugins/html5shiv.js"></script>
    <script src="unify/js/plugins/placeholder-IE-fixes.js"></script>
    <script src="unify/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
    <![endif]-->

	<!--[if lt IE 10]>
    <script src="unify/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
    <![endif]-->

	<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-96609597-1', 'auto');
        ga('send', 'pageview');
	</script>
</body>
</html>