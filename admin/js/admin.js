$(function(){
        $(window).on('load resize',function(){
        var ht=$(document).outerHeight(true);
        var hnav=0;
        if($('.navbar-dark')[0]){
            hnav=hnav+$('.navbar-dark').outerHeight(true);
            hnav=hnav+1;
            var wrapht=$('.admin-wrapper').css({'height':ht});
            $('.admin-wrapper').css({'margin-top':hnav});
            $('.loginbox').css({'margin-top':hnav});
        }
       // console.log(ht);
        //console.log(hnav);
        //console.log(typeof hnav);
        var lt=$('.admin-sidebar').outerWidth(true);
        $('.admin-content').css({'margin-left':lt});
        console.log($('.admin-sidebar').outerWidth(true));
        console.log($('.admin-content').outerWidth(true));
        console.log($('.admin-wrapper').outerWidth(true));
 });
 });

