
<div id="login">
  <form name="loginform"
        method="POST"
        onsubmit="if(verify(this)) return true; else alert('Field Error!'); return false;">
    <h4>
      <span>Log in</span>
    </h4>
    <div>
      <label for="username">Username</label>
      <input type="text"
             name="username"
             id="text_username_1"
             value="">
    </div>
    <div>
      <label class="block" for="password">Password</label>
      <input type="password"
             name="password"
             id="text_password_1"
             value="">
    </div>
    <div>
      <input type="submit"
             name="submit"
             value="Log in"
             title="Log-in">
    </div>
    <input type="hidden" name="referer" value="<?php echo $w->_tpl_vars["referer"]; ?>">
  </form>

  <script>
    /* Focus on the login input */
    document.getElementById('text_username_1').focus();
    document.getElementById('text_username_1').value += '';
  </script>
</div>
