<?php

namespace App\Http\Controllers;

//コントローラ内で使うクラス
use App\Listing;
use App\Card;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //コンストラクタ
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    //カード新規作成画面（フォームの追加）
    public function new($listing_id)
    {
        //listingのidと紐づけるため引数で渡す（結局hiddenならstoreで渡したほうが気持ちいいけどできる？）
        return view('card/new', ['listing_id' => $listing_id]);
    }
    
    
    //カード新規作成処理（データベースへの保存）
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , ['card_title' => 'required|max:255', 'card_memo' => 'required|max:255']);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $card = new Card;
        $card->title = $request->card_title;
        $card->memo = $request->card_memo;
        $card->listing_id = $request->id;
        $card->save();
        
        return redirect('/');
    }
    
    
    //カード詳細表示
    public function show($listing_id, $card_id)
    {
        //get()してないので配列ではないはず？なので遷移先でforeachしなくてもよい
        $card = Card::find($card_id);
        //$listing = Listing::find($listing_id);
        
        return view('card/show', ['card' => $card]);
        /*
        return view('card/show', [
            'listing' => $listing,
            'card' => $card
        ]);
        */
    }
    
    
    //カード編集画面の処理
    public function edit($card_id)
    {
        //前画面で既に対象のcardは取得しているので、わざわざ引数idで再検索するのは効率悪い？
        $card = Card::find($card_id); //1つなのでgetは要らない？
        
        //プルダウンにて参照するためにlistings一覧を取得
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        
        return view('card/edit', [
            'card' => $card,
            'listings' => $listings
        ]);
    }
    
    
    //カード更新処理
    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , ['card_title' => 'required|max:255', 'card_memo' => 'required|max:255']);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        //リスト名は選択式なのでチェック不要

        $card = Card::find($request->card_id);
        $card->title = $request->card_title;
        $card->memo = $request->card_memo;
        $card->listing_id = $request->list_select;
        $card->save();
        
        return redirect('/');
    }
    
    
    //カード削除処理
    public function destroy($card_id)
    {
        Card::find($card_id)->delete();
        
        return redirect('/');
    }

}
