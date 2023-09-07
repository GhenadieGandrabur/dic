<div>
<?php if ($loggedIn) : ?>
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/word/list">Dictionary</a></li>
      <?php if ($loggedIn) : ?>
        <li><a href="/logout">Log out</a></li>
      <?php else : ?>
        <li><a href="/login">Log in</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php else : ?>
  <h6 class="tc">Welcome to our site.</h6>
<?php endif; ?>
</div>