<?php require_once "../partials/header.php" ?>

<body>
<p class="tip">TUTI APPERTMENTS</p>
<div class="cont">
  <div class="form sign-in">
    <h2>Welcome back,</h2>
    <form action="../partials/login.inc.php" method="post">
    <label>
      <span>Email or User Name</span>
      <input name="username" type="text" />
    </label>
    <label>
      <span>Password</span>
      <input name="password" type="password" />
    </label>
    <p class="forgot-pass">Forgot password?</p>
    <button type="submit" class="submit">Sign In</button>
    </form>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and join our Family!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    <div class="form sign-up">
      <h2>Time to feel like home,</h2>
      <form action="../partials/signup.inc.php" method="post">
      
      <label>
        <span>First name</span>
        <input name="first_name" type="text" />
      </label>
      <label>
        <span>Last name</span>
        <input name="last_name" type="text" />
      </label>
      <label>
        <span>User name</span>
        <input name="user_name" type="text" />
      </label>
      <label>
        <span>Email</span>
        <input name="email" type="email" />
      </label>
      <label>
        <span>phone Number</span>
        <input name="phone_number" type="text" />
      </label>
      <label>
        <span>Password</span>
        <input name="password" type="password" />
      </label>
      <label>
        <span>Confirm Password</span>
        <input name="password_repeat" type="password" />
      </label>
      <button type="submit" class="submit">Sign Up</button>
      </form>
    </div>
  </div>
</div>
<script>
document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});
</script>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
</body>
</html>