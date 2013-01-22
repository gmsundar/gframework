<div>
    <img
        src="{$inputDetails.photoimage_add.src}"
        style="width: 140px; height: 140px; "
        alt="{$inputDetails.photoimage_add.alt}"
        title="{$inputDetails.photoimage_add.title}"
        class="img-polaroid"
        id="{$inputDetails.photoimage_add.id}"
        name="{$inputDetails.photoimage_add.name}_display"
        table="{$inputDetails.photoimage_add.table}"
        column="{$inputDetails.photoimage_add.column}" />
    <input type="hidden" id="{$inputDetails.photoimage_add.name}" name="{$inputDetails.photoimage_add.name}" value="{$inputDetails.photoimage_add.src}" />
    <button type="button" class="btn loadtakephoto"><i class="icon-camera"></i></button>
</div>




