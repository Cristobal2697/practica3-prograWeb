<?php
// file: controllers/PublisherController.php

require_once('model/Publishers.php');
require_once('model/Books.php');


class PublisherController extends Controller
{

  public function index()
  {
    return view(
      'publisher/index',
      [
        'publishers' => Publisher::all(),
        'title' => 'Publishers List'
      ]
    );
  }

  public function create()
  {
    return view(
      'publisher/create',
      ['title' => 'Publisher Create']
    );
  }

  public function store($param1 = null)
  {
    $publisher = Input::get('publisher');
    $country = Input::get('country');
    $founded = Input::get('founded');
    $genere = Input::get('genere');
    $item = [
      'publisher' => $publisher, 'country' => $country,
      'founded' => $founded, 'genere' => $genere
    ];
    Publisher::create($item);
    return redirect('/publisher');
  }

  public function edit($id)
  {
    $pub = Publisher::find($id);
    return view(
      'publisher/edit',
      [
        'publisher' => $pub,
        'title' => 'Publisher Edit'
      ]
    );
  }

  public function update($_, $id = null)
  {
    $publisher = Input::get('publisher');
    $country = Input::get('country');
    $founded = Input::get('founded');
    $genere = Input::get('genere');
    $item = [
      'publisher' => $publisher, 'country' => $country,
      'founded' => $founded, 'genere' => $genere
    ];
    Publisher::update($id, $item);
    return redirect('/publisher');
  }

  public function show($id)
  {
    $publisher = Publisher::find($id);
    $books = Book::where('author_id', $id);
    return view(
      'publisher/show',
      [
        'publisher' => $publisher,
        'books' => $books,
        'title' => 'Publisher Detail'
      ]
    );
  }
}
