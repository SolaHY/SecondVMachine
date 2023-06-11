@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>商品一覧画面</h1>
        <div class="col-md-8">
            <div>
                <form id="search-products">
                    @csrf

                    <div>
                        <label>
                            商品名：
                            <input type="text" name="keyword" id="keyword">
                        </label>
                    </div>


                    <div>
                        <label>
                            メーカー名：
                            <div>
                                <select class="form-control" id="company" name="company">
                                    <option value="">未選択</option>
                                    @foreach ($companies as $company)
                                    <option value="{{ $companies->id }}"> {{ $companies->maker_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>


                    <!-- <diV>
                        <label>
                            価格:
                            <input type="text" name="from_price" id="from_price">
                            <span class="form-control">~</span>
                            <input type="text" name="to_price" id="to_price">
                        </label>
                    </div>


                    <div>
                        <label>
                            在庫数:
                            <input type="text" name="from_stock" id="from_stock">
                            <span class="form-control">~</span>
                            <input type="text" name="to_stock" id="to_stock">
                        </label>
                    </div> -->

                    <button id="search" type="button" value="検索">検索</button>
                </form>
            </div>
        </div>



        <div>
            <button type="submit" name="create" value="create"><a href="{{route('create')}}">新規出品</a></button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th>画像</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $products->id }}</td>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->stock }}</td>
                    <td>{{ $products->maker }}</td>
                    <td>{{ $products->image }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- <table id="sort_table">
            <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th>画像</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="products_area">

            </tbody>
        </table> -->
    </div>
</div>
@endsection