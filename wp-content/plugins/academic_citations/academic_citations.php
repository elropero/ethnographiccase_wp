<?php
/*
Plugin Name: Academic Citations
Plugin URI: http://www.academicsandbox.com/academic_citations.html
Description: This plugin generates academic citations in five common formats, per post. Based on concept from <a href="http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/">WRT</a>.
Version: 0.3.3
Author: Julie Meloni
Author URI: http://www.academicsandbox.com/
Concept/Design: Jeremy Douglass
Contributor: Christy Dena

Release Date: Mar 30 2006
*/

/*  Copyright 2006 Julie Meloni <jcmeloni@gmail.com> and Jeremy Douglass

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


							

function outputCitations() {

	global $authordata, $id;

	/***********************************************/
	/* get clean names for variables */
	$ac_blogname = get_settings('blogname');
	$i = new CoAuthorsIterator();
	while($i->iterate()){
		$ac_author_lastnames[] = $authordata->last_name;
		$ac_author_firstinits[] = substr($authordata->first_name,0,1);
		$ac_author_firstnames[] = $authordata->first_name;
//		$ac_author_lastname = $authordata->last_name;
//		$ac_author_firstinit = substr($authordata->first_name,0,1);
//		$ac_author_firstname = $authordata->first_name;
	}
	$ac_post_title = get_the_title();
	$ac_post_permalink = apply_filters('the_permalink', get_permalink());
	$ac_post_dateY = apply_filters('the_time', get_the_time('Y'), 'Y');
	$ac_post_datejfY = apply_filters('the_time', get_the_time('j M. Y'), 'j M. Y');
	$ac_access_dateFjY = date('F j, Y');
	$ac_access_datejfY = date('j M. Y');
	/***********************************************/
	/* BEGIN FORMATS */
	/***********************************************/
	/* AMA citation

	For: medicine, health, and biological sciences
	Edition: American Medical Association Manual of Style, 9th edition
	Type: Journal Article on the Internet
	Source: http://www.liu.edu/cwis/cwp/library/workshop/citama.htm
	Example: Douglass J. Citation Footers for Academic Blogging. WRT: Writer Response Theory. 2006. Available at: http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/. Accessed March
	19, 2006.
	Example2: Cousins T, Reynolds L. Transcriptions – In the Journals – May 2012. Somatosphere. 2012. Available at: http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html. Accessed May 24, 2012.
	Example3: Cousins T, Reynolds L, Raikhel E. Transcriptions – In the Journals – May 2012. Somatosphere. 2012. Available at: http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html. Accessed May 24, 2012.
	*/
$n=0;
while ($n <= (count($ac_author_lastnames)-1)) {
	if ($n === 0) {
		$ama_block = $ac_author_lastnames[$n]." ".$ac_author_firstinits[$n];
	} elseif ($n === (count($ac_author_lastnames)-1)) {
		$ama_block .= ", ".$ac_author_lastnames[$n]." ".$ac_author_firstinits[$n];
	} else {
		$ama_block .= ", ".$ac_author_lastnames[$n]." ".$ac_author_firstinits[$n];
	}
	$n++;
} 



	// $ama_block = $ac_author_lastname." ".$ac_author_firstinit;
	
	$ama_block .= ". ".$ac_post_title.". <span style='font-style: italic'>".$ac_blogname."</span>. ".$ac_post_dateY.". Available at: ".$ac_post_permalink.". Accessed ".$ac_access_dateFjY.".";

	/***********************************************/
	/* APA citation

	For: psychology, education, and other social sciences
	Edition: Publication Manual of the American Psychological
	Association, 5th edition
	Type: Website
	Source: http://www.liu.edu/cwis/cwp/library/workshop/citapa.htm
	Example: Douglass, J. (2006). Citation Footers for Academic Blogging. Retrieved March 14, 2006, from WRT: Writer Response Theory Web site: http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/
	Example2: Cousins, Thomas, & Reynolds, Lindsey. (2012). Transcriptions – In the Journals – May 2012. Retrieved May 24, 2012, from Somatosphere Web site: http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html
	Example3: Cousins, Thomas, Reynolds, Lindsey, & Raikhel, Eugene. (2012). Transcriptions – In the Journals – May 2012. Retrieved May 24, 2012, from Somatosphere Web site: http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html
	*/
$n=0;
while ($n <= (count($ac_author_lastnames)-1)) {
	if ($n === 0) {
		$apa_block = $ac_author_lastnames[$n].", ".$ac_author_firstnames[$n];
	} elseif ($n === (count($ac_author_lastnames)-1)) {
		$apa_block .= " &amp; ".$ac_author_lastnames[$n].", ".$ac_author_firstnames[$n];
	} else {
		$apa_block .= ", ".$ac_author_lastnames[$n].", ".$ac_author_firstnames[$n];
	}
	$n++;
} 

	$apa_block .= ". (".$ac_post_dateY."). <span style='font-style: italic'>".$ac_post_title."</span>. Retrieved ".$ac_access_dateFjY.", from ".$ac_blogname." Web site: ".$ac_post_permalink;

	/***********************************************/
	/* Chicago citation

	For: books, magazines, newspapers, and other non-scholarly publications
	Edition: The Chicago Manual of Style, 15th edition
	Type: Website (section 17.237)
	Source: http://www.liu.edu/cwis/cwp/library/workshop/citchi.htm
	Example: Douglass, Jeremy. 2006. Citation Footers for Academic Blogging. WRT: Writer Response Theory. http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/. (accessed March 19, 2006).
	Example2: Cousins, Thomas and Lindsey Reynolds. 2012. Transcriptions – In the Journals – May 2012. Somatosphere. http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html (accessed May 24, 2012).
	Example3: Cousins, Thomas, Lindsey Reynolds and Eugene Raikhel. 2012. Transcriptions – In the Journals – May 2012. Somatosphere. http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html (accessed May 24, 2012).
	*/
$n=0;
while ($n <= (count($ac_author_lastnames)-1)) {
	if ($n === 0) {
		$chicago_block = $ac_author_lastnames[$n].", ".$ac_author_firstnames[$n];
	} elseif ($n === (count($ac_author_lastnames)-1)) {
		$chicago_block .= " and ".$ac_author_firstnames[$n]." ".$ac_author_lastnames[$n];
	} else {
		$chicago_block .= ", ".$ac_author_firstnames[$n]." ".$ac_author_lastnames[$n];
	}
	$n++;
} 

	$chicago_block .= ". ".$ac_post_dateY.". ".$ac_post_title.". ".$ac_blogname.". ".$ac_post_permalink." (accessed ".$ac_access_dateFjY.").";

	/***********************************************/
	/* 	Harvard citation
	For: publishers, various academic institutions
	Edition: Style manual for authors, editors and printers, 6th edition
	Type: Website
	Source: http://www.lib.monash.edu.au/tutorials/citing/harvard-websites.html
	Example: Douglass, J 2006, Citation Footers for Academic Blogging, WRT: Writer Response Theory. Retrieved March 19, 2006, from <http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/>
	Example2: Cousins, T & Reynolds, L 2012, Transcriptions – In the Journals – May 2012, Somatosphere. Retrieved May 24, 2012, from <http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html>
	Example3: Cousins, T, Reynolds, L & Raikhel, E 2012, Transcriptions – In the Journals – May 2012, Somatosphere. Retrieved May 24, 2012, from <http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html>
	*/
$n=0;
while ($n <= (count($ac_author_lastnames)-1)) {
	if ($n === 0) {
		$harvard_block = $ac_author_lastnames[$n].", ".$ac_author_firstinits[$n];
	} elseif ($n === (count($ac_author_lastnames)-1)) {
		$harvard_block .= " &amp; ".$ac_author_lastnames[$n].", ".$ac_author_firstinits[$n];
	} else {
		$harvard_block .= ", ".$ac_author_lastnames[$n].", ".$ac_author_firstinits[$n];
	}
	$n++;
} 

	$harvard_block .= " ".$ac_post_dateY.", <span style='font-style: italic'>".$ac_post_title."</span>, ".$ac_blogname.". Retrieved ".$ac_access_dateFjY.", from &lt;".$ac_post_permalink."&gt;";

	/***********************************************/
	/* MLA citation

	For: literature, arts, and humanities
	Edition: MLA Handbook for Writers of Research Papers, 6th edition
	Source: http://www.liu.edu/cwis/cwp/library/workshop/citmla.htm
	Example: Douglass, Jeremy. "Citation Footers for Academic Blogging." 17 Mar. 2006. WRT: Writer Response Theory. Accessed 19 Mar. 2006. <http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/>
	Example2: Cousins, Thomas and Lindsey Reynolds. "Transcriptions – In the Journals – May 2012." 23 May. 2012. Somatosphere. Accessed 24 May. 2012. <http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html>
	Example3: Cousins, Thomas, Lindsey Reynolds and Eugene Raikhel. "Transcriptions – In the Journals – May 2012." 23 May. 2012. Somatosphere. Accessed 24 May. 2012. <http://somatosphere.net/2012/05/transcriptions-in-the-journals-may-2012.html>
	*/
$n=0;
while ($n <= (count($ac_author_lastnames)-1)) {
	if ($n === 0) {
		$mla_block = $ac_author_lastnames[$n].", ".$ac_author_firstnames[$n];
	} elseif ($n === (count($ac_author_lastnames)-1)) {
		$mla_block .= " and ".$ac_author_firstnames[$n]." ".$ac_author_lastnames[$n];
	} else {
		$mla_block .= ", ".$ac_author_firstnames[$n]." ".$ac_author_lastnames[$n];
	}
	$n++;
} 

	$mla_block .= ". \"".$ac_post_title.".\" ".$ac_post_datejfY.". <span style='text-decoration: underline'>".$ac_blogname."</span>. Accessed ".$ac_access_datejfY.". &lt;".$ac_post_permalink."&gt;";

	/***********************************************/
	/* OUTPUT TO TEMPLATE */

	$v_thisPostID = "v_".$id;
	$h_thisPostID = "h_".$id;
	$thisCitationBoxID = "cb_".$id;
	
	// changed echo to return to be able to include the citations in the pdf generation
	
	return "
	<!-- START ACADEMIC CITATIONS OUTPUT -->
	<div id=\"".$v_thisPostID."\" class=\"view_citations_link\" style=\"display:inline;cursor:pointer;\"
	onclick=\"this.style.display='none';document.getElementById('".$h_thisPostID."').style.display='inline';
	document.getElementById('".$thisCitationBoxID."').style.display='block';\">[view academic citations]<br/></div>

	<div id=\"".$h_thisPostID."\" class=\"hide_citations_link\" style=\"display:none;cursor:pointer;\"
	onclick=\"this.style.display='none';document.getElementById('".$v_thisPostID."').style.display='inline';
	document.getElementById('".$thisCitationBoxID."').style.display='none';\">[hide academic citations]<br/></div>

	<div id='".$thisCitationBoxID."' class='citation_box' style='display: none'>

		<span class='citation_hdrtxt'>AMA citation:</span>
		<div class='citation_entry'><span class='citation_txt'>".$ama_block."</span></div><br/>

		<span class='citation_hdrtxt'>APA citation:</span>
		<div class='citation_entry'><span class='citation_txt'>".$apa_block."</span></div><br/>

		<span class='citation_hdrtxt'>Chicago citation:</span>
		<div class='citation_entry'><span class='citation_txt'>".$chicago_block."</span></div><br/>

		<span class='citation_hdrtxt'>Harvard citation:</span>
		<div class='citation_entry'><span class='citation_txt'>".$harvard_block."</span></div><br/>

		<span class='citation_hdrtxt'>MLA citation:</span>
		<div class='citation_entry'><span class='citation_txt'>".$mla_block."</span></div><br/>

	</div>
	<br/>
	<!-- END ACADEMIC CITATIONS OUTPUT -->";

	unset($v_thisPostID);
	unset($h_thisPostID);
	unset($thisCitationBoxID);
}
?>