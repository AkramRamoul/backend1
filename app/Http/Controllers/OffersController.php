<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        return Offer::all();
    }
    public function store(Request $request)
    {
        $title = $request->input('title');
        $price = $request->input('price');
        $category_id = $request->input('category_id');

        DB::table('offers')->insert([
            'title' => $title,
            'price' => $price,
            'category_id' => $category_id

        ]);
        return response('Offer created '.$title, 201);
    }
     
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->update($request->all());
        return $offer;
    }




     /**
     * Search for a title
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Offer::where('title', 'like', '%'.$title.'%')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Offer::destroy($id);
    }













    // public function list(){
    //     return 'List of offers';
    // }
    public function show($id){
        return 'Offer: '.$id;
    }
}
