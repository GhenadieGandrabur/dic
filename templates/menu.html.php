<div>
<?php if ($loggedIn) : ?>
  <top>
    <ul>    
      <?php if ($loggedIn) : ?>
        <li style="float:right"><a href="/logout">Log out</a></li>
      <?php else : ?>
        <li><a href="/login">Log in</a></li>
      <?php endif; ?>
    </ul>
      </top>
<?php else : ?>
  <div class="col-s-12 col-12">
  <h2 class="p1 tc bgb cw" class="tc">Your own dictionary.</h2>
  </div>
<?php endif; ?>
</div>