 <?php if (empty($word->id) || $userId == $word->authorId): ?> 
<form action="" method="post">
	<input type="hidden" name="word[id]" value="<?=$word->id ?? ''?>">

    <label for="authorId">Author id:</label>
    <input id="authorId" name="word[first_language]" value="<?=$word->authorId??""?>">

    <label for="fl">EN:</label>
    <input id="fl" name="word[first_language]" value="<?=$word->first_lamguage??""?>">

    <label for="sl">RU:</label>
    <input id="sl" name="word[second_language]" value="<?=$word->second_language??""?>">    

    <input type="submit" name="submit" value="Save">
</form>
<?php else: ?>

<p>You may only edit jokes that you posted.</p>

 <?php endif; ?> 