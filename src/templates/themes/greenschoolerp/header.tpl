<html>
    <head>
        <title>
    {if $content_details_array.page.heading}{$content_details_array.page.heading}{else}{$content_details_array.page.title}{/if}
</title>
<script>
    var AppImgURL = '{$AppImgURL}';
    var AppURL = '{$AppURL}';
    var AppJsURL = '{$AppJsURL}';
    var AppCssURL = '{$AppCssURL}';
    var AppScriptURL = '{$AppCssURL}';
    var AppViewUploadsURL = '{$AppViewUploadsURL}';
</script>
<link href="{$AppCssURL}TableTools.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppCssURL}geotheme1.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppCssURL}bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppCssURL}bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="{$AppCssURL}{$AppJqueryTheme}/jquery-ui.css"  />
</head>
<body>
    <script src="{$AppJsURL}jquery.js"></script>
    <script src="{$AppJsURL}jquery-ui.js" ></script>
    <script src="{$AppJsURL}jquery.cookie.js" ></script>
    <script src="{$AppJsURL}geo.base.js" ></script>
    <script src="{$AppJsURL}bootstrap.min.js"></script>

    <div id="header">
        {*        <div id="logo"><a href="{$AppURL}"><img src="{$AppImgURL}/logo.png" width="210" height="53"></a></div>*}
        <!-- /#logo -->
        <!-- #user -->
        <div id="user">
            {if $smarty.session.user_id}
                <h2>Welcome {$smarty.session.first_name} {$smarty.session.middle_name} {$smarty.session.last_name}</h2>
                <a href="index.php?file=logout">logout</a>
            {/if}
        </div>
    </div>

