<table class="m-auto w-[90%] shadow-xl bg-white rounded text-center">
    <tr>
        <th>

        </th>
        <th>
            Page Name
        </th>
        <th>
            Slug
        </th>
        <th>
            Author
        </th>

        <th>
            Created
        </th>
        <th>

        </th>
    </tr>
    @foreach($pages as $page)
    <tr class='border-b-2 border-gray'>
        <td><a href="{{route('editor.page_slug', ['exists'=>'true','page_slug' => $page['page_slug']])}}">Edit</a></td>
        <td>
            {{$page['name']}}
        </td>
        <td>
            {{$page['page_slug']}}
        </td>
        <td>
            {{$page['author']}}
        </td>
        <td>
            {{explode('T',$page['created_at'])[0]}}
        </td>
        <td><button target="{{$page['page_slug']}}">
                <x-camel_cms.trash-bin>
                </x-camel_cms.trash-bin>
            </button>
        </td>
    </tr>
    @endforeach
</table>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let deleters = document.querySelectorAll('button[target]');
        deleters.forEach((element) => {
            element.addEventListener('click', async (event) => {
                event.preventDefault();
                await fetch(`/remove/${element.getAttribute('target')}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.getElementsByName("csrf-token")[0]
                            .content,
                    },
                }).then((response) => {
                    if (!response.ok) {
                        throw new Error('Server Could Not Perform Action')
                    } else {
                        location.reload();
                    }
                })
            });
        })
    })
</script>