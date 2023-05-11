<h1>JOBS</h1>
<h2><?php echo $heading; ?></h2>
<?php 
foreach($listings as $listing){
    echo "<h2>" . $listing['title'] . "</h2>";
    echo "<p>" . $listing['description'] . "</p>";
};
?>
