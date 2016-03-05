// on page load...
    moveProgressBar();
    // on browser resize...
    $(window).resize(function() {
        moveProgressBar();
    });

    // SIGNATURE PROGRESS
    function moveProgressBar() {
      console.log("moveProgressBar");
        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
        var getProgressWrapWidth = $('.progress-wrap').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 1000;
        
        // on page load, animate percentage bar to data percentage length
        // .stop() used to prevent animation queueing
        $('.progress-bar').stop().animate({
            left: progressTotal
        }, animationLength);
    }

    // on page load...
moveProgressBar1();
// on browser resize...
$(window).resize(function () {
    moveProgressBar1();
});

// SIGNATURE PROGRESS
function moveProgressBar1() {
    var getPercent1 = ($('.progress-wrap1').data('progress-percent1') / 100);
    var getProgressWrapWidth1 = $('.progress-wrap1').width();
    var progressTotal = getPercent1 * getProgressWrapWidth1;
    var animationLength = 1200;

    // on page load, animate percentage bar to data percentage length
    // .stop() used to prevent animation queueing
    $('.progress-bar1').stop().animate({
        left: progressTotal
    }, animationLength);
}