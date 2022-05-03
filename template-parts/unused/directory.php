<?php $directoryImage = get_field('directory_image', 'options');
$linkImage = get_field('link_icon', 'options');
$fileLink = get_field('file_link', 'options');
?>

<div id="directory" class="slide-up section directory mt5" style="background-image: url(<?php echo $directoryImage;?>">
    <a href="<?php echo $fileLink['url'];?>" target="_blank">
        <h2 class="heading-secondary light-text"><?php the_field('directory_title','options');?></h2>
        <p class="light-text"><?php the_field('directory_desc','options');?></p>
    
    
        
            <img src="<?php echo $linkImage['url']; ?>" alt="<?php echo $linkImage['alt'] ?>" />
        
        <!--<p class="light-text file-type"><?php echo $fileLink['type'];?></p>-->
        <p class="light-text sub-text">(Opens in a new window)</p>
    </a>
</div>
