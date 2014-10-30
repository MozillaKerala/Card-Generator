<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Card Generator | Mozilla Portal | Mozilla Kerala</title>
        <meta name="description" content="Card Generator for Mozillians">
  
        <!--    favicon     -->
        <link rel="shortcut icon" type="image/ico" href="images/favicon.ico">

        <!--    Facebook META Tags
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Card Generator | Mozilla Kerala">
        <meta property="og:title" content="Card Generator | Mozilla Kerala">
        <meta property="og:url" content="http://cards.mozillakerala.org">
        <meta property="og:description" content="Card Generator for Mozillians">
        <meta property="og:image" content="images/mozilla_og.png">
        <meta property="fb:page_id" content="290667851051610">  -->

        <!--    Cascade Style Sheets Includes       -->
        <link rel="stylesheet" href="css/style.css" />

        <!--    Tabzilla stylesheet     -->
        <link rel="stylesheet" type="text/css" href="//mozorg.cdn.mozilla.net/media/css/tabzilla-min.css" />

        <!--    Tabzilla Script     -->
        <script src="//mozorg.cdn.mozilla.net/tabzilla/tabzilla.js"></script>

        <!--    Javascript Includes     -->
        <script src="js/jquery-2.0.3.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#gen-card-button').click(function () {
                    var template_html = $("#gen-template-frame").contents().find('html').html();
                    $('#gen-html-textarea').val(template_html);
                    $('#gen-create-form').submit();
                });
            });
        </script>
    </head>
    
    <body>
        
        <div id="page">
            <a href="/en-US/" id="tabzilla">mozilla</a>

            <div id="header">
                <span>Card Generator</span>
            </div>

            <div class="gen-select-template-container">
                Select card template: 
                <select id="gen-select-template" class="">
                    <?php
                        $dir = __DIR__.'/templates';

                        if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                while (($file = readdir($dh)) !== false) {
                                    if ($file != '.' && $file != '..') {
                                        $template_name = rtrim($file, '.html');
                                        echo "<option value='". $template_name ."'>". $template_name ."</option>";
                                    }
                                }
                                closedir($dh);
                            }
                        }
                    ?>
                </select>
            </div>

            <p class="help-text"><span class="heart">❤</span> Press <span class="shortcut-key">SHIFT</span> to highlight editable text. And click to edit.</p>
            
            <!-- TODO: Need to change this to support choosing other card templates. -->
            <iframe id="gen-template-frame" src="templates/reps-card.html"></iframe>
            
            <form id="gen-create-form" action="generate.php" method="post">
                <input name="paper" type="hidden" value="card"/>
                <input name="orientation" type="hidden" value="portrait"/>

                <textarea name="html" id="gen-html-textarea"></textarea>

                <div>
                    <input type="button" value="Generate Card" id="gen-card-button" class="button" />
                </div>
            </form>
            
            

        <script>
            $(document).on('keydown', function (e) {
                if (e.keyCode == 16) {
                	$('#gen-template-frame').contents().find('div[contenteditable="true"]').css('background-color', 'rgba(255, 100, 58, 0.43)');
                }
            });

           $(document).on('keyup', function (e) {
                $('#gen-template-frame').contents().find('div[contenteditable="true"]').css('background-color', 'transparent');
            });
        </script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-46056779-4', 'mozillakerala.org');
          ga('send', 'pageview');

        </script>
    </body>

</html>
