<?= $totalWords ?>
<a href="/word/edit" >Add a word</a>
<table>
  <tr>
    <th>#</th>
    <th>Autor id</th>
    <th>EN</th>
    <th>RUS</th>
  </tr>
  <?php $n=0; ?>
  <?php foreach ($words as $word) : ?>
    <tr>
      <td><?=$n+=1;?></td>
      <td><?= $word->authorId ?></td>
      <td><?= $word->first_language ?></td>
      <td><?= $word->second_language ?></td>
    </tr>    
    <?php endforeach; ?>
  </table>