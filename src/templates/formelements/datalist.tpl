{$inputDetails.preappend}
<input
    type="text"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id={$inputDetails.id}
{if $inputDetails.pattern!=''}pattern="{$inputDetails.pattern}"{/if}
{if $inputDetails.value!=''} value='{$inputDetails.value}'{/if}
{if $inputDetails.readonly!=''} readonly {/if}
{if $inputDetails.data!=''} list="{$inputDetails.name}_data" {/if}
{if $inputDetails.placeholder!=''}placeholder="{$inputDetails.placeholder}"{/if}
{if $inputDetails.size!=''}size="{$inputDetails.size}"{/if}
{$inputDetails.mandatory}
{$inputDetails.event}
/>
{if $inputDetails.data!=''}
    <datalist id="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}_data">
        {foreach from=$inputDetails.data item=currentselectvalue key=key name=selectbox}
            <option value="{$currentselectvalue}"></option>
        {/foreach}
    </datalist>
{/if}
{$inputDetails.append}