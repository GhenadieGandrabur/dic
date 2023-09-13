 <div class="col-s-4 col-4">
</div>
<div class="col-s-4 col-4 " >
    <div class="sf">	
        <h2 class="tc p1 ">Add a word</h2>
        <br>
        <?php if (empty($word->id) || $userId == $word->authorId): ?> 
    <form action="" method="post">
        <input type="hidden" name="word[id]" value="<?=$word->id ?? ''?>">

        

        <label for="fl">Word:</label>
        <input type="text" id="fl" name="word[first_language]" value="<?=$word->first_language??""?>">

        <label for="sl">Translation:</label>
        <input type="text" id="sl" name="word[second_language]" value="<?=$word->second_language??""?>">    

        <input type="submit" name="submit" value="Save">
    </form>
    </div>
<?php else: ?>
    
    <p>You may only edit jokes that you posted.</p>
    
    <?php endif; ?> 
</div>
    <div class="col-s-4 col-4">
   </div>