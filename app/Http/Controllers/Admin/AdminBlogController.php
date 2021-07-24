<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class AdminBlogController extends Controller
{
    public function listBlogAdmin()
    {
        $posts = Blog::all();

        return view('admin.parts.blog._listBlog', compact('posts'));
    }

    public function createBlog()
    {
        return view('admin.parts.blog._createBlog');
    }

    public function storeBlog(Request $request)
    {
        $blog = Blog::create([
            'title' => $request['title'],
            'body' => $request['editordata'],
            'status' => 'ACTIVE',
            'slug' => Str::slug($request['title']),
            'user_id' => Auth::user()->id,
        ]);

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo787'] = '787x255-' . $image->getClientOriginalName();
            $input['photo384'] = '384x255-' . $image->getClientOriginalName();
            $input['photo360'] = '360x239-' . $image->getClientOriginalName();
            $input['photo301'] = '301x160-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(787, 255)->save('blog/images/' . $input['photo787']);
            $img->fit(384, 255)->save('blog/images/' . $input['photo384']);
            $img->fit(360, 239)->save('blog/images/' . $input['photo360']);
            $img->fit(301, 160)->save('blog/images/' . $input['photo301']);

            $blog->photo = Str::after($input['photo787'], '-');
        }

        $blog->save();

        toast('Post creado correctamente', 'success');
        return back();
    }

    public function viewBlog($id)
    {
        $post = Blog::find($id);

        return view('admin.parts.blog._editBlog', compact('post'));
    }


    public function editBlog(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request['title'];
        $blog->body = $request['editordata'];

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo787'] = '787x255-' . $image->getClientOriginalName();
            $input['photo384'] = '384x255-' . $image->getClientOriginalName();
            $input['photo360'] = '360x239-' . $image->getClientOriginalName();
            $input['photo301'] = '301x160-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(787, 255)->save('blog/images/' . $input['photo787']);
            $img->fit(384, 255)->save('blog/images/' . $input['photo384']);
            $img->fit(360, 239)->save('blog/images/' . $input['photo360']);
            $img->fit(301, 160)->save('blog/images/' . $input['photo301']);

            $blog->photo = Str::after($input['photo787'], '-');
        }

        $blog->save();

        toast('Post editado correctamente', 'success');
        return back();
    }

    public function activeBlog($id)
    {
        $post =  Blog::find($id);
        $post->status = 'ACTIVE';
        $post->save();

        toast('Post activado correctamente', 'success');
        return back();
    }

    public function desactiveBlog($id)
    {
        $post =  Blog::find($id);
        $post->status = 'DESACTIVE';
        $post->save();

        toast('Post desactivado correctamente', 'success');
        return back();
    }
}
