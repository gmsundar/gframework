<div class="input-prepend input-append">
{if $inputDetails.prepend neq ''}    <span class="add-on">{$inputDetails.prepend}</span>{/if}
<input type=radio
       name="{$inputDetails.name}"
       id="{$inputDetails.id}"
       value="{$currentselectvalue}"
       class="{$inputDetails.class}"
       style="{$inputDetails.style}"
{if $inputDetails.mandatory neq ''} required {/if}
/>
{if $inputDetails.append neq ''}  <span class="add-on">{$inputDetails.append}</span>{/if}
</div>