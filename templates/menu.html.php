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
  <h2 class="p1 tc" class="tc">Your own dictionary.</h2>
<?php endif; ?>
</div>