<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" media="screen" type="text/css" href="screen.css"/>
    <link rel="icon" type="image/png" sizes="16x16" href="images/waveform.png"/>
    <link rel="icon" type="image/svg" href="images/sv-icon.svg"/>
    <title>Sonic Visualiser - Feedback</title>
    <style type="text/css">input#misc { display: none; width: 2px; }</style>
    <meta name="robots" content="noindex"/>
  </head>
  <body>
      <h1 id="header"><span>Sonic Visualiser</span></h1>

      <div id="nav">
      <ul>
        <li class="first"><a href="news/index.html">News</a></li>
        <li><a href="download.html">Download</a></li>
        <li><a href="documentation.html">Documentation</a></li>
        <li><a href="videos.html">Videos</a></li>
        <li><a href="http://www.vamp-plugins.org/">Plugins</a></li>
      </ul></div>

      <h2 id="firstpara">Sonic Visualiser &mdash; Tell Us About Your Work</h2>

      <p>Are you using Sonic Visualiser in academic research, or for
      commercial purposes? Or do you hope or intend to do so?</p>

      <p>If so, would you be interested in telling us something about
      your work? We are gathering case studies to gauge the impact of
      our work and to guide our future actions.</p>

      <p>We are especially interested in successful examples of using
      Sonic Visualiser in research or industry. But we would also like
      to learn about cases in which you think Sonic Visualiser or
      something like it could be helpful to you in the future.</p>
      
      <p>Anything you tell us will be used only to guide research and
      development work at the Centre for Digital Music, Queen Mary
      University of London.</p>

      <p>All fields are optional.</p>

      <form action="feedback41-submit.php" method="post">
      <input type="hidden" name="sv-version" value="<?php echo htmlentities($_GET['sv']); ?>">
      <input type="hidden" name="feedback-version" value="1"/>

      <table style="margin-left: auto; margin-right: auto"><tr><td valign=top>Your name:</td><td><input type="text" name="name" size="60"/></td></tr>
        <tr><td valign=top>Your email address:&nbsp;</td><td><input type="text" name="email" size="60"/></td></tr>
        <tr><td valign=top>Tell us about your work,<br>and what role Sonic
            Visualiser&nbsp;<br>plays or could play in it:&nbsp;</td>
          <td>
	    <textarea id="about" name="about" rows="10" cols="70"></textarea>
        </td></tr>
        <tr><td>Check this box if you would<br>be happy for us to contact you<br>to talk further:</td><td><input type="checkbox" name="followup"/> Yes, please do</td></tr>
        <tr><td></td><td><button type="submit">Send</button>
        </td></tr>
        </table>
      </form>
      
  </body>
</html>
