<div id="page_builder_wrapper" class=" w-[750px] flex flex-col items-center m-auto">

    <div id="page_contents_root" class='flex flex-col w-[700px]'>
    </div>
    <button class="bg-black text-white text-2xl" id="add_new">+</button>
    <span id="options-menu" class="flex flex-row hidden">
        <ul class="flex flex-row justify-between w-[400px] border-2 border-red-200">
            <li><button type="elementSelector" value='h-big'>Big Header</button></li>
            <li><button type="elementSelector" value='h-small'>Small Header</button></li>
            <li><button type="elementSelector" value='paragraph'>Paragraph</button></li>
        </ul>
    </span>
</div>

@vite('resources/js/editor/PageComponent.js')