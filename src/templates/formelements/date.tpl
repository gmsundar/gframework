<div class="input-append date" data-date="{$inputDetails.value}" data-date-format="{$inputDetails.format}">
    <input class="span2"
           size="16"
           type="text"
           readonly
           name="{$inputDetails.name}"
           id="{$inputDetails.id}"
           value="{$inputDetails.value}"
    {if $inputDetails.mandatory neq ''} required {/if}
    >
<span class="add-on"><i class="icon-th"></i></span>
</div>