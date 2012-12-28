
{$inputDetails.preappend}

<select  
    class="{if $inputDetails.class!=''}{$inputDetails.class}{else}select{/if}" 
         style="{$inputDetails.style}"
         name="{if $inputDetails.name!=''}{$inputDetails.name}{if $inputDetails.multiple!=''}[]{/if}{else}{$inputDetails.id}{/if}" 
         id={if $inputDetails.id!=''}{$inputDetails.id}{else}{$inputDetails.name}{/if} 
         {$inputDetails.required} 
{if $inputDetails.readonly!=''} disabled {/if}
{if $inputDetails.multiple!=''} multiple {/if}
 {$inputDetails.event}
>
    {if $inputDetails.nodefaulttext neq 'true'}<option value="" >{if $inputDetails.selecttext neq ''}{$inputDetails.selecttext} {else}--Select--{/if}</option>{/if}
    {foreach from=$inputDetails.data item=currentselectvalue key=key name=selectbox}

        <option value="{$key}" {if $key eq $inputDetails.value}selected=true{/if} >{$currentselectvalue}</option>
    {/foreach}
</select>

{$inputDetails.append}   
<br>
{$inputDetails.placeholder}



