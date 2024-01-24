<script>
  document.getElementById("topMenuSelectProfile").className = "top topSelected";
</script>
<div>
  <div id="newuser">
    <form name="profileform"
          method="POST"
          onsubmit="if(verify(this)) return true; else alert('Field Error!'); return false;">
      <div id="newuserDiv1">
        <div class="buttons">
          <button type="submit"
                  name="submit"
                  class="positive">
            <img src="<?php echo $w->template_include_dir; ?>images/icons/tick.png"
                 alt="">
            Update Profile
          </button>
        </div>
      </div>
      <div id="newUserDiv2">
        <div class="newUserDiv2Fields">
          <label for="text_username_1">
            <strong>Username</strong>
          </label>
          <input class="usersInput"
                 type="text"
                 name="username"
                 id="text_username_1"
                 value="<?php echo $User->username; ?>" disabled>
        </div>
        <div class="newUserDiv2Fields">
          <label for="text_password_0">
            <strong>Password</strong>
          </label>
          <input class="usersInput"
                 type="password"
                 name="password"
                 id="text_password_0"
                 value="">
        </div>
        <div class="newUserDiv2Fields">
          <label for="text_password2_0">
            <strong>Password (Again)</strong>
          </label>
          <input class="usersInput"
                 type="password"
                 name="password2"
                 id="text_password2_0"
                 value="">
        </div>
        <div class="newUserDiv2Fields">
          <label for="email_email_1">
            <strong>E-mail</strong>
          </label>
          <input class="usersInputEmail"
                 type="text"
                 name="email"
                 id="email_email_1"
                 value="<?php echo $User->email; ?>">
          <input type="hidden" name="update" value="0">
        </div>
      </div>
    </form>
  </div>
</div>
