 <div class="col-s-4 col-4">
</div>
<div class="col-s-4 col-4 " style="padding:10px 100px;">	
<h2 class="tc p1 ">Add a word</h2>
<br>
 <?php if (empty($word->id) || $userId == $word->authorId): ?> 
<form action="" method="post">
	<input type="hidden" name="word[id]" value="<?=$word->id ?? ''?>">

    

    <label for="fl">First:</label>
    <input type="text" id="fl" name="word[first_language]" value="<?=$word->first_lamguage??""?>">

    <label for="sl">Second:</label>
    <input type="text" id="sl" name="word[second_language]" value="<?=$word->second_language??""?>">    

    <input type="submit" name="submit" value="Save">
</form>
<?php else: ?>
    
    <p>You may only edit jokes that you posted.</p>
    
    <?php endif; ?> 
</div>
    <div class="col-s-4 col-4">
   </div>