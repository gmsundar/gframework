<ul id="floatMenu" class="mainmenu">
    {foreach item=menu_array from=$menu}
        <li id="menu_container_{$menu_array.0}"><a id="menu_{$menu_array.0}" href="{$AppURL}{$menu_array.2}">{$menu_array.1}</a>
            <ul class="submenu">
                {foreach item=child_menu1_array from=$menu_array.sub}
                    <li><a id="menu_{$child_menu1_array.0}" href="{$AppURL}{$child_menu1_array.2}">{$child_menu1_array.1}</a></li>          
                {/foreach}
            </ul>
        </li>
    {/foreach}
</ul>
