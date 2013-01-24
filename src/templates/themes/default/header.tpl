<html>
    <head>
        <title>
            {$content_details_array.page.title}
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
        <style type="text/css">
            {literal}   body {
                    padding-top: 60px;
                    padding-bottom: 40px;
                }
                .sidebar-nav {
                    padding: 9px 0;
                }{/literal}
            </style>
        </head>
        <body>
            <script src="{$AppJsURL}jquery.js"></script>
            <script src="{$AppJsURL}jquery-ui.js" ></script>
            <script src="{$AppJsURL}jquery.cookie.js" ></script>
            <script src="{$AppJsURL}geo.base.js" ></script>
            <script src="{$AppJsURL}bootstrap.min.js"></script>

            <div class="container-fluid">

