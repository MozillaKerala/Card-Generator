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
                    var template_back_html = $("#gen-template-back-frame").contents().find('html').html();
                    $('#gen-html-textarea').val(template_html);
                    $('#gen-html-back-textarea').val(template_back_html);
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
                <select id="gen-select-template" class="" onchange="change()">
                    <option value="Reps-Card 1">Reps-Card 1</option>
                    <option value="Reps-Card 2">Reps-Card 2</option>
                    <option value="Mozillians-Card">Mozillians-Card</option>
                    <option value="FSA-Card">FSA-Card</option>
                </select>
            </div>

            <p class="help-text"><span class="heart">❤</span> Press <span class="shortcut-key">SHIFT</span> to highlight editable text. And click to edit.</p>
            
            <!-- TODO: Need to change this to support choosing other card templates. -->
            <iframe id="gen-template-frame" src="templates/Reps-Card 1.html"></iframe>
            <iframe id="gen-template-back-frame" src="templates/back/Reps-Card 1.html"></iframe>
            
            <form id="gen-create-form" action="generate.php" method="post" target="_blank">
                <input name="paper" type="hidden" value="card"/>
                <input name="orientation" type="hidden" value="portrait"/>

                <textarea name="html" id="gen-html-textarea"></textarea>
                <textarea name="html2" id="gen-html-back-textarea"></textarea>
                <script>
                  	function change() { 
                  		var sel = $('#gen-select-template option:selected').text();
                  		var frame = $('#gen-template-frame');
                  		var frame_back = $('#gen-template-back-frame');
  						frame.attr('src', 'templates/'+sel+'.html');
  						frame_back.attr('src', 'templates/back/'+sel+'.html');
  					}
                </script>
                <div>
                    <input type="button" value="Generate Card" id="gen-card-button" class="button" />
                </div>
            </form>
            
            <div id="footer"><br/>Created by fox lovers in Kerala | <a href="https://github.com/MozillaKerala/Card-Generator/">Grab the code</a> and improve it. | <a href="https://github.com/MozillaKerala/Card-Generator/tree/master#how-to-add-new-card-template">Add</a> a new card template.<br/><br/></div>

        </div>

        <script>
            $(document).on('keydown', function (e) {
                if (e.keyCode == 16) {
                	$('#gen-template-frame').contents().find('div[contenteditable]').css('background-color', 'rgba(255, 100, 58, 0.43)');
                }
            });

           $(document).on('keyup', function (e) {
                $('#gen-template-frame').contents().find('div[contenteditable]').css('background-color', 'transparent');
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
        
        <!--    Piwik Analytics  -->
        <script type="text/javascript">
            var _paq = _paq || [];
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function() {
                var u="//piwik.mozillakerala.org/";
                _paq.push(['setTrackerUrl', u+'piwik.php']);
                _paq.push(['setSiteId', 6]);
                var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
            })();
        </script>
        
        <noscript>
            <p><img src="//piwik.mozillakerala.org/piwik.php?idsite=6" style="border:0;" alt="" /></p>
        </noscript>
        <!-- End Piwik Code -->
    </body>

</html>
