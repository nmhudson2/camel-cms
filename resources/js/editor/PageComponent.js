// Component Class

function toggleHiddenElementOptions() {
    let optionsMenu = document.getElementById("options-menu");
    optionsMenu.classList.toggle("hidden");
}

document.addEventListener("DOMContentLoaded", function (event) {
    class PageComponent {
        element;
        content;

        HeaderMap = {
            "h-big": "Header",
            "h-small": "Sub Header",
        };

        init(element, content) {
            this.element = element;
            this.content = content;
        }

        createLabel(content, component_id) {
            let label = document.createElement("h3");
            label.innerText = content;
            label.setAttribute("target", component_id);

            return label;
        }
        createComponentOptions(component_id) {
            let options = document.createElement("button");
            options.addEventListener("click", function (event) {
                event.preventDefault();
                document.querySelector(`[camel_id="${component_id}"]`).remove();
                document.querySelector(`[target="${component_id}"]`).remove();
                this.remove();
            });
            options.setAttribute("target", component_id);
            options.classList = "mb-5 mt-1";
            options.style.alignSelf = "baseline";
            options.innerHTML = "Delete";
            return options;
        }
        createWireframe(type) {
            let root =
                type == "h-big" || type == "h-small"
                    ? document.createElement("input")
                    : document.createElement("textarea");
            let tempID = Math.round(Math.random(8) * 100);
            root.setAttribute("camel_type", type);
            root.setAttribute("camel_id", tempID);
            root.classList =
                "border-2 border-black rounded w-full mx-auto mt-5 ";
            document.getElementById("page_contents_root").append(root);

            root.insertAdjacentElement(
                "beforebegin",
                this.createLabel(this.HeaderMap[type] ?? "Paragraph", tempID)
            );
            root.insertAdjacentElement(
                "afterend",
                this.createComponentOptions(tempID)
            );
        }
    }
    PageComponent = new PageComponent();

    let element_options = document.querySelectorAll(
        'button[type="elementSelector"]'
    );
    document
        .getElementById("add_new")
        .addEventListener("click", function (event) {
            event.preventDefault();
            toggleHiddenElementOptions();
        });
    element_options.forEach((element) => {
        element.addEventListener("click", function (event) {
            event.preventDefault();
            PageComponent.createWireframe(this.value);
        });
    });
});
