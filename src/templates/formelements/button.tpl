<input 
    type="button" 
    class="{if $inputDetails.class!=''}{$inputDetails.class}{else}button{/if}" 
    style="{$inputDetails.style}"
    name="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}" 
    id="{if $inputDetails.id!=''}{$inputDetails.id}{else}{$inputDetails.name}{/if}" value="{if $inputDetails.value!=''}{$inputDetails.value}{else}Submit{/if}"
    accesskey="s"
    />