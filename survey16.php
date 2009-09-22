<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" media="screen" type="text/css" href="screen.css"/>
    <link rel="icon" type="image/png" href="images/waveform.png"/>
    <link rel="shortcut" type="image/png" href="images/waveform.png"/>
    <title>Sonic Visualiser - User Survey</title>
    <style type="text/css">input#misc { display: none; width: 2px; }</style>
    <meta name="robots" content="noindex"/>
  </head>
  <body>
      <h1 id="header"><span>Sonic Visualiser</span></h1>

      <div id="nav">
      <ul>
      <li class="first"><a href="index.html">Home</a></li>
      <li><a href="features.html">Features</a></li>
      <li><a href="screenshots.html">Screenshots</a></li>
      <li><a href="download.html">Download</a></li>
      <li><a href="community.html">Community</a></li>
      <li><a href="documentation.html">Documentation</a></li>
      <li><a href="http://www.vamp-plugins.org/">Vamp Plugins</a></li>
      </ul></div>

      <h2 id="firstpara">Sonic Visualiser &mdash; A User Survey</h2>

      <p><table border=0 cellpadding=0 cellspacing=0><tr><td>Whether
      you are a regular or occasional user of <a href="http://sonicvisualiser.org/" target="_new">Sonic Visualiser</a>,
      experienced or a complete beginner, we'd love to know why you
      use it and what you think of it.<br><br>Please take just a few
      minutes to fill in and submit this survey form, and help us to
      improve Sonic Visualiser and other software we
      publish.<br><br>All of the questions are optional.<br><br><i><b>Thanks!</b></i></td><td>&nbsp;</td><td
      valign=top align=center><div style="border: 2px solid black;
      padding: 1em; padding-top: 0"><a
      href="http://www.elec.qmul.ac.uk/digitalmusic/"><img
      src="images/qm-logo.png" width="224" height="95" alt="Queen Mary
      logo" border=0/></a><br><small><nobr>Software and survey brought
      to you</nobr><br>by the Centre for Digital Music,<br>Queen Mary,
      University of London</small></div></td></tr></table>

      <br>
      <form action="survey16-submit.php" method="post">
      <ol>

      <input type="hidden" name="sv-version" value="<?php echo htmlentities($_GET['sv']); ?>">
      <input type="hidden" name="sv-plugs" value="<?php echo htmlentities($_GET['plugs']); ?>">
      <input type="hidden" name="sv-platform" value="<?php echo htmlentities($_GET['platform']); ?>">

      <input type="hidden" name="survey-version" value="1"/>

      <li>Which of the following best describes your position?<br>
      <input type="radio" name="iam" value="musicstudent"> A student, researcher, or academic in music<br>
      <input type="radio" name="iam" value="engstudent"> A student, researcher, or academic in audio engineering, audio analysis, multimedia, or a related discipline<br>
      <input type="radio" name="iam" value="employed"> I am employed in some field that is related to my use of Sonic Visualiser<br>
      <input type="radio" name="iam" value="personal"> I use Sonic Visualiser solely for personal purposes<br>
      <input type="radio" name="iam" value="none"> None of the above<br>
      </li>

      <br>
      <li>Do you enjoy using Sonic Visualiser?<br>
      <input type="radio" name="happy" value="happy"> Yes, I do!<br>
      <input type="radio" name="happy" value="soso"> I have no strong feelings about it<br>
      <input type="radio" name="happy" value="nochoice"> I don't enjoy using it, but I haven't found any other software to replace it<br>
      <input type="radio" name="happy" value="coerced"> I don't enjoy using it, I use it because I've been told to (by a teacher, for example)<br>
      </li>

      <br>

      <li>How easy do you find Sonic Visualiser to use?<br>
      <input type="radio" name="easy" value="quite"> I find it straightforward to use<br>
      <input type="radio" name="easy" value="learningcurve"> Getting started was tricky, but I'm OK with it now<br>
      <input type="radio" name="easy" value="pitfalls"> I can get things done, but it's frustrating and I'm often caught out by unexpected behaviour<br>
      <input type="radio" name="easy" value="bits"> I can use a few features, but I don't understand most of it<br>
      <input type="radio" name="easy" value="not"> I don't understand it at all<br>
      </li>

      <br>

      <li>Which of the following features of Sonic Visualiser have you used?  (Please select all that apply, or none.)<br>
      <input type="checkbox" name="feature-svfiles"> Saving and reloading complete sessions<br>
      <input type="checkbox" name="feature-vamp"> Running Vamp plugins<br>
      <input type="checkbox" name="feature-stretch"> Speeding up or slowing down playback<br>
      <input type="checkbox" name="feature-tapping"> Annotation by tapping using the computer keyboard<br>
      <input type="checkbox" name="feature-tappingmidi"> Annotation by tapping using a MIDI keyboard<br> 
      <input type="checkbox" name="feature-rdf"> Data import or export using RDF formats<br>
      <input type="checkbox" name="feature-alignment"> Audio alignment using the MATCH plugin<br>
      <input type="checkbox" name="feature-notesregions"> Editing note or region layers<br>
      <input type="checkbox" name="feature-images"> Image layers<br>
      </li>

      <br>

      <li>How did you first find out about Sonic Visualiser?<br>
      <input type="radio" value="search" name="hearabout"/> Through an Internet search<br>
      <input type="radio" value="website" name="hearabout"/> From an article or comment on a website<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&nbsp;<i>please give name or URL of site if possible:</i> <input type="text" name="hereabout-site" size="40"/><br>
      <input type="radio" value="teacher" name="hearabout"/> From a teacher, lecturer, or supervisor<br>
      <input type="radio" value="conference" name="hearabout"/> From a conference presentation<br>
      <input type="radio" value="wom" name="hearabout"/> From a friend or colleague<br>
      <input type="radio" value="other" name="hearabout"/> Other &ndash; please describe: <input type="text" name="hearabout-other" size="60"/><br>
      </li>

      <br>

      <li>How did you obtain Sonic Visualiser?<br>
      <input type="radio" name="obtain" value="website"/> From the Sonic Visualiser website<br>
      <input type="radio" name="obtain" value="friend"/> I copied it from a friend or colleague<br>
      <input type="radio" name="obtain" value="friend"/> It was provided by my educational institution<br>
      <input type="radio" name="obtain" value="distro"/> I installed it using a Linux distribution package manager<br>
      <input type="radio" name="obtain" value="other"/> Other &ndash; please describe: <input type="text" name="obtain-other" size="60"/><br>
      </li>

      <br>

      <li>Which (if any) of the following websites, all associated with the Centre for Digital Music, have you visited in the past?<br>
      <table border=0 width="90%">
      <tr>
      <td><input type="checkbox" name="www-isophonics">&nbsp;<a href="http://isophonics.net/" target="_new">isophonics.net</a></td>
      <td><input type="checkbox" name="www-omras2">&nbsp;<a href="http://omras2.org/" target="_new">omras2.org</a></td>
      <td><input type="checkbox" name="www-c4dmpresents">&nbsp;<a href="http://c4dmpresents.org/" target="_new">c4dmpresents.org</a></td>
      <td><input type="checkbox" name="www-vamp-plugins">&nbsp;<a href="http://vamp-plugins.org/" target="_new">vamp-plugins.org</a></td>
      <td><input type="checkbox" name="www-dbtune">&nbsp;<a href="http://dbtune.org/" target="_new">dbtune.org</a></td>
      </tr>
      </table>
      </li>
      
      <br>

      <li>Which of the following software or systems do you use regularly?<br>
      <table border=0 width="90%">
      <tr>
      <td><input type="checkbox" name="soft-audacity">&nbsp;Audacity</td>
      <td><input type="checkbox" name="soft-praat">&nbsp;Praat</td>
      <td><input type="checkbox" name="soft-wavesurfer">&nbsp;WaveSurfer</td>
      <td><input type="checkbox" name="soft-clam">&nbsp;CLAM Annotator</td>
      <td><input type="checkbox" name="soft-marsyas">&nbsp;MARSYAS</td>
      </tr><tr>
      <td><input type="checkbox" name="soft-jmusic">&nbsp;jMusic</td>
      <td><input type="checkbox" name="soft-echonest">&nbsp;EchoNest APIs</td>
      <td><input type="checkbox" name="soft-mbz">&nbsp;MusicBrainz</td>
      <td colspan=3><input type="checkbox" name="soft-tabulator">&nbsp;Tabulator and other RDF explorers</td>
      </tr>
      <tr>
      <td colspan=5>Others you think we might find interesting: <input type="text" name="soft-other" size="60"/></td>
      </tr>
      </table>
      </li>

      <br>

      <li>Which (if any) computer programming languages are you familiar with programming?
      <table border=0 width="90%">
      <tr>
      <td><input type="checkbox" name="prog-python">&nbsp;Python</td>
      <td><input type="checkbox" name="prog-c">&nbsp;C/C++</td>
      <td><input type="checkbox" name="prog-csharp">&nbsp;C#/.NET</td>
      <td><input type="checkbox" name="prog-matlab">&nbsp;MATLAB</td>
      <td><input type="checkbox" name="prog-java">&nbsp;Java</td>
      <td><input type="checkbox" name="prog-js">&nbsp;JavaScript</td>
      <td><input type="checkbox" name="prog-php">&nbsp;PHP</td>
      <td><input type="checkbox" name="prog-lisp">&nbsp;Lisp</td>
      </tr>
      <tr>
      <td colspan=8>Others &ndash; please specify: <input type="text" name="prog-langs-other" size="60"/></td>
      </table>
      </li>

      <br>

      <li>Have you ever considered writing <a href="http://vamp-plugins.org/" target="_new">Vamp plugins</a> for use in Sonic Visualiser or any other host application?<br>
      <input type="radio" name="vamp" value="yes"> Yes, I have written some plugins already<br>
      <input type="radio" name="vamp" value="interested"> Yes, I'm interested in the idea<br>
      <input type="radio" name="vamp" value="not-developer"> No, I wouldn't be technically capable<br>
      <input type="radio" name="vamp" value="not-interested"> No, I don't see any reason to<br>
      <input type="radio" name="vamp" value="vamp-sux"> No, I've looked at Vamp and found the format unsatisfactory in some way<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&nbsp;<i>if so, unsatisfactory in what way?</i> <input type="text" name="sux-why" size="50"/><br>
      </li>
      
      <br>

      <li>Are there any existing features in Sonic Visualiser that you would particularly like to see tutorials or other documentation for?<br> <textarea id="tutorials" name="tutorials" rows="8" cols="70"></textarea></li>

      <br>

      <li>Are there any new features that you would really like to see added to Sonic Visualiser?<br> <textarea id="newfeatures" name="newfeatures" rows="8"
      cols="70"></textarea></li>

      <br>

      <li>Is there anything else you'd like us to know about your
      experiences with Sonic Visualiser, or how it might be improved?
      Please, tell us here:<br> <textarea id="message" name="message" rows="8"
      cols="70"></textarea></li>

      <input type="text" id="misc" name=""/>

      </ol>

      <p><small><b>Note:</b> The purpose of this survey is to learn
      more about users' opinions of Sonic Visualiser, a free, open
      source software application, so that its developers can make
      better-informed decisions about their future plans for it.
      There is no commercial purpose to the survey.  Survey results
      will be stored and may be collated by IP address, but no other
      personally identifying information will be retained.  The survey
      does not contain any information that could be used to contact
      you.  Survey results may be published in aggregate; individual
      records will not be published.  In submitting the survey you
      indicate your acceptance of these terms.</small></p>

      <button type="submit">Submit My Survey!</button>
      </form>

  </body>
</html>
