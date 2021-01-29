$(function(){
    $(".destination").click(function(){
        var ids=$(this).attr('id');
        window.location="./"+ids+".php";
    });
    $(".Off-beat>ul").animate({left:200, opacity:"show"}, 5000);
    $("#packages").ready(function(){
        $(".package-list").animate({top:"100px",opacity:"1"},2000);
    }); 
});

