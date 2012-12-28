{$inputDetails.preappend}
<input
    type="number"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
{if $inputDetails.value!=''} value="{$inputDetails.value}"{/if}
{if $inputDetails.size!=''} size="{$inputDetails.size}"{/if}
{if $inputDetails.readonly!=''} readonly {/if}
{if $inputDetails.min!=''} min="{$inputDetails.min}" {/if}
{if $inputDetails.max!=''} max="{$inputDetails.max}" {/if}
{if $inputDetails.step!=''} max="{$inputDetails.step}" {/if}
{$inputDetails.event}
/>
{$inputDetails.append}