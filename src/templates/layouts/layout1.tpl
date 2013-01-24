{include file=$AppTheme|cat:"header.tpl"}

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            </a>
            <a class="brand" href="{$CompanyURL}">{$AppName}</a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav ">
                    <li><a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'logout')); ?>">Logout</a></li>
                    <li><a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'login')); ?>">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            {include file=$AppTheme|cat:'menu.tpl' menu=$content_details_array.menu}
        </div>
    </div>
    <div class="span9">
        <h2>{$content_details_array.page.heading}</h2>
        {include file=$content_details_array.tplFileName}
    </div>
</div>

{include file=$AppTheme|cat:'footer.tpl'}


