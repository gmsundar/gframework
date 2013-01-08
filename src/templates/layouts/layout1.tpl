{include file=$AppTheme|cat:"header.tpl"}
<div class="box">
    <div class="headlines">
        <h2>
            <span>{$content_details_array.page.title}</span>
        </h2>
    </div>
    <div class="box-content" dir="{$AppTextDirection}">
        {include file=$content_details_array.tplFileName}
    </div>
</div>
<div id="sidebar">
    {include file=$AppTheme|cat:'menu.tpl' menu=$content_details_array.menu}

</div>
{include file=$AppTheme|cat:'footer.tpl'}