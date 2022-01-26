<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Category;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeGenre($genreId)
    {
        $films = Film::where('genre_id', $genreId)
            ->orderBy('created_at', 'desc')
            ->with('genre')
            ->with('category')
            ->paginate(10);

        return view('films.films_list', compact('films'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::orderBy('created_at', 'desc')
            ->with('genre')
            ->with('category')
            ->paginate(10);

        return view('films.films_list', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::select('id', 'title')->get();
        $category = Category::select('id', 'title')->get();

        return view('films.film_create', compact('genre', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $data = $request->all();
        if (isset($data['viewed'])) {
            $data['viewed'] = 1;
        } else {
            $data['viewed'] = 0;
        }

        $result = Film::create($data);
        if ($result) {
            return redirect()->route('films.index');
        } else {
            return back(['msg' => "Save error"])
                ->withErrors()
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::where('id', $id)
            ->with('genre')
            ->with('category')
            ->first();
        $filmViewed = Film::where('viewed', 1)
            ->get();

        if (isset($film->photo)) {
            $file = 'img/1.jpg';
            file_put_contents($file, $film->photo);
        }

        return view('films.film_id', compact('film', 'filmViewed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::where('id', $id)
            ->with('genre')
            ->with('category')
            ->first();
        $genre = Genre::select('id', 'title')->get();
        $category = Category::select('id', 'title')->get();
//        dd($film);
//        dump();

        return view('films.film_update', compact('film', 'genre', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, $id)
    {
        $item = Film::find($id);
        if (empty($item)) {
            return back(['msg' => "Entry id =[{$id}] not found"])
                ->withErrors()
                ->withInput();
        }

        $data = $request->all();
        if (isset($data['viewed'])) {
            if ($data['viewed'] != 0) {
                $data['viewed'] = 1;
            } else {
                $data['viewed'] = 0;
            }
        } else {
            $data['viewed'] = 0;
        }
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('films.show', $item->id)
                ->with(['success' => 'saved successfully']);
        } else {
            return back(['msg' => "Save error"])
                ->withErrors()
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedRows = Film::where('id', $id)->delete();
        return redirect()->route('home');
    }

    public function addPhoto(Request $request, $film_id)
    {
        $data = file_get_contents($request->file('photo')->getPathname());
        $save = ['photo' => $data];
        $affected = Film::where('id', $film_id)
            ->update($save);
        return redirect()->route('films.edit', $film_id);
    }

    public function getPhoto($film_id)
    {
        $film = Film::findOrFail($film_id);
        return response($film->photo)->withHeaders([
            'Content-Type' => 'image/jpeg'
        ]);
    }

    public function searchFilms(Request $request)
    {
        $data = $request->all();
        $films = Film::where('title', 'LIKE', '%' . $data['search'] . '%')
            ->orderBy('created_at', 'desc')
            ->with('genre')
            ->with('category')
            ->paginate(10);

        return view('films.films_list', compact('films'));
    }
}
