// Component Class

function toggleHiddenElementOptions() {
    let optionsMenu = document.getElementById("options-menu");
    optionsMenu.classList.toggle("hidden");
}

document.addEventListener("DOMContentLoaded", function (event) {
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
            root.setAttribute("form", "page_editor");
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
        }
    }
    PageComponent = new PageComponent();

    document
        .getElementById("add_new")
        .addEventListener("click", function (event) {
            event.preventDefault();
            toggleHiddenElementOptions();
        });
    document
        .querySelectorAll('button[type="elementSelector"]')
        .forEach((element) => {
            element.addEventListener("click", function (event) {
                event.preventDefault();
                PageComponent.createWireframe(this.value);
            });
        });
});

// Function to send page contents as JSON to server.
async function sendContents() {
    let dataBlocks = [];
    document.querySelectorAll("[camel_id]").forEach((element) => {
        dataBlocks.push({
            type: element.getAttribute("camel_type"),
            text: element.value,
        });
    });
    let formData = new FormData();
    formData.append("name", document.getElementById("Name").value),
        formData.append("page_slug", document.getElementById("Slug").value),
        formData.append(
            "text_contents",
            JSON.stringify({ content: dataBlocks })
        );

    fetch("/create-new", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.getElementById("csrf-token").value,
        },
        body: formData,
    });
}
document
    .getElementById("submit_page")
    .addEventListener("click", function (event) {
        event.preventDefault();
        sendContents();
    });
