<div id="content">
    <div class="box">
        <div class="headlines">
            <h2><span>{$content_details_array.page.title}</span></h2>
            <a href="#help" class="help"></a>      </div>

        <div class="box-content" dir="{$AppTextDirection}">

            {include file='formelements/error.tpl' error=$content_details_array.lastaction.error}
            {include file='formelements/info.tpl' info=$content_details_array.lastaction.info}
            {include file='formelements/warning.tpl' warning=$content_details_array.lastaction.warning}
            {include file='formelements/action_feedback.tpl' feedback=$content_details_array.lastaction.feedback}
            {include file=$content_details_array.tplFileName}        </div>
    </div>
</div>
<!-- /#content -->
<!-- #sidebar -->
<div id="sidebar">
    <!-- mainmenu -->
    {include file=$AppTheme|cat:'menu.tpl' menu=$content_details_array.menu}
    <!-- /mainmenu -->
    
</div>
