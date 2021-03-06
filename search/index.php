<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<h2><?php echo $pageTitle; ?></h2>

<?php echo search_filters(); ?>
<?php if ($total_results): ?>
<?php echo pagination_links(); ?>

<div class="cms-clear"></div>
<div id="search-results" class="row">

<?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
<?php foreach (loop('search_texts') as $searchText): ?>
<?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
<?php $recordType = $searchText['record_type']; ?>
<?php set_current_record($recordType, $record); ?>
        <div class="span4 <?php echo strtolower($filter->filter($recordType)); ?>">

    <?php  if (strtolower($filter->filter($recordType)) == "file") {$isFile = true; $parentItem = $record->getItem();} else {$isFile = false;}?>
     <?php 
        if ($isFile) {
            if (metadata($parentItem, array('Dublin Core', 'Title'))) { 
                $altText = 'Go to a file from' . metadata($parentItem, array('Dublin Core', 'Title'));
            } else {
                $altText = 'Go to this item';
            }
        } else {
            if (metadata($record, array('Dublin Core', 'Title'))) { 
                    $altText = 'Go to ' . metadata($record, array('Dublin Core', 'Title'));
                } else {
                    $altText = 'Go to this item';
                }
        }
   	?>

		<?php if ($recordImage = record_image($recordType, 'square_thumbnail', array('alt' => $altText))): ?>
                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
            <?php endif; ?>
            <a href="<?php echo record_url($record, 'show'); ?>">
            <?php 
            if ($isFile) {
                echo "<H3>File from: " . metadata($parentItem, array('Dublin Core', 'Title'), array('no_escape' => true, 'no_filter' => true)) . "</h3>";
            } else {
                echo $searchText['title'] ? '<H3>' . $searchText['title']. '</h3>' : '<h3>[Unknown]</h3>';
            }
            ?>
                </a><br />
            <?php if ($isFile) {
                $description = metadata($parentItem, array('Dublin Core', 'Description'), array('snippet'=>250));
            } else {
                $description = metadata($record, array('Dublin Core', 'Description'), array('snippet'=>250));
            }
            ?>
    <div class="item-description">
        <?php echo $description; ?>
    </div>
    

   <?php if (metadata($record, 'has tags')): ?>
    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
        <?php echo tag_string('items'); ?></p>
    </div>
    <?php endif; ?>


        </div>
        <?php endforeach; ?>
   </div>
   <div class="cms-clear">
<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your search returned no results.');?></p>
</div>
<?php endif; ?>
<script>
jQuery(document).ready(function() {

jQuery('#search-results').find('div.file').each(function() {
    var searchTitle = jQuery(this).find('a:nth-child(2)').text();
    if(searchTitle.indexOf('http') >= 0) {
        // Parse the URL
        var linkParts = searchTitle.split('/');

        // Replace the string
        jQuery(this).find('a:nth-child(2)').text(linkParts[linkParts.length-1].slice(9));
    }
});

});
</script>
<?php echo foot(); ?>
