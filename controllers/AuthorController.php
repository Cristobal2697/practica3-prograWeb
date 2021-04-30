<?php
// file: controllers/AuthorController.php

require_once('model/Authors.php');
require_once('model/Books.php');

class AuthorController extends Controller
{

  public function index()
  {
    return view(
      'author/index',
      [
        'authors' => Author::all(),
        'title' => 'Authors List'
      ]
    );
  }

  public function create()
  {
    return view(
      'author/create',
      ['title' => 'Author Create']
    );
  }

  public function store($param1 = null)
  {
    $author = Input::get('author');
    $nationality = Input::get('nationality');
    $birth_day = Input::get('birth_day');
    $fields = Input::get('fields');
    $item = [
      'author' => $author, 'nationality' => $nationality,
      'birth_day' => $birth_day, 'fields' => $fields
    ];
    Author::create($item);
    return redirect('/author');
  }

  public function edit($id)
  {
    $aut = Author::find($id);
    return view(
      'author/edit',
      [
        'author' => $aut,
        'title' => 'Author Edit'
      ]
    );
  }

  public function update($_, $id = null)
  {
    $author = Input::get('author');
    $nationality = Input::get('nationality');
    $birth_day = Input::get('birth_day');
    $fields = Input::get('fields');
    $item = [
      'author' => $author, 'nationality' => $nationality,
      'birth_day' => $birth_day, 'fields' => $fields
    ];
    Author::update($id, $item);
    return redirect('/author');
  }

  public function show($id)
  {
    $author = Author::find($id);
    $books = Book::where('author_id',$id);
    return view(
      'author/show',
      [
        'author' => $author,
        'books' => $books,
        'title' => 'Author Detail'
      ]
    );
  }
}
