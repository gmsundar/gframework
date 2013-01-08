{$inputDetails.preappend}
<input
    type="{$inputDetails.type}"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
{if $inputDetails.pattern!=''}pattern="{$inputDetails.pattern}"{/if}
{if $inputDetails.value!=''} value="{$inputDetails.value}"{/if}
{if $inputDetails.placeholder!=''}placeholder="{$inputDetails.placeholder}"{/if}
{if $inputDetails.size!=''}size="{$inputDetails.size}"{/if}
{if $inputDetails.readonly!=''} readonly {/if}
{$inputDetails.mandatory}
{$inputDetails.event}
/>
{$inputDetails.append}
