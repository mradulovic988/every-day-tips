<?php 
$loop = new WP_Query (array(
	'post_type' => 'job_careers',
	'orderby' => 'post_id',
	'order' => 'ASC'
));

while ($loop -> have_posts()) : $loop -> the_post(); 

/* Variables from the Custom Post Types */
$job_descriptions = get_field ('job_descriptions');
$full_part_time = get_field ('full_part_time');
$location = get_field ('location');
$overview = get_field ('overview');
$role = get_field ('role');
$experience = get_field ('experience');
$skills = get_field ('skills');


?>

<div id="careers_accordion-container" class="container">
	<div class="row accordion">
		<p class="col-md-4 careers_accordion-name"><?php echo $job_descriptions; ?></p>
		<p class="col-md-4 careers_accordion-name"><?php echo $full_part_time; ?></p>
		<p class="col-md-4 careers_accordion-name"><?php echo $location; ?></p>
	</div>
	<div class="panel row">
		<div class="row">
			<div class="col-md-3">
				<p class="accordion careers_accordion-sub-name">OVERVIEW</p>
				<p class="panel careers_accordion-paragraph"><?php echo $overview; ?></p>
			</div>
			<div class="col-md-3">
				<p class="accordion careers_accordion-sub-name">ROLE</p>
				<p class="panel careers_accordion-paragraph"><?php echo $role; ?></p>
			</div>
			<div class="col-md-3">
				<p class="accordion careers_accordion-sub-name">EXPERIENCE</p>
				<p class="panel careers_accordion-paragraph"><?php echo $experience; ?></p>
			</div>
			<div class="col-md-3">
				<p class="accordion careers_accordion-sub-name">SKILLS</p>
				<p class="panel careers_accordion-paragraph"><?php echo $skills; ?></p>
			</div>
		</div>
			
	</div>

</div>
<?php endwhile; ?>
<?php wp_reset_query(); // Reset Query loop ?>



<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight){
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight = "100%";
		} 
	});
}
</script>