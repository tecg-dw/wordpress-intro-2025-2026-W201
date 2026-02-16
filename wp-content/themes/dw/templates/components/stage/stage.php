<?php
$stage_type = get_field('stage_type');
?>

<?php get_template_part('templates/components/stage/parts/stage', $stage_type); ?>
