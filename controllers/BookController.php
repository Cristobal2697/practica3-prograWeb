<?php
// file: controllers/BookController.php

require_once('model/Books.php');
require_once('model/Authors.php');
require_once('model/Publishers.php');

class BookController extends Controller
{

  public function index()
  {
    return view(
      'book/index',
      [
        'books' => Book::all(),
        'title' => 'Books List'
      ]
    );
  }

  public function create()
  {
    return view(
      'book/create',
      ['title' => 'Book Create']
    );
  }

  public function store($param1 = null)
  {
    $title = Input::get('title');
    $edition = Input::get('edition');
    $copyright = Input::get('copyright');
    $language = Input::get('language');
    $pages = Input::get('pages');
    $author_id = Input::get('author');
    $publisher_id = Input::get('publisher');
    $item = [
      'title' => $title, 'edition' => $edition,
      'copyright' => $copyright, 'language' => $language,
      'pages' => $pages, 'author_id' => $author_id,
      'publisher_id' => $publisher_id
    ];
    Book::create($item);
    return redirect('/book');
  }

  public function edit($id)
  {
    $book = Book::find($id);
    return view(
      'book/edit',
      [
        'book' => $book,
        'title' => 'Book Edit'
      ]
    );
  }

  public function update($_, $id = null)
  {
    $title = Input::get('title');
    $edition = Input::get('edition');
    $copyright = Input::get('copyright');
    $language = Input::get('language');
    $pages = Input::get('pages');
    $author_id = Input::get('author');
    $publisher_id = Input::get('publisher');
    $item = [
      'title' => $title, 'edition' => $edition,
      'copyright' => $copyright, 'language' => $language,
      'pages' => $pages, 'author_id' => $author_id,
      'publisher_id' => $publisher_id
    ];
    Book::update($id, $item);
    return redirect('/book');
  }

  public function show($id)
  {
    $book = Book::find($id);
    $authors = Author::where('id', $book[0]['author_id']);
    $publishers = Publisher::where('id', $book[0]['publisher_id']);
    return view(
      'book/show',
      [
        'book' => $book,
        'authors' => $authors,
        'publishers' => $publishers,
        'title' => 'Book Detail'
      ]
    );
  }
}
