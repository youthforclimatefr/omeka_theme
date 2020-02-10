<!--code to generate the simple search box.  -->
<?php echo $this->form('search-form', $options['form_attributes']); ?>
<?php echo print_r($filters); ?>
<?php 
	//check to see if we are on a collections browse page, if so, extract collection name so we 
	//can scope searches
	$collectionTitle = "";
	$collFacet = "";
	try{
		$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title'))); 
		$collFacet = str_replace(" ", "+", $collectionTitle);
	} catch (Exception $e) {
		//fail silently
	}

	if ($collectionTitle != "") {
		$label = "Search " . $collectionTitle . " collection:"; 
	} else {
		$label = "Search all digital collections:";
	}
?>


    <label for="query" style=""><?php echo $label;  ?></label>
    <?php echo $this->formText('query', $filters['query'], array('title' => __('Search'))); ?>
	<?php 
		if ($collFacet != "") {
			echo "<input type=\"hidden\" id=\"facet\" name=\"facet\" value=\"collection:'" . $collectionTitle . "'\"/>";
	}


	?>


 <?php echo $this->formButton('submit_search', $options['submit_value'], array('type' => 'submit')); ?>
	<?php //echo link_to_item_search(__('Advanced Search')); ?>
    <div id="advanced-form">




        <?php if (is_admin_theme()): ?>
            <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
        <?php endif; ?>

    </div>

        <?php echo $this->form('query_type', $filters['query_type']); ?>


</form>
