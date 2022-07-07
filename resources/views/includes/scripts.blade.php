<!-- Bootstrap core JavaScript -->
<!--
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

-->



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {

var timeList = 300;
var TimeView = 4000;
var RadioBut = false;

$('.slide').hide().eq(0).show();
var slideNum = 0;
var slideTime;
slideCount = $("#slider .slide").length;

var animSlide = function(arrow){
    clearTimeout(slideTime);

    function slideDirectionHide(slideFloatNum, directTo){
            $('.slide').eq(slideFloatNum).fadeOut(timeList);
    }

    function slideDirectionShow(slideFloatNum, directTo, pause){
            $('.slide').eq(slideFloatNum).fadeIn(timeList, function() {
                if(pause == true) { rotator(); }
            });
    }

    var old_slideNum = slideNum;

    if(arrow == "next"){
            slideDirectionHide(slideNum, "left");
            if(slideNum == (slideCount-1)){slideNum=0;}
            else{slideNum++}
            slideDirectionShow(slideNum, "right", true);
            }
    else if(arrow == "prew")
    {
            slideDirectionHide(slideNum, "right");
            if(slideNum == 0){slideNum=slideCount-1;}
            else{slideNum-=1}
            slideDirectionShow(slideNum, "left", true);
    }else{
                if(arrow !== old_slideNum)
                {
                    if(arrow > old_slideNum)
                    {
                        slideDirectionHide(slideNum, "left");
                        slideNum = arrow;
                        slideDirectionShow(slideNum, "right", true);
                    }else if(arrow < old_slideNum) {
                        slideDirectionHide(slideNum, "right");
                        slideNum = arrow;
                        slideDirectionShow(slideNum, "left", true);
                    }

                }
    }

    $(".ctrl-select.active").removeClass("active");
    $('.ctrl-select').eq(slideNum).addClass('active');
}


    if(RadioBut){
    var linkArrow = $('<a id="prewBut" href="#">&lt;</a><a id="nextBut" href="#">&gt;</a>')
        .prependTo('#slider');
        $('#nextBut').click(function(){
           animSlide("next");
           return false;
           })
        $('#prewBut').click(function(){
           animSlide("prew");
           return false;
           })
    }
        var addSpan ='';
        $('.slide').each(function(index) {
               addSpan += '<span class = "ctrl-select">' + index + '</span>';
           });
        $('<div class ="Radio-But">' + addSpan +'</div>').appendTo('#slider-wrap');
        $(".ctrl-select:first").addClass("active");
        $('.ctrl-select').click(function(){
        var goToNum = parseFloat($(this).text());
        animSlide(goToNum);
        });
        var pause = false;
        var rotator = function(){
               if(!pause){slideTime = setTimeout(function(){animSlide('next')}, TimeView);}
               }
        $('#slider-wrap').hover(
           function(){clearTimeout(slideTime); pause = true;},
           function(){pause = false; rotator();
           });

    var clicking = false;
    var prevX;
    $('.slide').mousedown(function(e){
        clicking = true;
        prevX = e.clientX;
    });

    $('.slide').mouseup(function() {
     clicking = false;
    });

    $(document).mouseup(function(){
        clicking = false;
    });

    $('.slide').mousemove(function(e){
        if(clicking == true)
         {
             if(e.clientX < prevX) { animSlide("next"); clearTimeout(slideTime); }
             if(e.clientX > prevX) { animSlide("prew"); clearTimeout(slideTime); }
           clicking = false;
        }
    });
    $('.slide').hover().css('cursor', 'pointer');
    rotator();

});

</script>
<script>
$(function() {

  $('.sidemenu [href]').each(function() {
    if (this.href == window.location.href) {

      $(this).addClass('btn-primary');
    }
  });
});
</script>
