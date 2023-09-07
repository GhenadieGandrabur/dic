
<div class="col-s-12 col-12 ">
<div class="col-s-3 col-3 ">
</div>
<div class="col-s-6 col-6 ">
  <top>
    <ul>
      <li>
        <p>HI <?= $user ?>!</p>
      </li>
      <li><?= $totalWords ?> words in your DB</li>
      <li><a class="bt" href="/word/edit">Add a word</a></li>
    </ul>
  </top>

  <form action="" method="GET" class="seek">
    <input type="text" name="search" id="search" placeholder="Enter first letters...">
    <input type="submit" value="Search">
  </form>


  <table>
    <tr>
      <th style="width:10%">#</th>
      <th style="width:45%">First</th>
      <th>Second</th>
    </tr>
    <?php $n = 0; ?>
    <?php foreach ($words as $word) : ?>
      <tr>
        <td><?= $n += 1; ?></td>
        <td><?= $word->first_language ?></td>
        <td><?= $word->second_language ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="col-s-3 col-3 ">

</div>
</div>