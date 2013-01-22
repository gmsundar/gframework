<div class="input-append date" >
    <input
        size="16"
        type="text"
        readonly
        name="{$inputDetails.name}_display_date"
        id="{$inputDetails.id}_display_date"
        value="{$inputDetails.value}"
    {if $inputDetails.mandatory neq ''} required {/if}
    >
<span class="add-on"><i class="icon-th"></i></span>
<input
    type="hidden"
    name="{$inputDetails.name}"
    id="{$inputDetails.id}"
    value="{$inputDetails.value}"
    >
</div>