<?php

function get_color_rating_accuracy_from_all($thread_id) {
    $total = 0;
    $i = 0;
    $comments_id = get_comments_by_thread($thread_id);
    foreach ($comments_id as $comment_id) {
        $color_ratings = get_color_rating_by_comments($comment_id['CommentsID']);
        foreach ($color_ratings as $color_rating) {
            $good = $color_rating['Green'];
            $total = $good + $total;
            $i++;
        }
    }
    if ($i == 0)
        $i =1;
    
    $accuracy = $total / $i;
    return $accuracy;
}

function get_color_rating_accuracy_by_thread_and_physician_id($thread_id, $physician_id) {
    $total = 0;
    $i = 0;
    $comments_id = get_comments_by_thread($thread_id);
    foreach ($comments_id as $comment_id) {
        $color_ratings = get_color_ratings_by_physician_and_comment($physician_id, $comment_id['CommentsID']);
        foreach ($color_ratings as $color_rating) {
            $good = $color_rating['Green'];
            $total = $good + $total;
            $i++;
        }
    }
    $count = count($comments_id);
    if ($count == 0) {
        $count = 1;
    }
    
    $accuracy = $total / $count;
    return $accuracy;
}

function display_accuracy($accuracy_all) {
    if ($accuracy_all < .51) {
        echo '<div class="row">
                  <span class="red-bullet"></span>
              </div>';
    } else if ($accuracy_all >= .51 && $accuracy_all < .85) {
        echo '<div class="row">
                    <span class="yellow-bullet"></span>
              </div>';
    } else {
        echo '<div class="row">
                    <span class="green-bullet"></span>
              </div>';
    }
}

function display_red(){
    echo '<div class="row">
                  <span class="red-bullet"></span>
              </div>';
}

function display_green(){
    echo '<div class="row">
                  <span class="green-bullet"></span>
              </div>';
}


    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

