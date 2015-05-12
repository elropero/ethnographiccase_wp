=== ACADEMIC CITATIONS ===
Tags: posts
Author: Julie Meloni <jcmeloni@gmail.com>
Concept/Design: Jeremy Douglass
Contributor: Christy Dena

Description: This plugin generates academic citations in five common formats, per post. Based on concept from <http://wrt.ucr.edu/wordpress/2006/03/17/citation-footers-for-academic-blogging/>.

Release Version: 0.3.3
Release Date   : Mar 30 2006
=====================================================

== Installation ==

1. Upload to your plugins folder, usually "wp-content/plugins/"
2. Activate the plugin in your WordPress admininstration plugin menu
3. Modify template(s)
4. Modify stylesheet

=====================================================

== Output of the Function ==

For your reference, the output of the outputCitations() function produces the following HTML:

<!-- START ACADEMIC CITATIONS OUTPUT --> 
<div id="v_[postID]" style="display:inline;cursor:pointer;"
onclick="this.style.display='none';document.getElementById('h_[postID]').style.display='inline';
document.getElementById('cb_[postID]').style.display='block';">[view academic citations]<br/></div>

<div id="h_[postID]" style="display:none;cursor:pointer;"
onclick="this.style.display='none';document.getElementById('v_[postID]').style.display='inline';
document.getElementById('cb_[postID]').style.display='none';">[hide academic citations]<br/></div>

<div id='cb_[postID]' class='citation_box' style='display: none'>

	<span class='citation_hdrtxt'>AMA citation:</span><br/>
	<div class='citation_entry'><span class='citation_txt'>[AMA citation]</span></div>

	<span class='citation_hdrtxt'>APA citation:</span><br/>
	<div class='citation_entry'><span class='citation_txt'>[APA citation]</span></div>
	
	<span class='citation_hdrtxt'>Chicago citation:</span><br/>
	<div class='citation_entry'><span class='citation_txt'>[Chicago citation]</span></div>

	<span class='citation_hdrtxt'>Harvard citation:</span><br/>
	<div class='citation_entry'><span class='citation_txt'>[Harvard citation]</span></div>

	<span class='citation_hdrtxt'>MLA citation:</span><br/>
	<div class='citation_entry'><span class='citation_txt'>[MLA citation]</span></div>

</div>
<br/>
<!-- END ACADEMIC CITATIONS OUTPUT --> 
	
=====================================================

== Modifications - In Template(s) ==

The following snippet must be pasted in your template file(s), wherever you want the citation text to appear:

<?php outputCitations(); ?>

This snippet can go in: Main Index Template (index.php), Archive (archive.php), Single Post (single.php)

To edit your template(s), use the WordPress Admin interface by navigating to Presentation -> Theme Editor and selecting the template from the list.  Save your changes after pasting the appropriate text into your template(s), and be sure to modify your stylesheet entries (see next set of instructions in this readme.txt).

NOTE: To make changes to template files, you may also download files via FTP client, make changes in a text editor, and send the pages back up to your server.

=====================================================

== Modifications - In Stylesheet ==

Several styles are used to customize the appearance of the output. Add the following styles to your stylesheet using the WordPress Admin page: navigate to Presentation -> Theme Editor and select Stylesheet (style.css) from the list. Copy and paste the following styles into this file, then save the file.  As with all things related to styles, you should look at it immediately on your site and then tweak the styles until you find something you like, through trial and error.

If you copy and paste the following and make no modifications, the output will look like the image on this page:
http://www.academicsandbox.com/academic_citations.html (click the image to enlarge).  

div.view_citations_link { 
	color: #06C;
	font-size: 9px; 
	font-weight: normal;
}

div.hide_citations_link {
	color: #06C;
	font-size: 9px; 
	font-weight: normal;
}

div.citation_box {             
	padding: 6px;
	border: 1px solid #000; 
	background-color: #EEE;
}

div.citation_entry {            
	margin-left: 2em;
	text-indent: -2em;
	padding: 0px 0px 6px 0px;
}

.citation_hdrtxt {              
	font-size: 9px; 
	font-weight: bold;
}

.citation_txt {
	font-size: 9px; 
	font-weight: normal;		
}


However, if you want to customize the display, the following explains each entry in more detail.  The div.citation_entry class is the only one that includes "required" styles, as it sets up the hanging indent and space between entries.  Anywhere "* add custom styles */" appears, use your own styles. 

div.view_citations_link {         /* Contains the [view academic citations] text */
	/* add custom styles */
}

div.hide_citations_link {         /* Contains the [hide academic citations] text */
	/* add custom styles */
}

div.citation_box {                /* Box containing all citations */
	/* add custom styles */
}

div.citation_entry {              /* Each citation has a hanging indent and space between lines */   
	margin-left: 2em;
	text-indent: -2em;
	padding: 0px 0px 6px 0px;
	/* add custom styles */
}

.citation_hdrtxt {                /* The header text, e.g. AMA Citation, APA Citation, etc. */   
	/* add custom styles */
}

.citation_txt {                   /* The citation text. */   
	/* add custom styles */		
}

=====================================================

== Plugin Roadmap ==

previous:
v0.3 // Mar 27 2006
- A plugin that dumps the five common citation formats into the footer of every post.

v0.3.1  // Mar 27 2006
- [bugfix] Fix "retrieved date" in some citations.

v0.3.2  // Mar 29 2006
- [bugfix]  Fix Harvard citation format.
- [enhance] Modify display to include toggle on/off visibility.
- [enhance] Modify readme.txt to include more detailed instructions for user.

current:
v0.3.3  // Mar 30 2006
- [enhance] Allow use in index.php and archive.php templates.

upcoming:
v0.4 
- Content-checking for required citation fields; how to handle when data not present?

v0.5 
- Add support for two formats as exportable files (BibTeX, EndNote)

v0.6 
- Add support for comment citations

v1.0 
- User selection mechanism to turn on/off any of the citation formats.
- User selection mechanism to turn on/off comment citation.

maybe in future:
v2.0
- Adding formats files - like a plugin subdirectory

v3.0
- Use admin menu to create your own citation format(s)


