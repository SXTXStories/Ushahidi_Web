<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo $page_title.$site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" href="/themes/unicorn/images/logo_57.jpg" />
    <link rel="apple-touch-icon" sizes="/themes/unicorn/images/logo_72.jpg" />
    <link rel="apple-touch-icon" sizes="/themes/unicorn/images/logo_114.jpg" />

	<?php echo $header_block; ?>
		<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>
    <script type="text/javascript">
function dropdown() {
            var ele = document.getElementById("hide");
            if(ele.style.display == "block") {
                ele.style.display = "none";
            } else {
            ele.style.display = "block";
            }
            }
</script>

</head>


<?php
  // Add a class to the body tag according to the page URI
  // we're on the home page
  if (count($uri_segments) == 0)
  {
    $body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }

?>

<body id="page" class="<?php echo $body_class; ?>">

<?php echo $header_nav; ?>

  <!-- top bar-->
  <!-- <div id="top-bar">-->
    <!-- searchbox -->
		<!--<div id="searchbox">

			<!-- languages -->
			<!--<?php echo $languages;?>-->
			<!-- / languages -->

			<!-- searchform -->
			<!--<?php echo $search; ?>-->
			<!-- / searchform -->

	    <!--</div>
  </div> -->
  <!-- / searchbox -->


	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		<div id="header">

			<!-- logo -->
			<?php if ($banner == NULL): ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"> <img id="sxtxlogo" src="http://sxtxstories.com/themes/unicorn/images/sxtxstories.png" alt="sxtxstories logo" border="0"> <!--<?php echo $site_name; ?>--> </a></h1>
				<!--<span><?php echo $site_tagline; ?> </span>-->
			</div>
			<?php else: ?>
			<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php endif; ?>
			<!-- / logo -->


            <!-- submit incident -->
			<?php echo $submit_btn; ?>
			<!-- / submit incident -->


			<?php
				// Action::main_sidebar - Add Items to the Entry Page Sidebar
				Event::run('ushahidi_action.main_sidebar');
			?>

		</div>
		<!-- / header -->
         <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>

        <?php if(isset($site_message) AND $site_message != '') { ?>
			<div class="green-box">
				<h3><?php echo $site_message; ?></h3>
			</div>
		<?php } ?>

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<?php nav::main_tabs($this_page); ?>
					</ul>

				</div>
               <div id='mainmenumobile' width='100%' style=''>
  <a class="mobiledropmenu" href="#" onClick="dropdown()">menu</a>
<div id="hide" style="display:none">
            <a href="http://sxtxstories.com/">HOME</a><br>
            <a href="http://sxtxstories.com/page/index/1">ABOUT</a><br>
            <a href="http://sxtxstories.com/reports/submit">TELL A STORY</a><br>
            <a href="http://sxtxstories.com/reports">STORIES</a><br>
            <a href="http://sxtxstories.com/contact">CONTACT</a>
         </div>
     </div>

				<!-- / mainmenu -->
