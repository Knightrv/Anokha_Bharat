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
<body id="payment">
 <div class="wrapper" id="debit">
  <div class="container">
    <div class="payment_title">Payment Form</div>
    
    <div class="debit_input-form">
      <div class="debit_section-1">
        <div class="debit_items">
          <label class="debit_label">card number</label>
          <input type="text" class="debit_input" maxlength="16" data-mask="0000 0000 0000 0000"placeholder="1234 1234 1234 1234" autocomplete="off">
        </div>
      </div>
      <div class="debit_section-2">
        <div class="debit_items">
          <label class="debit_label">card holder</label>
          <input type="text" class="debit_input" placeholder="Coding Market" autocomplete="off">
        </div>
      </div>
      <div class="debit_section-3">
        <div class="debit_items">
          <label class="debit_label">Expire date</label>
          <input type="text" class="debit_input" data-mask="00 / 00" placeholder="MM / YY" autocomplete="off">
        </div>
        <div class="debit_items">
          <div class="cvc">
              <label class="debit_label">cvc code</label>
          </div>
          <input type="text" class="debit_input" data-mask="0000" placeholder="0000" autocomplete="off">
        </div>
      </div>
    </div>
    
    <div class="debit_btn">proceed</div>
    
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
    $('.debit_btn').click(function(){
        var isValid=true;
        $('input').each(function(){
            if(!$(this).val()){
                isValid=false;
                alert("Please Fill All Fields!!");
                return false;
            }
        });
        if(isValid==true){
            $.ajax({
                    url:"add_bookings.php",
                    type:"get",
                    success:function(data){
                        alertify.alert("Payment Successful");
                        setTimeout(function(){
                            window.location.href="userpage.php";
                        },3000);
                        console.log(data);
                    },
                    error:function(){
                        alertify.alert("Some Unknown Error Occured");
                    } 
                });
        }
    });
</script>
</body>
</html>




