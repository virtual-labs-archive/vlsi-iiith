Congrats !!

* You have successfully downloaded and extracted the
  ui.tgz .


* Changes: New Tabs have been added for 
	-    Target Audience
	-    Courses Aligned
	-    Pre-requisite Softwares 

You need to added 3 more sections on virtual lab home page

3) Target Audience
4) Courses Aligned
5) Pre-requisite Softwares

You can make the above said changes by editing content.html. To update the changes

1)  open content.html in your fav editor and search for last closing html tag </section>.
2) Open the change.html file and open it in your fav. editor.
3) Copy all content of change.html 
4) Paste it after the last closing html tag </section> (you searched in Step1).
5) Go to ui/src and run  " make theme=blue-icon"     on command terminal  to change theme to blue


We had attached change.html in folder.  You can copy the whole content and paste it in content.html .


Below is snapshot how content.html will look like
<!-- Second section of the article-->
<section id="lab-article-section-2">

<div id="lab-article-section-2-icon" class="icon">
  <!-- Enclose the icon image for the section. -->
  <img src="images/simulation.jpg" />
</div>


<!-- The heading for the section can be enclosed in a 
div tag and shown with a <h2> tag -->
<div id="lab-article-section-2-heading" class="heading">
  List of experiments
</div>
			
<!-- Write the section content inside a paragraph 
element, You can also include images with <img> tag -->
<div id="lab-article-section-2-content" class="content">
  <ul id="list-of-experiments">
  
    <li> 
      <!--Link and name of the experiment 1 -->
      <a href="exp1/index.html">Simple Pendulum Experiment</a> 
    </li>
  </ul>
</div>

</section>

// PASTE the CHANGE.html content here..


/*****************************************************************/









* Now run makefile by the following commands inside the 'ui/src' folder to
  change the default theme :

Go to Command Terminal
	 $ cd ui_extracted_folder // Where u have extracted the ui kit
	 $ cd ui/src
         $ make clean all 
	 $ make theme=blue-icon

* Now, open ui/build/index.html in the browser to test the template.

