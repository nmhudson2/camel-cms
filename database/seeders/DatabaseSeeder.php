<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'SuperUser',
            'email' => getenv('DB_USERNAME') . '@app.com',
            'password' => getenv('DB_PASSWORD'),
            'current_team_id' => '1',
        ]);

        Page::factory()->create([
            'name' => 'Homepage',
            'page_slug' => 'homepage',
            'author' => 'SuperUser',
            'text_contents' => json_encode('"{\"content\":[{\"type\":\"h-big\",\"text\":\"Welcome To Camel CMS!\",\"ClassList\":\"\",\"idList\":\"\"},{\"type\":\"h-small\",\"text\":\"Create something great.\",\"ClassList\":\"\",\"idList\":\"inspire_subheader\"},{\"type\":\"paragraph\",\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac pharetra enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent ex ex, faucibus ut tortor at, dictum lacinia arcu. Sed cursus libero et lorem porta ultrices. Fusce hendrerit risus quis metus imperdiet, sit amet luctus risus faucibus. Donec lobortis mauris auctor tincidunt vehicula. Maecenas dictum sem nunc, id sagittis mauris laoreet tincidunt. Phasellus rutrum a lorem id feugiat. Nulla efficitur lobortis urna, eget pulvinar sem dignissim eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet blandit elit, sit amet sollicitudin mi. Maecenas elit lacus, placerat et pellentesque non, cursus a quam.\",\"ClassList\":\"\",\"idList\":\"\"},{\"type\":\"paragraph\",\"text\":\"Cras nec nibh a enim viverra tincidunt. Vivamus sodales tincidunt rutrum. Praesent velit arcu, ornare sed laoreet vitae, tincidunt ac orci. Pellentesque faucibus efficitur enim, sit amet iaculis erat. Mauris ut quam suscipit, egestas enim sit amet, viverra metus. Ut faucibus elit vel tellus gravida ultricies. Donec et leo eget ligula congue feugiat quis id tortor. Nullam vel maximus odio, id molestie urna. Aliquam sit amet ligula sapien. Nullam eget nisl magna. Nulla facilisi. In auctor velit sit amet finibus consectetur. Cras massa sem, aliquam et quam et, ornare euismod ligula.\",\"ClassList\":\"\",\"idList\":\"\"},{\"type\":\"paragraph\",\"text\":\"Duis non arcu vestibulum, auctor justo eget, tempor nisl. Duis id diam ex. Proin dictum egestas lectus sit amet viverra. Proin consequat eget quam non suscipit. Fusce fermentum, magna eu tincidunt pharetra, quam risus convallis ante, vitae bibendum libero nisi quis velit. Praesent et mauris fringilla, iaculis sapien non, fringilla nulla. Vivamus placerat velit et tincidunt ornare. Nulla facilisi. Mauris lacus metus, malesuada in arcu ut, ullamcorper condimentum metus. Suspendisse pretium convallis suscipit. Etiam aliquam mattis felis nec congue. Nullam iaculis dui ut urna sollicitudin, ut accumsan erat placerat. Integer a placerat diam. Duis tempor ipsum et sapien suscipit, et ornare felis varius.\",\"ClassList\":\"\",\"idList\":\"\"},{\"type\":\"paragraph\",\"text\":\"Integer pellentesque maximus nisi, a tempor quam eleifend sit amet. Phasellus magna justo, pellentesque quis posuere in, vulputate ut risus. Pellentesque efficitur egestas ex. Integer eget sollicitudin mauris, a bibendum diam. Aliquam eget cursus nibh, a ornare velit. Morbi non dapibus urna, dignissim sodales purus. Aliquam varius nisl vel neque pretium, eget porta risus accumsan. Fusce ultricies, mauris sit amet commodo ultricies, tellus nibh iaculis ligula, quis iaculis justo odio ut augue. Praesent dui nibh, porttitor nec massa eu, scelerisque iaculis nisi. Suspendisse ut dolor quis nulla tincidunt consectetur vitae eget enim. Integer rhoncus volutpat libero.\",\"ClassList\":\"\",\"idList\":\"\"}]}"'),
        ]);
        Page::factory()->create([
            'name' => 'About',
            'page_slug' => 'about',
            'author' => 'SuperUser',
            'text_contents' => json_encode('"{\"content\":[{\"type\":\"h-big\",\"text\":\"About Camel CMS\",\"ClassList\":\"\",\"idList\":\"\"},{\"type\":\"paragraph\",\"text\":\"Camel CMS is a self-contained, lightweight Content Management System, aimed at allowing individuals to create simple webpages. Camel CMS is built upon the Laravel Framework, meaning that it can be tinkered with as much as you want.  Want to change how things look? Add new themes in your \\\"includes\\\" directory and customize away! Log in to your admin panel now and take a look at everything available. \",\"ClassList\":\"\",\"idList\":\"\"}]}"'),
        ]);
        Page::factory()->create([
            'name' => 'Policies',
            'page_slug' => 'policies',
            'author' => 'SuperUser',
            'text_contents' => json_encode('"{\"content\":[{\"type\":\"h-big\",\"text\":\"Policies\",\"ClassList\":\"\",\"idList\":\"\"},{\"type\":\"paragraph\",\"text\":\"Add your business policies here, or change the page completely. Make this site yours!\",\"ClassList\":\"\",\"idList\":\"\"}]}"'),
        ]);
    }
}
