<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['id'])){
        header('Refresh:4;url=index.php');
        echo('<script src="alert/alertify.min.js"></script>');
        echo('<link rel="stylesheet" href="alert/alertify.core.css"/>');
        echo('<link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />');
        echo('<script type="text/javascript">window.onload=function(){alertify.alert("Please Login/Register Before!!");}</script>');
        die();
    }
    require_once "pdo.php";
    unset($_SESSION['place']);
    unset($_SESSION['image_url']);
    unset($_SESSION['image_name']);
    unset($_SESSION['t_mail']);
    unset($_SESSION['name']);
    unset($_SESSION['persons']);
    unset($_SESSION['to_date']);
    unset($_SESSION['from_date']);
    unset($_SESSION['pid']);
    
    $stmt=$pdo->prepare("SELECT * FROM packages WHERE package_name=:py;");
    $stmt->execute(array(':py'=>$_GET['place']));
    $ans=$stmt->fetch(PDO::FETCH_ASSOC);
    $dur=$ans['duration'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="alert/alertify.min.js"></script>
    <link rel="stylesheet" href="alert/alertify.core.css"/>
    <link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />
</head>
<body id="book_body">
  <div class="wrapper form_control" >
  <div class="checkout_wrapper">
    <div class="product_info">
      <img src="<?php echo(htmlentities($ans['package_image']))?>" alt="product">
      <div class="content">
          <h3><?php echo(($_GET['place']));?><br><br>Rs. <span id="pack_price"><?php echo(htmlentities($ans['package_price']));?></span></h3>
      </div>
    </div>
    <div class="checkout_form">
      <p>Booking Details</p>
      <div class="details">
        <div class="section">
          <label>Name: </label>
          <input type="text" id="tname" autocomplete="off">
        </div>
         <div class="section">
         <label>E-Mail:</label>
          <input id="t_mail"  type="text" placeholder="Enter Customer's E-Mail address:" pattern="[^ @]*@[^ @]*" autocomplete="off">
        </div>
         <div class="section">
         <label>Number of Persons (excluding child(below age 5yrs) : </label>
          <input type="number" id="tpersons" placeholder="1"  autocomplete="off">
        </div>
        <div class="section">
            <label>Start Date:</label>
            <input type="date" id="in_date" autocomplete="off">
        </div>
        <div class="section last_section">
          <div class="item">
           <label>End Date:</label>
            <input type="date" id="out_date" autocomplete="off" disabled>
          </div>
        </div>
        <div class="btn_checkout">
          <a>Proceed to checkout</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
    var ps2=decodeURI(window.location.search.substring(7));
    var priced=parseFloat(document.getElementById("pack_price").innerHTML);
    document.getElementById("tpersons").addEventListener('change',function (){
        var price=parseFloat(document.getElementById("pack_price").innerHTML);
        var number=document.getElementById("tpersons").value;
        price=price*number;
        if(number==0)
            price=priced;
        document.getElementById("pack_price").innerHTML=price;
    });
    $('#in_date').on('change',function(){
        var input=document.getElementById("in_date").value;
        var DateEntered=new Date(input);
        var output=new Date(DateEntered);
        output.setDate(output.getDate()+<?php echo($dur);?>);
        document.getElementById("out_date").value=formatDate(output);
    });
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;
        return [year, month, day].join('-');
    }
    $('.btn_checkout').click(function(){
        var isValid=true;
        $('input').each(function(){
            if(!$(this).val()){
                isValid=false;
                alertify.alert("Please Fill All Fields!!");
                return false;
            }
        });
        if(isValid==true){
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('t_mail').value))
            {
                var fromd=document.getElementById('in_date').value;
                var tomd=document.getElementById('out_date').value;
                var persons=document.getElementById('tpersons').value;
                var trmail=document.getElementById('t_mail').value;
                var trname=document.getElementById('tname').value;
                var forms='package_name='+ps2+'&status='+'Confirmed'+'&from_date='+fromd+'&to_date='+tomd+'&trname='+trname+'&persons='+persons+'&trmail='+trmail;
                console.log(forms);
                $.ajax({
                    url:"session_set.php",
                    type:"POST",
                    data:forms,
                    /*success:function(data){
                        console.log(data);
                    },
                    error:function(data){
                        console.log(data);
                        //alertify.alert("Some Unknown Error Occured");
                    }*/
                    complete:function(response){
                        console.log(response);
                        window.location.href="payment_form.php";
                    }
                       
                });
            }
            else{
                alertify.alert("You have entered an invalid email address!");
                isValid=false;
            }
        }
    });
</script>
</body>
</html>