<div class="my_meta_control">

	<?php while($mb->have_fields_and_multi('images')): ?>
	<?php $mb->the_group_open(); ?>
 

 	<ul>
	
		 
		<?php $mb->the_field('small');  ?>
        <?php if ($mb->get_the_value()) { ?>
        <li class="thumbnail">
        	<img src="<?php $mb->the_value(); ?>" />
        </li>
        <?php } ?>
        <li>
        <?php $myMetaBoxNumber = $mb->get_the_index();
		$myspecialClass = '_image_small'.$myMetaBoxNumber; ?>
		<label>Upload Thubnail Image:</label>
		<input type="text" class="<?php echo $myspecialClass; ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="60"/>
         <input type="button" name="gmm_upload_button" id="<?php echo $myspecialClass; ?>" value="browse for file" class="gmm_upload_button_small" /></li>

        </li>
		<li>
		<?php 
		$mb->the_field('full_size'); 
		//$myMetaBoxNumber2 = $mb->get_the_index();
		$myspecialClass2 = '_image_full_size'.$myMetaBoxNumber; ?>
		<label>Upload Full Size Image:</label>
		<input type="text" class="<?php echo $myspecialClass2; ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="60"/>
         <input type="button" name="gmm_upload_button" id="<?php echo $myspecialClass2; ?>" value="browse for file" class="gmm_upload_button_full_size" /></li>
        
    </ul>

<div class="entry_item_buttons"><a href="#" class="dodelete button">Remove This Portfolio Item</a></div>



	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

<a href="#" class="docopy-images button">Add Another Portfolio Image</a>

 
 
 
 
</div>

<script type="text/javascript">
	//<![CDATA[
		jQuery (function ($)
			{
					$('#wpa_loop-images').sortable();
			});
			//]] >
</script>