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

    <div class="sw">
      <form action="/search" method="GET" class="seek">
        <input type="text" name="word" id="search myInput" placeholder="Enter first letters...">       
        <input type="submit" value="Search">
      </form>
    </div>


    <table>
      <tr>
        <th style="width:5%">#</th>
        <th style="width:40%">Word</th>
        <th style="width:40%">Translation</th>
        <th style="width:5%">Edit</th>
        <th style="width:10%">Delete</th>
      </tr>
      <?php $n = 0; ?>
      <?php foreach ($words as $word) : ?>
        <tr>
          <td><?= $n += 1; ?></td>
          <td><?= $word->first_language ?></td>
          <td><?= $word->second_language ?></td>
          <td><a href="/word/edit?id=<?= $word->id ?>">📝</a></td>
          <td>
            <form action="/word/delete" method="post">
              <input type="hidden" name="id" value="<?= $word->id ?>">
              <input style="padding:2px; background-color:white; margin:auto; text-align:right;" type="submit" value="❌">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <div class="col-s-3 col-3 ">

  </div>
</div>

<!-- <script>
  function clearInput() {
    var inputElement = document.getElementById('myInput');
    inputElement.value = '';
  }
</script> -->