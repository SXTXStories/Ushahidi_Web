<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     John Etherton <john@ethertontech.com>
 * @package    Enhanced Map, Ushahidi Plugin - https://github.com/jetherton/enhancedmap
 * @license	   GNU Lesser GPL (LGPL) Rights pursuant to Version 3, June 2007
 * @copyright  2012 Etherton Technologies Ltd. <http://ethertontech.com>
 * @Date	   2012-06-06
 * Purpose:	   View for the print map
 *             This file is adapted from the file Ushahidi_Web/themes/default/views/main.php
 *             Originally written by the Ushahidi Team
 * Inputs:     $div_status_filter - The HTML that creates the status(approved/unapproved) filter
 *             $div_boolean_filter  - The HTML that creates the boolean(AND/OR) filter
 *             $div_dotsize_selector - The HTML that creates the dot size selector
 *             $div_clustering_selector - The HTML that creates the clustering selector
 *             $div_category_filter - The HTML that creates the category filter
 *             $div_layers_filter - The HTML that creates the layers filter
 *             $div_shares_filter - The HTML that creates the shares filter
 *             $div_timeline - The HTML that creates the timeline
 *             $div_map - The HTML that creates the map
 *             $_GET["dev"] - Shows debug info
 * Outputs:    HTML
 *
 * The Enhanced Map, Ushahidi Plugin is free software: you can redistribute
 * it and/or modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * The Enhanced Map, Ushahidi Plugin is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with the Enhanced Map, Ushahidi Plugin.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 * Changelog:
 * 2012-06-06:  Etherton - Initial release
 *
 * Developed by Etherton Technologies Ltd.
 */
?>


<div id="title">
<h1><?php echo Kohana::lang('enhancedmap.map_printing'); ?></h1>
<div id="print_warning">
<h2><?php echo Kohana::lang('enhancedmap.read_before_printing'); ?></h2>
<?php echo Kohana::lang('enhancedmap.printmap_info'); ?>
</div>
<br/><br/>
</div>


<!-- keep track of what status we're looking at -->
		<form action="">
			<input type = "hidden" value="1" name="currentStatus" id="currentStatus">
			<input type = "hidden" value="2" name="colorCurrentStatus" id="colorCurrentStatus">
		</form>



		<div id="controls">	
		
	
		<INPUT style="width: auto; padding:6px; margin:6px; font-size:18px;" TYPE="BUTTON" VALUE="<?php echo Kohana::lang('enhancedmap.print_this_map'); ?>" ONCLICK="window.print()"/>
		   
			<?php echo $div_status_filter; ?>
				
			<?php echo $div_boolean_filter; ?>
						
			<?php echo $div_dotsize_selector; ?>

			<?php echo $div_clustering_selector;?>
		
			<?php echo $div_categories_filter; ?>
		
			<?php echo $div_layers_filter; ?>
		
			<?php echo $div_shares_filter; ?>
		
				
							
			
				
			

			
			
			
		

		
		
			<!-- Time chooser -->
			<strong><?php echo utf8::strtoupper(Kohana::lang('enhancedmap.time_chooser')); ?></strong>
			<?php								
			echo $div_timeline;
			
			?>
			<!-- /Time chooser -->
			
			
			
			<!-- Orientation chooser -->
			<strong><?php echo utf8::strtoupper(Kohana::lang('enhancedmap.orientation')); ?></strong>
			<div id="orientation" class="menuItem">
				<form>
					<input type="radio" id="orientation_portrait" name="orientation" value="portrait" checked onclick="this.blur();" onchange="changeOrientation('portrait'); return false;" /> <?php echo Kohana::lang('enhancedmap.portrait'); ?><br />
					<input type="radio" id="orientation_landscape" name="orientation" value="landscape"  onclick="this.blur();" onchange="changeOrientation('landscape'); return false;"/> <?php echo Kohana::lang('enhancedmap.landscape'); ?>
				</form>
			</div>
			<!-- /Orientation chooser -->
			
			
			<!-- Key Options -->
			<strong><?php echo utf8::strtoupper(Kohana::lang('enhancedmap.key_options')); ?></strong>
			<div id="keyoptions" class="menuItem">					
				<form>
					<?php echo Kohana::lang('enhancedmap.show_key'); ?> <input type="checkbox" id="showKeyCheckbox" value="showKeyCheckbox" checked onclick="this.blur();" onchange="showHideKey(); return false;" />
					<br/>
					<br/>
					<div id="keyPlacement"><?php echo Kohana::lang('enhancedmap.key_placement'); ?><br/>
						<input type="radio" name="keyLeftRight" value="left"  id="leftPlacement" onclick="this.blur();" onchange="changeLeftRight('left'); return false;" />  <?php echo Kohana::lang('enhancedmap.left'); ?>
						<input type="radio" name="keyLeftRight" value="right" id="rightPlacement"  onclick="this.blur();" checked  onchange="changeLeftRight('right'); return false;" /> <?php echo Kohana::lang('enhancedmap.right'); ?>
						<br/>
						<input type="radio" name="keyUpDown" value="up"  id="topPlacement" onclick="this.blur();" onchange="changeTopBottom('top'); return false;" /> <?php echo Kohana::lang('enhancedmap.up'); ?>
						<input type="radio" name="keyUpDown" value="down" id="bottomePlacement" onclick="this.blur();" checked onchange="changeTopBottom('bottom'); return false;" /> <?php echo Kohana::lang('enhancedmap.down'); ?>
					</div>
				</form>
			</div>
			<!-- /Key Options -->
			
			
			<!-- Set URL -->
			<strong><?php echo Kohana::lang('enhancedmap.share_map'); ?></strong>
			<div id="keyoptions" class="menuItem">					
				<form>
					<?php echo Kohana::lang('enhancedmap.generate_url'); ?>
					<input type="button" name="getURL" id="getURL" value="<?php echo Kohana::lang('enhancedmap.create_url'); ?>" onclick="setURL(); return false;"/>
					<br/>
					<br/>
					<?php echo Kohana::lang('enhancedmap.map_url'); ?> <br/><textarea id="urlText" rows="5" cols="33"></textarea><br/>
					<?php if (isset($_GET["dev"])): ?>					
					<?php echo Kohana::lang('enhancedmap.page_url'); ?>  <input type="text"; id="mapUrlText"/>
					<?php echo Kohana::lang('enhancedmap.embed_url'); ?>  <input type="text"; id="embedMapUrlText"/>
					<?php endif; ?>
				</form>
				
				<div id="socialSharing">
					
									
				</div>				
			</div>
			<!-- /Set URL -->
			
			<?php if (isset($_GET["dev"])): ?>
			<!-- Print to image -->
			<strong><?php echo Kohana::lang('enhancedmap.print_to_image'); ?></strong>
			<div id="keyoptions" class="menuItem">					
				<form>
					<?php echo Kohana::lang('enhancedmap.generate_image'); ?><br/>
					<input type="button" name="printImage" id="printImage" value="Print To Image" onclick="stitchImage(); return false;"/>
					<br/>
				</form>
			</div>
			<!-- /Print to imgage -->
			<?php endif; ?>
		</div>
		<!-- /controls -->
		
		

	<!--  Print Page -->
	<div id="printpage" class="portrait">

				<!-- The map -->
				<div class="map" id="map"></div>
				<div id="mapStatus">
					<div id="mapScale" style="border-right: solid 1px #999"></div>
					<div id="mapMousePosition" style="min-width: 135px;border-right: solid 1px #999;text-align: center"></div>
					<div id="mapProjection" style="border-right: solid 1px #999"></div>
					<div id="mapOutput"></div>
				</div>
				<!-- /The map -->
				
				
				<div id="key" class="right bottom">
				<h5><?php echo Kohana::lang('enhancedmap.map_key'); ?></h5>
				<?php echo Kohana::lang('enhancedmap.map_key_1', array('<span id="keyStartDate"></span>','<span id="keyEndDate"></span>')); ?><br/>
				<span id="keyLogic"> </span>
				<br/>
				<ul id="keyCategories">
					<li> <div class="swatch" style="background:#cc0000;"></div> <?php echo Kohana::lang('ui_main.all_categories'); ?></li>
				</ul>   
				
				</div>

	</div>
	<!--  /Print Page -->