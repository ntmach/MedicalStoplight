<?php

echo 'page ';

for ($i = 1; ($i - 1) * 8 < $content_length; $i++) {
    if ($i == $page_number) {
        echo $i;
    }
    else 
    {
        if ($tag == 'conditionID'){
            echo "<a href =?conditionID=".$condition_id."&amp;pageNumber=".$i.">". $i .' ' ."</a>";
        }
        else if ($tag == 'viewThread')
        {
            echo "<a href='?action=viewThread&amp;threadID=".$thread_id."&amp;conditionID=".$condition_id."&amp;pageNumber=".$i."'>". $i ."</a>";
        }
    }
}
?>

