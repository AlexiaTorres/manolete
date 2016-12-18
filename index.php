<!DOCTYPE html>
<html>
<head>
    <title>Master de Ilustración y Concept-Art - Aula Temática Madrid Escuela 3D</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php
    include 'head.php';
    include 'header.php';
    include 'privacy.php';
    include 'cookies.php';
    ?>
<body class="c-layout-header-fixed c-layout-header-fullscreen c-layout-header-topbar ilustracion">

<div class="c-layout-page">

    <div class="home-page-wrapper">
        <section class="c-layout-revo-slider c-layout-revo-slider-2">
            <div class="tp-banner-container c-theme tp-fullscreen tp-fullscreen-mobile">
                <div class="tp-banner">
                    <ul>
                        <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                            <img alt="" src="assets/base/img/content/cover.jpg" data-bgposition="center center"
                                 data-bgfit="cover" data-bgrepeat="no-repeat">
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="c-layout-revo-slider c-layout-revo-slider-2">
            <div class="c-content-box c-size-md">
                <div class="container">
                    <p>
                        Manolete es una <span class="red-bold"> producción española al más puro estilo de los
                        musicales de Broadway</span>. Un espectáculo en el que la ambientación y los efectos
                        multimedia contrastan con cantaores, barítonos, tenores y mezzosopranos. Una fusión
                        de estilos musicales. Una combinación armoniosa de lírica, flamenco, ballet y una
                        orquesta de 35 instrumentos. Una obra destinada a recorrer el mundo transmitiendo
                        arte, pasión y espectáculo.
                        <br/><br/>
                        Manolete es un musical que transporta al público a la España de la posguerra,
                        <span class="red-bold">es un viaje a la década de los años 40</span>, que a lo largo de 2 horas
                        narrará, a través
                        de la vida de una de sus figuras más representativas (Manolete), la historia de una
                        España de contrastes, de glamour y lujo en un país empobrecido por una guerra. <span
                                class="red-bold">Una
                        España en la que, a pesar de las necesidades, brilla con fuerza el arte, la
                            valentía y la pasión</span>.
                        <br/><br/>
                        El protagonista de este espectáculo fue un ejemplo de disrupción, un símbolo
                        internacional de libertad y autodeterminación. Su romance con Lupe Sino, así como la
                        relación con su madre y una vida apasionada en todos los sentidos, generan un
                        espectáculo musical de gran envergadura, dirigido a los amantes de la música, de la
                        lírica y el flamenco, del arte y de la tradición. En definitiva, <span class="red-bold">un espectáculo
                            dedicado a los amantes de la cultura y de la tradición en general</span>.
                    </p>
                </div>
            </div>
        </section>

        <?php
        include "espectaculo.php";
        ?>

        <div id="footer-index" class="notice">
            <div class="bg"></div>
            <div id="barraaceptacion" class="content">
                <p class="text-muted">
                    Utilizamos cookies propias y de terceros para mejorar la experiencia de navegación, y ofrecer
                    contenidos
                    y publicidad de interés.<br/> Al continuar con la navegación entendemos que se acepta nuestra<a
                            class="ok" href="#modalCookies" role="button" data-toggle="modal"> política de
                        cookies</a>.<br/>
                    <a href="javascript:void(0);" class="ok" onclick="PonerCookie();">Aceptar</a>
                </p>
            </div>
        </div>

        <div class="c-layout-go2top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END: LAYOUT/FOOTERS/GO2TOP -->
    </div>
</body>
</html>

<?php
include 'footer.php';
?>

<script>
    function getCookie(c_name) {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        if (c_start == -1) {
            c_start = c_value.indexOf(c_name + "=");
        }
        if (c_start == -1) {
            c_value = null;
        } else {
            c_start   = c_value.indexOf("=", c_start) + 1;
            var c_end = c_value.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = c_value.length;
            }
            c_value = unescape(c_value.substring(c_start, c_end));
        }
        return c_value;
    }

    function setCookie(c_name, value, exdays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value     = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
        document.cookie = c_name + "=" + c_value;
    }

    if (getCookie('cdccookie') != "1") {
        document.getElementById("barraaceptacion").style.display = "block";
    }
    function PonerCookie() {
        setCookie('cdccookie', '1', 365);
        document.getElementById("barraaceptacion").style.display = "none";
    }
</script>
<script>
    function getTimeRemaining(endtime) {
        var t       = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours   = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days    = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock       = document.getElementById(id);
        var daysSpan    = clock.querySelector('.days');
        var hoursSpan   = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML    = t.days;
            hoursSpan.innerHTML   = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date('02-6-2017');
    initializeClock('clockdiv', deadline);
</script>
<?php
include 'foot.php';
?>
