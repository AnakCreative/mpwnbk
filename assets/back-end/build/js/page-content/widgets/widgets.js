$(document).ready(function() {
    $(".counter").counterUp( {
        delay: 10, time: 1e3
    })
    $("#esp-comment").easyPieChart({
        barColor:"#8E23E0", trackColor:"#E6E6E6", scaleColor:!1, scaleLength:0, lineCap:"round", lineWidth:10, size:140, animate: {
            duration: 2e3, enabled: !0
        }
    }
    ), $("#esp-photo").easyPieChart({
        barColor:"#0667D6", trackColor:"#E6E6E6", scaleColor:!1, scaleLength:0, lineCap:"round", lineWidth:10, size:140, animate: {
            duration: 2e3, enabled: !0
        }
    }
    ), $("#esp-user").easyPieChart({
        barColor:"#17A88B", trackColor:"#E6E6E6", scaleColor:!1, scaleLength:0, lineCap:"round", lineWidth:10, size:140, animate: {
            duration: 2e3, enabled: !0
        }
    }
    ), $("#esp-feedback").easyPieChart({
        barColor:"#E5343D", trackColor:"#E6E6E6", scaleColor:!1, scaleLength:0, lineCap:"round", lineWidth:10, size:140, animate: {
            duration: 2e3, enabled: !0
        }
    });
});