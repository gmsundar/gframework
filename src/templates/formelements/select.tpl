<div class="input-prepend input-append">
{if $inputDetails.prepend neq ''}    <span class="add-on">{$inputDetails.prepend}</span>{/if}
<select
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
{if $inputDetails.readonly!=''} readonly {/if}
{if $inputDetails.mandatory neq ''} required {/if}
{if $inputDetails.multiple!=''} multiple {/if}

>
{if $inputDetails.nodefaulttext neq 'true'}<option value="" >{if $inputDetails.selecttext neq ''}{$inputDetails.selecttext} {else}--Select--{/if}</option>{/if}
{foreach from=$inputDetails.data item=currentselectvalue key=key name=selectbox}
    <option value="{$key}" {if $key eq $inputDetails.value}selected=true{/if} >{$currentselectvalue}</option>
{/foreach}
</select>

{if $inputDetails.append neq ''}  <span class="add-on">{$inputDetails.append}</span>{/if}
</div>
<br>
{$inputDetails.placeholder}



