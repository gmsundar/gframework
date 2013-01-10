<div class="input-prepend input-append">
{if $inputDetails.prepend neq ''}    <span class="add-on">{$inputDetails.prepend}</span>{/if}
<input
    type="text"
    class="{$inputDetails.class}"
    style="{$inputDetails.style}"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
    readonly
{if $inputDetails.mandatory neq ''} required {/if}
/>

<img src="{$AppImgURL}calendar.png"   alt="" />
{if $inputDetails.append neq ''}  <span class="add-on">{$inputDetails.append}</span>{/if}
</div>