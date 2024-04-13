<div id="page_builder_wrapper" class="w-[750px] flex flex-col items-center mx-auto mt-[5%]">
    <div id="page_contents_root" class="flex flex-col w-[700px]">
        <script>
            String.prototype.e_html = function() {
                this.replace('<', '&#60;');
            }

            function toggleHiddenElementOptions() {
                let optionsMenu = document.getElementById("options-menu");
                optionsMenu.classList.toggle("hidden");
            }
            class PageComponent {

                HeaderMap = {
                    "h-big": "Header",
                    "h-small": "Sub Header",
                };

                saveFields() {
                    let fields =
                        document.querySelectorAll("input[camel_type]") &&
                        document.querySelectorAll("textarea[camel_type]");
                    console.log(fields);
                }

                createLabel(content, component_id) {
                    let label = document.createElement("h3");
                    label.innerText = content;
                    label.classList = "mt-4 text-2xl";
                    label.setAttribute("target", component_id);

                    return label;
                }
                createComponentOptions(component_id) {
                    let options = document.createElement("button");
                    options.addEventListener("click", function(event) {
                        event.preventDefault();
                        document.querySelector(`[camel_id="${component_id}"]`).remove();
                        document.querySelectorAll(`[target="${component_id}"]`).forEach((element) => {
                            element.remove();
                        });

                        this.remove();
                    });
                    options.setAttribute("target", component_id);
                    options.classList = "mb-5 mt-1";
                    options.style.alignSelf = "baseline";
                    options.innerHTML = "Delete";
                    return options;
                }
                createID(component_id, list) {
                    let idInput = document.createElement("input");
                    idInput.type = "text";
                    idInput.setAttribute("target", component_id);
                    idInput.value = list ?? ''
                    idInput.placeholder = 'ID'
                    idInput.classList =
                        "border-2 border-black rounded w-[10%]  mt-1 shadow-xl";
                    return idInput;
                }
                createClassList(component_id, list) {
                    let classes = document.createElement("input");
                    classes.type = "text";
                    classes.setAttribute("target", component_id);
                    classes.value = list ?? ''
                    classes.placeholder = 'Classes'
                    classes.classList =
                        "border-2 border-black rounded w-[20%]  mt-1 shadow-xl";
                    return classes;
                }
                createWireframe(type, content = null, idList = null, classList = null) {
                    let root =
                        type == "h-big" || type == "h-small" ?
                        document.createElement("input") :
                        document.createElement("textarea");

                    let tempID = Math.round(Math.random(8) * 100);
                    root.setAttribute("camel_type", type);
                    root.setAttribute("camel_id", tempID);
                    type == 'paragraph' ? root.innerText = content : root.value = content;
                    root.classList =
                        "border-2 border-black rounded w-full mx-auto mt-1 shadow-xl";
                    document.getElementById("page_contents_root").append(root);

                    root.insertAdjacentElement(
                        "beforebegin",
                        this.createLabel(this.HeaderMap[type] ?? "Paragraph", tempID)
                    );
                    root.insertAdjacentElement(
                        "afterend",
                        this.createComponentOptions(tempID)
                    );
                    root.insertAdjacentElement('beforebegin', this.createID(tempID, idList));
                    root.insertAdjacentElement("beforebegin", this.createClassList(tempID, classList))
                }
            }
            document.addEventListener('DOMContentLoaded', function() {

                PageComponent = new PageComponent();

                document
                    .getElementById("add_new")
                    .addEventListener("click", function(event) {
                        event.preventDefault();
                        toggleHiddenElementOptions();
                    });
                document
                    .querySelectorAll('button[type="elementSelector"]')
                    .forEach((element) => {
                        element.addEventListener("click", function(event) {
                            event.preventDefault();
                            PageComponent.createWireframe(this.value);
                        });
                    });


            })

            async function sendContents() {
                let dataBlocks = [];
                document.querySelectorAll("[camel_id]").forEach((element) => {
                    dataBlocks.push({
                        type: element.getAttribute("camel_type"),
                        text: element.value,
                        ClassList: element.previousElementSibling.value,
                        idList: element.previousElementSibling.previousElementSibling.value,

                    });
                });
                let formData = new FormData();
                formData.append("name", document.getElementById("Name").value),
                    formData.append("page_slug", document.getElementById("Slug").value),
                    formData.append(
                        "text_contents",
                        JSON.stringify({
                            content: dataBlocks
                        })
                    );

                fetch("/create-new", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.getElementById("csrf-token").value,
                    },
                    body: formData,
                }).then((resolve) => {
                    window.alert('Page Updated!')
                }, (reject) => {
                    window.alert('Unable to update page.')
                });
            }
            document
                .getElementById("submit_page")
                .addEventListener("click", function(event) {
                    event.preventDefault();
                    sendContents();
                });
        </script>
        @if($exists == 'true')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let blocks = JSON.parse(<?php echo json_encode($text_contents); ?>)['content'];
                document.getElementById('Name').value = '<?php echo $page_data['name'] ?>';
                document.getElementById('Slug').value = '<?php echo $page_data['page_slug'] ?>';
                console.log(blocks)
                blocks.forEach(element => {
                    PageComponent.createWireframe(element.type, element.text, element.idList, element
                        .ClassList)
                });
            })
        </script>
        @endif
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