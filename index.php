<!DOCTYPE html>
<html>
<?php
include 'head.php';
include 'header.php';
include 'privacy.php';
include 'cookies.php';
?>
<body class="c-layout-header-fixed c-layout-header-fullscreen c-layout-header-topbar ilustracion">

<div class="c-layout-page">

    <div class="home-page-wrapper">
        <?php
        include "home.php";
        include "espectaculo.php";
        include "donde-y-cuando.php";
        include "productora-y-equipo.php";
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
