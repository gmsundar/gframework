{$inputDetails.preappend}
<input
    type="checkbox"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
    value="{$inputDetails.value}"
{if $inputDetails.checked!=''} checked {/if}
{if $inputDetails.readonly!=''} readonly{/if}
{$inputDetails.mandatory}
{$inputDetails.event}
/>
{$inputDetails.append}
