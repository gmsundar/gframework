<div class="input-prepend input-append">
{if $inputDetails.prepend neq ''}    <span class="add-on">{$inputDetails.prepend}</span>{/if}
<textarea
    class="textarea"
    name="{$inputDetails.name}"
    id='{$inputDetails.id}'
    placeholder="{$inputDetails.placeholder}"
    rows="{$inputDetails.rows}"
    cols="{$inputDetails.cols}"
    wrap="soft"
{if $inputDetails.readonly!=''} readonly {/if}
{if $inputDetails.mandatory neq ''} required {/if}
>{$inputDetails.value}</textarea>
{if $inputDetails.append neq ''}  <span class="add-on">{$inputDetails.append}</span>{/if}
</div>

