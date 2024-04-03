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
    </tr>
    @endforeach
</table>