<div class="input-prepend input-append">
{if $inputDetails.prepend neq ''}    <span class="add-on">{$inputDetails.prepend}</span>{/if}
<input
    type="number"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
{if $inputDetails.value!=''} value="{$inputDetails.value}"{/if}
{if $inputDetails.placeholder!=''} placeholder="{$inputDetails.placeholder}"{/if}
{if $inputDetails.size!=''} size="{$inputDetails.size}"{/if}
{if $inputDetails.readonly!=''} readonly {/if}
{if $inputDetails.min!=''} min="{$inputDetails.min}" {/if}
{if $inputDetails.max!=''} max="{$inputDetails.max}" {/if}
{if $inputDetails.mandatory neq ''} required {/if}

/>
{if $inputDetails.append neq ''}  <span class="add-on">{$inputDetails.append}</span>{/if}
</div>