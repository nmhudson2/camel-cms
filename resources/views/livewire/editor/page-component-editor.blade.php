<div id="page_builder_wrapper" class=" w-[750px] flex flex-col items-center mx-auto mt-[5%]">

    <div id="page_contents_root" class='flex flex-col w-[700px]'>
    </div>
    <span class="border-b-4 border-black w-full rounded shadow-lg mb-1"></span>
    <button class="bg-black text-white text-2xl rounded px-2" id="add_new">+</button>
    <span id="options-menu" class="flex flex-row hidden">
        <ul class="flex flex-row justify-between w-[400px] bg-gray-100 rounded shadow-xl p-2 mt-1 font-bold text-xl">
            <li><button type="elementSelector" value='h-big'>Big Header</button></li>
            <li><button type="elementSelector" value='h-small'>Small Header</button></li>
            <li><button type="elementSelector" value='paragraph'>Paragraph</button></li>
        </ul>
    </span>
</div>

@vite('resources/js/editor/PageComponent.js')