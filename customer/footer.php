<br><br>
<footer class="py-5 bg-dark">
    <div class="info">
      <h5>Contact Us</h5>
      <i class="fas fa-mobile-alt"></i> Mobile: 1111111111 &nbsp;&nbsp;  &nbsp;&nbsp;
      <i class="fas fa-envelope"></i> Email: foxbooks@gmail.com<br>
      <p class="m-0 text-center text-white">Copyright &copy; www.foxbooks.com 2020</p>
      <p class="m-0 text-center text-white">This site is developed and hosted by RA Web Developers</p>

    </div>
</footer>
<script type="text/javascript">

  $(document).ready(function(){
    $(".login").click(function(event){
      event.stopPropagation();
      event.stopImmediatePropagation();
      $("#LoginModal").modal("show");
      return false;
    });
    $('#login').click(function(){
      var username = $('#username').val();
      var password = $('#password').val();
      if(username == '' || password == '')
      {
        $('#help').html("both fields are required");
      }else{
        $.ajax({
          url: "loginprocess.php",
          method: "post",
          dataType: "text",
          data:{username:username,password:password},

          success: function(msg){
            if(msg==1)
            {
              window.location.href = window.location.href;
            }else{
              $('#help').html("invalid username or password")
            }

          }
        });
      }

    });
      cart_count();
      function cart_count(){
        $.ajax({
          url: 'countcart.php',
          method:"post",
          dataType: "text",
          success: function(data)
          {
            $('#countcart').html(data);
          }
        });
      }
    $('button[type=button]').click(function(){
      var id = $(this).attr("id");
      var book_id = $('#book_id'+id+'').val();
      var book_name = $('#book_name'+id+'').val();
      var price = $('#price'+id+'').val();
      var image = $('#img'+id+'').val();
      var quantity = 1;
      var action = "add_to_cart";
      $.ajax({
        url: "cart_process.php",
        method: "post",
        dataType: "text",
        data:{book_id:book_id,book_name:book_name,price:price,image:image,quantity:quantity,action:action},
        success:function(msg){
          cart_count();
          $('#status').html(msg);
          window.setTimeout(function(){
            $(".alert").fadeTo(500,0).slideUp(500,function(){
              $(this).remove();
            })
          },1500);
        }
      });
    });
    $('#check').click(function(){
      $('#checkoutform').addClass('was-validated')
    });
    $(".checkout").click(function(event){
     event.stopPropagation();
     event.stopImmediatePropagation();
     $("#deliveryAddressModal").modal("show");
     return false;
   });

});
</script>
</body>
</html>
