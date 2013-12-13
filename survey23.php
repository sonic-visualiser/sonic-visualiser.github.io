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
      you are a regular or occasional user
      of <a href="http://sonicvisualiser.org/" target="_new">Sonic
      Visualiser</a>, experienced or a complete beginner, we'd love to
      know why you use it, what you use it for, and what you think of
      it.<br><br>Please take just a few minutes to fill in and submit
      this survey form, and help us to improve Sonic Visualiser and
      other software we publish.<br><br>All of the questions are
      optional.<br><br><i><b>Thanks!</b></i></td><td>&nbsp;</td><td valign=top
      align=center><div style="border: 2px solid black; padding: 1em;
      padding-top:
      0"><a href="http://www.elec.qmul.ac.uk/digitalmusic/"><img src="images/qm-logo.png"
      width="224" height="95" alt="Queen Mary logo"
      border=0/></a><br><small><nobr>Software and survey brought to
      you</nobr><br>by the Centre for Digital Music,<br>Queen Mary,
      University of London</small></div></td></tr></table>

      <br>
      <form action="survey23-submit.php" method="post">
      <ol>

      <input type="hidden" name="sv-version" value="<?php echo htmlentities($_GET['sv']); ?>">
      <input type="hidden" name="sv-plugs" value="<?php echo htmlentities($_GET['plugs']); ?>">
      <input type="hidden" name="sv-platform" value="<?php echo htmlentities($_GET['platform']); ?>">

      <input type="hidden" name="survey-version" value="2"/>

      <li>In what capacity do you make use of Sonic Visualiser?<br>
      <input type="radio" name="iam" value="student"> As an undergraduate student<br>
      <input type="radio" name="iam" value="researcher"> As a research student<br>
      <input type="radio" name="iam" value="academic"> As an academic<br>
      <input type="radio" name="iam" value="professional"> For professional work <br>
      <input type="radio" name="iam" value="personal"> For personal use only <br>
      <input type="radio" name="iam" value="other"> Other &ndash; please describe: <input type="text" name="iam-other" size="60"/><br>
      </li>

      <br>

      <li>Which of the following most closely describes the field in which you use Sonic Visualiser?<br>
      <input type="radio" name="background" value="dspeng"> Audio engineering or signal processing<br>
      <input type="radio" name="background" value="speech"> Speech processing<br>
      <input type="radio" name="background" value="music"> Music composition or production<br>
      <input type="radio" name="background" value="musicology"> Musicology or music analysis<br>
      <input type="radio" name="background" value="software"> Audio or music-related software development<br>
      <input type="radio" name="background" value="other"> Other &ndash; please describe: <input type="text" name="background-other" size="60"/><br>
      </li>

      <br>

      <li>Why are you using Sonic Visualiser?<br>
      <input type="radio" name="why" value="course"> It is required
      for a course I am taking<br>
      <input type="radio" name="why" value="music"> It is relevant
      to my work in studying music performance, practice, or
      history<br>
      <input type="radio" name="why" value="audio"> It is
      relevant to my audio research or professional work<br>
      <input type="radio" name="why" value="curious"> To satisfy
      general curiosity about audio recordings<br>
      <input type="radio" name="why" value="other"> Other &ndash; please describe: <input type="text" name="why-other" size="60"/><br>
      </li>
      
      <br>
      <li>How enjoyable do you find Sonic Visualiser to use?<br>
      <input type="radio" name="happy" value="4"> Very enjoyable<br>
      <input type="radio" name="happy" value="3"> Moderately enjoyable<br>
      <input type="radio" name="happy" value="2"> Not very enjoyable<br>
      <input type="radio" name="happy" value="1"> Not at all enjoyable<br>
      </li>

      <br>

      <li>How easy do you find Sonic Visualiser to use?<br>
      <input type="radio" name="easy" value="4"> Very easy<br>
      <input type="radio" name="easy" value="3"> Reasonably easy<br>
      <input type="radio" name="easy" value="2"> Not very easy<br>
      <input type="radio" name="easy" value="1"> Not at all easy<br>
      </li>

      <br>

      <li>Which of the following features of Sonic Visualiser do you consider <i>most</i> important for your own work?<br>
      <input type="radio" name="important" value="spectrogram"> The built-in spectrogram visualisations<br>
      <input type="radio" name="important" value="plugins"> The ability to run Vamp audio feature extraction plugins<br>
      <input type="radio" name="important" value="annotation"> The ability to create and edit annotations of recordings by "tapping" or manual editing<br>
      <input type="radio" name="important" value="playback"> The facilities for navigating through a recording and playing back at different speeds<br>
      <input type="radio" name="important" value="session"> The ability to save a complete session file that other people can reload<br>
      <input type="radio" name="important" value="multiple"> The ability to load multiple recordings at once<br>
      </li>

      <br>

      <li>Which of the following would you be <i>most</i> likely to
      use, if all of them were available as alternatives to Sonic Visualiser?<br>

	<input type="radio" name="alternative" value="simple"> A simpler program, without editing or annotation facilities, that made it easy to see the most common visualisations<br>
	<input type="radio" name="alternative" value="pitchedit"> A program that focused more on editing and synthesis of pitch tracks and note annotations<br>
	<input type="radio" name="alternative" value="detail"> A program designed for very detailed inspection, such as sub-sample audio reconstruction<br>
	<input type="radio" name="alternative" value="align"> A program designed to be most useful for visualisation of many related audio files at once<br>
	<input type="radio" name="alternative" value="none"> None of the above<br>
	</li>

      <br>

      <li>Is there anything about Sonic Visualiser that you find particularly annoying or incomprehensible?<br> <textarea id="annoyance" name="annoyance"
      rows="8" cols="70"></textarea></li>

      <br>

      <li>Is there anything else you'd like us to know about your
      experiences with Sonic Visualiser?<br> <textarea id="message" name="message" rows="8"
      cols="70"></textarea></li>

      <br>

      <li>If you wish, please help us continue to develop Sonic
      Visualiser by leaving contact details such as your name and
      email address below.<br>We may use this to ask you about how to
      you have used Sonic Visualiser. We will not pass your details on
      to any other organization.<br>(Being able to demonstrate a wide
      range of uses will help us to show our funders that Sonic
      Visualiser is relevant and useful, and will help us to continue
      to fund future development.)
	<br>
	<textarea id="contact" name="contact" rows="8" cols="70"></textarea>
      </li>

      <input type="text" id="misc" name=""/>

      </ol>

      <p><small><b>The small print:</b> The purpose of this survey is
      to learn more about users' opinions of Sonic Visualiser, a free,
      open source software application, so that its developers can
      make better-informed decisions about their future plans for it.
      There is no commercial purpose to the survey.  Results will be
      stored and may be collated by IP address. Apart from any contact
      details you have explicitly provided, the survey contains no
      information that could be used to contact you and no other
      personally identifying data will be retained.  Results may be
      published in aggregate; individual records will not be
      published.  In submitting the survey you indicate your
      acceptance of these terms.</small></p>

      <button type="submit">Submit My Survey!</button>
      </form>

  </body>
</html>
