{$inputDetails.preappend}
{foreach from=$inputDetails.data item=currentselectvalue key=key name=checkboxbox}
    <input type=radio
           name="{$inputDetails.name}"
           id="{$inputDetails.id}"
           value="{$currentselectvalue}"
           class="{$inputDetails.class}"
           style="{$inputDetails.style}"
           />
    <label for={$currentselectvalue}>{$key}</label>
{/foreach}
{$inputDetails.append}