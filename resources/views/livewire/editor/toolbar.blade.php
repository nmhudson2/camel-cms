<div class=" w-full  flex flex-col items-center">
    <label for="Name">Page Name</label>
    <input type="text" name="Name" id="page_name" value='{{$page_meta == null ? '': $page_meta['name']}}' class="w-[50%]" />
    <label for="Slug">Slug</label>
    <input type="text" name="Slug" id="page_slug" value='{{$page_meta == null ? '': $page_meta['page_slug']}}' class="w-[50%]" />
    <label for="Template">Page Template</label>
    <input type="text" name="Template" id="page_template" value='{{$page_meta == null ? '': $page_meta['template']}}' class="w-[50%]" />

</div>