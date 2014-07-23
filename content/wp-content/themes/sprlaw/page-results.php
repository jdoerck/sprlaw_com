<?php
/**
 * Template Name: Page - Results Map
 * Created by JetBrains PhpStorm.
 * User: jdoerck
 * Date: 8/13/13
 * Time: 3:33 PM
 */

get_header(); ?>


<script src="/content/wp-content/themes/sprlaw/js/map.js"></script>

<!-- production key -->
<script
    src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAADLhd1zxWRNlFK-rKdRy3UBRLhV3q5LcY4GIz_qfagAxi0e7YeBT7gCEk4mx8E7TjvaoTl7AwxC9Vbg"
    type="text/javascript"></script>

<div id="main" class="row">
    <div class="span3">

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="24">
                    <div align="center"><span class="style6">Map Legend &amp; Controls </span></div>
                </td>
            </tr>
            <tr>
                <td height="10">
                    <select name="select" size="1" id="select" onchange="changeRegion(this.value);">
                        <option selected="selected" value="1">All Regions</option>
                        <option value="2">NYC</option>
                        <option value="3">Long Island</option>
                        <option value="4">Upstate</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="107" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="20" valign="top" class="regular_text" style="padding-left:12px;"><img
                                    src="<?php echo bloginfo('template_directory'); ?>/_i/brownfieldsmarker.png"/></td>
                            <td class="regular_text"><input name="brownfieldsmarker" type="checkbox"
                                                            id="brownfieldsmarker" onclick="Markers(this)"
                                                            checked="checked"/></td>
                            <td class="regular_text style3" style="text-align:left">Brownfields</td>
                        </tr>
                        <tr>
                            <td height="20" valign="top" style="padding-left:12px;"><img
                                    src="<?php echo bloginfo('template_directory'); ?>/_i/developmentmarker.png"/></td>
                            <td class="regular_text"><input name="development" type="checkbox" id="developmentmarker"
                                                            onclick="Markers(this)" checked="checked"/></td>
                            <td height="20" colspan="2" class="regular_text style3" style="text-align:left">Development
                                &amp; Land Use
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="padding-left:12px;"><img
                                    src="<?php echo bloginfo('template_directory'); ?>/_i/municipalmarker.png"/></td>
                            <td class="regular_text"><input name="municipal" type="checkbox" id="municipalmarker"
                                                            onclick="Markers(this)" checked="checked"/></td>
                            <td height="37" colspan="2" class="regular_text style3" style="text-align:left">Municipal
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    </div>
    <section id="primary" class="span9"><a name="#primary"></a>

        <div id="content">
            <?php if (have_posts()) while (have_posts()) :
            the_post(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-content">
                <div id="clientMap"></div>

                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; ?>
</div>
</section>
</div>

<div class="content-page">
    <div class="container">
        <div id="main" class="row">
            <div class="span2"></div>
            <section id="primary" class="span10"><a name="#primary"></a>

                <div id="content">

sdsdsd
                </div>
            </section>
        </div>

        <div id="delimiter"></div>
    </div>
</div>

<?php get_footer(); ?>
