
<div class="comments">
    <h2 class="comments-title">
        <?php 
        $gabtoli_cn = get_comments_number();
        if(1==$gabtoli_cn){
            _e('1 Comment','gabtoli');
        }else{
        echo $gabtoli_cn." ". __('Comments','gabtoli');
        }
        ?>
    </h2>   
    <div class="comments-list">
        <?php
        wp_list_comments();
        ?>
        <div class="comments-pagination">
            <?php 
            the_comments_pagination(array(
                'screen_reader_text'=>      __('Pagination','gabtoli'),
                'prev_text'         =>'<'.  __('Previous Comments','gabtoli'),
                'next_text'         =>'>'.  __('Next Comments','gabtoli'),
            )); 
            ?>
        </div>
        <?php
        if(!comments_open()){
            _e('Comments are closed','gabtoli');
        }
    ?>
    </div> 
    <div class="comments-form">
        <?php
        comment_form();
        ?>
    </div>
</div>