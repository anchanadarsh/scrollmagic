<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> scrollmagic </title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="section_wrapper">
        <div class="screenElement">
            <div class="tvElement"></div>
        </div>
        <section class="section_box" id="one"></section>
        <section class="section_box" id="two"></section>
        <section class="section_box" id="three"></section>
        <section class="section_box" id="four"></section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineLite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenLite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function() {
            var getSecOneH = $('#one').outerHeight();
            var getSecTwoH = $('#two').outerHeight();
            var getSecThreeH = $('#three').outerHeight();

            //            var getScreenOffset = $('.screenElement').offset().top;
            //            var getScreenH = $('.screenElement').outerHeight();
            //            var getDDiff = getScreenOffset + getScreenH;

            var getSceneOneD = getSecOneH + getSecTwoH;

            var controller = new ScrollMagic.Controller();

            var tweenToScreen = TweenMax.to(".tvElement", 1, {
                width: 400,
                right: -2,
                bottom: -2
            });

            var sceneToScreen = new ScrollMagic.Scene({
                    duration: getSceneOneD, // the scene should last for a scroll distance of 100px
                    offset: 0 // start this scene after scrolling for 50px
                })
                .setTween(tweenToScreen)
                .setPin(".screenElement") // pins the element for the the scene's duration
                .addIndicators()
                .addTo(controller);

            var tweenTvToTv = TweenMax.to(".tvElement", 1, {
                width: 200,
                right: -2,
                bottom: -2
            });

            var sceneTvToTv = new ScrollMagic.Scene({
                    triggerElement: '#three',
                    duration: getSecThreeH, // the scene should last for a scroll distance of 100px
                    offset: 0 // start this scene after scrolling for 50px
                })
                .setTween(tweenTvToTv)
                .setPin(".tvElement") // pins the element for the the scene's duration
                .addIndicators()
                .addTo(controller);


            var tweenScreenToTv = TweenMax.to(".screenElement", 1, {
                width: 200,
                left: 800
            });

            var sceneScreenToTv = new ScrollMagic.Scene({
                    triggerElement: '#three',
                    duration: getSecThreeH, // the scene should last for a scroll distance of 100px
                    offset: 0 // start this scene after scrolling for 50px
                })
                .setTween(tweenScreenToTv)
                .setPin(".screenElement") // pins the element for the the scene's duration
                .addIndicators()
                .addTo(controller);

        });

    </script>
</body>

</html>
