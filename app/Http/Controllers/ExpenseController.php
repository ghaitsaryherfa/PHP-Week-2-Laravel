<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Shopping;

class ExpenseController extends Controller
{
    //
    public function index()
    {

        $items = Items::with('shopping')->get();
        return view('shopping.index', compact('items'));
    }

    public function create()
    {

        return view('shopping.create');
    }

    public function edit($id)
    {
        // $item = Items::findOrFail($id)->with('shopping');
        $item = Items::with('shopping')->where('shopping_code', $id)->firstOrFail();
        return view('shopping.edit', compact('item'));
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'shopping_title' => 'required',
                'shopping_category' => 'required',
                'shopping_description' => 'required',
                'item_name' => 'required',
                'item_description' => 'required',
                'item_category' => 'required',
                'item_qty' => 'required',
                'price' => 'required',
            ]
        );

        $total_price = 0;

        $total_price = $request->item_qty * $request->price;

        $item = new Items(
            [
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'item_category' => $request->item_category,
                'item_qty' => $request->item_qty,
                'price' => $request->price,
                'total_price' => $total_price,
            ]
        );

        $total_shopping = $total_price;

        $shopping = new Shopping(
            [
                'shopping_title' => $request->shopping_title,
                'shopping_category' => $request->shopping_category,
                'shopping_description' => $request->shopping_description,
                'shopping_date' => $request->shopping_date,
                'total_shopping' => $total_shopping,
            ]
        );

        $shopping->save();

        $item->shopping_code = $shopping->getKey();
        $item->save();
        // $item->shopping()->save($shopping);


        if ($item) {
            return redirect()
                ->route('shopping.index')
                ->with([
                    'success' => 'Row has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'shopping_title' => 'required',
                'shopping_category' => 'required',
                'shopping_description' => 'required',
                'item_name' => 'required',
                'item_description' => 'required',
                'item_category' => 'required',
                'item_qty' => 'required',
                'price' => 'required',
            ]
        );

        $item = Items::with('shopping')->where('shopping_code', $id)->firstOrFail();

        $total_price = 0;

        $total_price = $request->item_qty * $request->price;

        $item->update(
            [
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'item_category' => $request->item_category,
                'item_qty' => $request->item_qty,
                'price' => $request->price,
                'total_price' => $total_price,
            ]
        );

        $total_shopping = $total_price;

        $item->shopping->update(
            [
                'shopping_title' => $request->shopping_title,
                'shopping_category' => $request->shopping_category,
                'shopping_description' => $request->shopping_description,
                'shopping_date' => $request->shopping_date,
                'total_shopping' => $total_shopping,
            ]
        );

        if ($item) {
            return redirect()
                ->route('shopping.index')
                ->with([
                    'success' => 'Row has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function destroy($id)
    {

        $item = Items::with('shopping')->where('shopping_code', $id)->firstOrFail();
        $item->delete();
        $item->shopping->delete();
    }
}
