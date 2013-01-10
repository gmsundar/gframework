<div class="input-prepend input-append">
{if $inputDetails.prepend neq ''}    <span class="add-on">{$inputDetails.prepend}</span>{/if}
<input
    type="checkbox"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
    value="{$inputDetails.value}"
{if $inputDetails.checked!=''} checked {/if}
{if $inputDetails.readonly!=''} readonly{/if}
{if $inputDetails.mandatory neq ''} required {/if}

/>
{if $inputDetails.append neq ''}  <span class="add-on">{$inputDetails.append}</span>{/if}

</div>
